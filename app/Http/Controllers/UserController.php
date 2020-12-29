<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function index() {
        return User::orderBy('last_login', 'DESC')->get()->toArray();
    }

    public function lastLogin() {
        $user = User::where('email', request('email'))->first();
        $user->last_login = \Carbon\Carbon::now();
        $user->save();

        // create log for logged in user
        $this->log($user->id, 'Logged in to Letter Generator | AG');
    }

    // user joined using invited email adress
    public function store() {
        $email = User::where('email', request('email'))->first();
        if(!$email) {
            $newuser = User::create([
                'email' => request('email'),
                'name' => 'No name',
                'status' => 'waiting',
            ]);
            
            // log
            $this->log(request('id'), 'Invited '.request('email'));

            return response()->json(['status' => true, 'message' => 'New user added.', 'new_user' => $newuser]);
        }else {
            return response()->json(['status' => false, 'message' => 'Email exist.']);
        }
        
    }

    public function getCredentials($email) {
        $data = User::where('email', $email)->first();
        return response()->json(['user' => $data]);
    }

    // check user by email
    public function checkUser() {
        $email = User::where('email', request('email'))->first();
        if(!$email) {
            return response()->json(['status' => false, 'message' => 'Sorry, Your google account not invited.']);
        }

        if($email->status == 'waiting') {
            return response()->json(['status' => true, 'complete' => false, 'message' => 'Email valid']);
        }
        return response()->json(['status' => true, 'complete' => true, 'message' => 'Email valid']);
    }

    // complete invited user's informatioin when logged in
    public function addInformation() {
        $data = User::where('email', request('email'))->first();
        $data->name = request('name');
        $data->profile = request('profile'); // profile image
        $data->status = 'verified';
        $data->password = bcrypt(request('id'));
        $data->save();

        // log
        $this->log($data->id, 'Login for the first time');

        return response()->json(['status' => true, 'message' => 'Information completed']);
    }
}
