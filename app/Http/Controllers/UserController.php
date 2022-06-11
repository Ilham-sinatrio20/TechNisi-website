<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    public function register(UserRequest $request) {
        $request->validated();
        // $insertion = User::create([$users]);
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->id_role = $request->id_role;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->save();
        Alert::success('Success', 'Success Create Data');
        return redirect()->route('login.auth')->with('success', 'Success Create Data');

    }
}
