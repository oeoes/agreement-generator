<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderFooter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;

class HeaderFooterController extends BaseController
{
    public function index() {
        $header_footer = HeaderFooter::all();
        return response()->json(['hf_list' => $header_footer, 'path' => storage_path('app/header_footer')]);
    }

    public function getHeaderFooterImage($type, $request) {
        $exploded_header = explode(',', $request);
        $decoded_header = base64_decode($exploded_header[1]);

        if(str_contains($exploded_header[0], 'jpeg')){
            $extension = 'jpeg';
        }
        else if(str_contains($exploded_header[0], 'svg')){
            $extension = 'svg';
        }            
        else{
            $extension = 'png';
        }            
        
        if($type == 'header') {
            $filename = 'header_'.\Carbon\Carbon::now()->format('Y-m-d_H:i:s').'.'.$extension;
        }else{
            $filename = 'footer_'.\Carbon\Carbon::now()->format('Y-m-d_H:i:s').'.'.$extension;
        }
        
        Storage::disk('local')->put('header_footer/'.$filename, $decoded_header);

        return $filename;
    }

    public function store(Request $request) {       

        $data = HeaderFooter::create([
            'name' => request('name'),
            'desc' => request('desc'),
            'header_image' => $this->getHeaderFooterImage('header', $request->header),
            'footer_image' => $this->getHeaderFooterImage('footer', $request->footer)
        ]);

        // log
        $this->log(request('user_id'), 'Created Header and footer template : '.request('name'));

        return response()->json(['status' => true, 'message' => 'Header and footer uploaded.', 'new_data' => $data]);
    }

    public function update(Request $request, $id) {
        $current = HeaderFooter::find($id);
        $current->name = $request->name;
        $current->desc = $request->desc;

        if(request('header')) {
            Storage::delete('header_footer/'.$current->header_image);
            $current->header_image = $this->getHeaderFooterImage('header', $request->header);
        }

        if(request('footer')) {
            Storage::delete('header_footer/'.$current->footer_image);
            $current->footer_image = $this->getHeaderFooterImage('footer', $request->footer);
        }

        $current->save();

        // log
        $this->log(request('user_id'), 'Updated header and footer design : '.$current->name);

        return response()->json(['status' => true, 'message' => 'Updated successfully.', 'new_hf' => HeaderFooter::find($id)]);
    }

    public function destroy($id) {
        $current = HeaderFooter::find($id);
        // hapus current image from storage
        Storage::delete('header_footer/'.$current->footer_image);
        Storage::delete('header_footer/'.$current->header_image);

        $name = $current->name;
        $current->delete();

        // log
        $this->log(request('user_id'), 'Deleted header and footer design : '.$name);

        return response()->json(['status' => true, 'message' => $name.' deleted']);
    }
}
