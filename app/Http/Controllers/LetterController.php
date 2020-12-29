<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;
use PDF;
use App\Letter;
use App\Template;
use App\HeaderFooter;

class LetterController extends BaseController
{
    private $cont = '';

    public function dynamicDownloadSurat(){
        $pdf = $this->generatePdf(request('id'), request('default_field'), request('fields'), request('header_footer'), request('hf_id'));
        
        $content = $pdf->download()->getOriginalContent();
        $name = 'kontrak_'.\Carbon\Carbon::now().'.pdf';
        Storage::disk('local')->put($name, $content);

        // log
        $template = Template::find(request('id'));
        $this->log(request('user_id'), 'Downloaded template \''.$template->template_name.'\'');

        return response()->download(storage_path().'/app/'.$name, $name, ['Content-Type' => ' application/pdf'])->deleteFileAfterSend();
    }

    public function generatePdf($template_id, $default_field, $fields, $header_footer, $selected_hf) {

        $content = Template::find($template_id);
        $this->cont = $content->content;
        for ($i=0; $i < sizeof($default_field); $i++) { 
            $word = $default_field[$i];
            $this->cont = preg_replace('/{{'.$word.'}}/', $fields[$i], $this->cont);
        }

        $this->replaceHeading();

        // check if option for header and footer selected
        if($header_footer) {
            // check if template selected
            if($selected_hf == null) {
                return response()->json(['status' => false, 'message' => 'Pick your template first']);
            }
            $hf = HeaderFooter::find($selected_hf);

            $pdf = PDF::loadView('dynamic-export', [
                'content' => $this->cont,
                'header_footer' => $header_footer,
                'header' => storage_path('app/header_footer/'.$hf->header_image),
                'footer' => storage_path('app/header_footer/'.$hf->footer_image)
            ]);
        }else{
            $pdf = PDF::loadView('dynamic-export', [
                'content' => $this->cont,
                'header_footer' => $header_footer,
            ]);
        }        
        return $pdf;
    }

    public function downloadFromStorage() {
        // log
        $this->log(request('user_id'), 'Downloaded letter from storage : '. request('file_name'));

        $path = storage_path('app/surat/'.request('file_name'));
        return response()->download($path, request('file_name'), ['Content-Type' => 'application/pdf']);
    }

    public function viewSurat() {
        return Letter::all();
    }

    public function getSurat() {
        $data = Letter::find(request('id'));
        return response()->json(['doc' => $data, 'file' => storage_path($data->path)])->header('Content-Type', 'application/pdf');
    }

    public function storeSurat() {
        
        $pdf = $this->generatePdf(request('id'), request('default_field'), request('fields'), request('header_footer'), request('hf_id'));

        $content = $pdf->download()->getOriginalContent();
        $name = request('file_name').'_'.\Carbon\Carbon::now()->format('Y-m-d_H:i:s').'.pdf';
        Storage::disk('local')->put('surat/'.$name, $content);

        // save to db
        Letter::create([
            'user_id' => request('user_id'),
            'template_id' => request('id'),
            'path' => storage_path('app/surat/'.$name),
            'file_name' => request('file_name'),
            'real_name' => ''.$name
        ]);
        
        // log
        $template_name = Template::find(request('id'));
        $this->log(request('id'), 'Create new document \''. request('file_name').'\' from template \''.$template_name->template_name.'\'');
        return response()->json(['status' => true, 'message' => 'File saved']);
    }

    public function replaceHeading() {
        // Strong style
        $this->cont = preg_replace('/<strong>/', '<span style="font-family: \'Sofia Pro Medium\'!important;">', $this->cont);
        $this->cont = preg_replace('/<\/strong>/', '</span>', $this->cont);

        // mengubah font style heading secara paksa hehe
        $this->cont = preg_replace('/<h1 stye="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 32px; ', $this->cont);
        $this->cont = preg_replace('/<\/h1>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h2 style="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px; ', $this->cont);
        $this->cont = preg_replace('/<\/h2>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h3 style="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 18.72px; ', $this->cont);
        $this->cont = preg_replace('/<\/h3>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h4 style="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 16px; ', $this->cont);
        $this->cont = preg_replace('/<\/h4>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h5 style="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 13.28px; ', $this->cont);
        $this->cont = preg_replace('/<\/h5>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h6 style="/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 10.72px; ', $this->cont);
        $this->cont = preg_replace('/<\/h6>/', '</div>', $this->cont);

        // Heading with no style
        $this->cont = preg_replace('/<h1>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h1>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h2>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h2>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h3>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h3>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h4>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h4>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h5>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h5>/', '</div>', $this->cont);

        $this->cont = preg_replace('/<h6>/', '<div style="font-family: \'Sofia Pro Medium\'; font-size: 24px;">', $this->cont);
        $this->cont = preg_replace('/<\/h6>/', '</div>', $this->cont);
    }

}
