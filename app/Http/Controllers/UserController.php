<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function readUser($email, $password)
    {
       return User::where('email', '=', $email)->where('password', '=', $password)->get();
    }

    public function readAll(){
        return User::all();
    }

    public function readId($id){
        return User::where('id', '=', $id)->get();
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;

        $user->save();
        return "Data added successfully";
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;

        $user->save();
        return "Data changed successfully";
    }
}
