<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class BaseController extends Controller
{
    public function log($id, $desc_act) {
        ActivityLog::create([
            'user_id' => $id,
            'activity' => $desc_act
        ]);
    }
}
