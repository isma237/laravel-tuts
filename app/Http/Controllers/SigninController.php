<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SigninController extends Controller
{
    public function index(){
        return view('signin.login');
    }


    //winnie@gmail.com -Password: aDd909PUFS

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $result = Auth::attempt($credentials);

        if(!$result){
            $message = "Adresse email ou mot de passe incorrect";
            return back()->with('error_login', $message);
        }
        return redirect()->route('dashboard');
    }
}
