<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Template;

class TemplateController extends BaseController
{
    private $cont = '';

    public function index() {
        return Template::all();
    }

    public function viewData() {
        return Template::all();
    }

    public function show($id) {
        $data = Template::find($id);

        $this->cont = $data->content;
        $this->cont = preg_replace('/{{/', '<span style="background: #fbfbfd; box-shadow: 0 3px 4px rgba(0,0,0,.075); color: #ca473f; padding: 0 5px">', $this->cont);
        $this->cont = preg_replace('/}}/', '</span>', $this->cont);
        return response()->json(['template_name' => $data->template_name, 'content' => $this->cont, 'field' => json_decode($data->field)]);
    }

    public function viewForUpdate($id) {
        $data = Template::find($id);
        return response()->json(['template_name' => $data->template_name, 'content' => $data->content, 'field' => json_decode($data->field)]);
    }
    
    public function update($id) {
        $data = Template::find($id);
        $current_tmp_name = $data->template_name;
        preg_match_all('/\{\{([\w]+)\}\}/', request('content'), $fields);

        try{
            if(sizeof($fields[1]) < 1) {
                return response()->json(['message' => 'Write at least one field'], 400);
            }

            // check duplicate
            $unique = array_unique($fields[1]);
            for ($i=0; $i < sizeof($unique); $i++) {   
                $counter = 0;              
                for ($j=0; $j < sizeof($fields[1]); $j++) { 
                    if($unique[$i] == $fields[1][$j]) {
                        $counter++;
                    }
                    if ($counter > 1) {
                        return response()->json(['status' => false, 'message' => 'Duplicate field detected: '.strtoupper($unique[$i])]);
                    }
                }
            }

            $data->template_name = request('template_name');
            $data->content = request('content');
            $data->field = json_encode($fields[1]);
            $data->save();

            // log
            $this->log(request('id'), 'Updated template \''.$current_tmp_name.'\' --> \''. $data->template_name. '\'');

            return response()->json(['status' => true, 'message' => 'Template updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error '.$e->getMessage()]);
        }
    }

    public function store() {
        preg_match_all('/\{\{([\w]+)\}\}/', request('content'), $fields);        

        try {
            if(sizeof($fields[1]) < 1) {
                return response()->json(['status' => false, 'message' => 'Write at least one field'], 200);
            }

            // check duplicate
            $unique = array_unique($fields[1]);
            for ($i=0; $i < sizeof($unique); $i++) {   
                $counter = 0;              
                for ($j=0; $j < sizeof($fields[1]); $j++) { 
                    if($unique[$i] == $fields[1][$j]) {
                        $counter++;
                    }
                    if ($counter > 1) {
                        return response()->json(['status' => false, 'message' => 'Duplicate field detected: '.strtoupper($unique[$i])]);
                    }
                }
            }

            Template::create([
                'template_name' => request('template_name'),
                'content' => request('content'),
                'field' => json_encode($fields[1])
            ]);

            // log
            $this->log(request('id'), 'Created template named \''. request('template_name').'\'');

            return response()->json(['status' => true, 'message' => 'Template Created'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        $template = Template::find($id);
        $template_name = $template->template_name;
        $template->delete();

        // log
        $this->log(request('id'), 'Deleted template \''. $template_name. '\'');

        return response()->json(['status' => true, 'message' => 'Template deleted.']);
    }
}
