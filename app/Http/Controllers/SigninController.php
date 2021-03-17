<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function index(){
        return view('signin.login');
    }


    public function login(Request $request){
        dd($request);
    }
}
