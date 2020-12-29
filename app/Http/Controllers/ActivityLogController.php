<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use App\User;

class ActivityLogController extends Controller
{
    public function index() {
        $log = ActivityLog::all();
        return $log;
    }

    public function onLoadLog() {
        $user = User::find(request('user_id'));

        $log = ActivityLog::where('user_id', $user->id)->latest()->get();
        return response()->json(['user' => $user, 'logs' => $log]);
    }

    public function show($id) {
        $user = User::find($id);
        $log = ActivityLog::where('user_id', $id)->get();
        return response()->json(['user' => $user, 'logs' => $log]);
    }
}
