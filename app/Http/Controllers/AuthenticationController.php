<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function Login(){
        return view('Authentication.login');
    }
    
    
}
