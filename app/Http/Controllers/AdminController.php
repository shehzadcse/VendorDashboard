<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {      
        return view('admin.login');
    }
    public function login(Request $request)
    {     
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        // $user= User::where('email', $request->email)->first();
        // if (!$user || !\Hash::check($request->password, $user->password)) {
        //     return response([
        //         'message' => ['These credentials do not match our records.']
        //     ], 404);
        // }

        if(\Auth::attempt($request->only('email','password'))){
            // dd($request->session());
        return view('welcome');
        }
        else{
            return response([
                        'message' => ['These credentials do not match our records.']
                    ], 404);
        }
    }
}
