<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function Login(){
        return view('pages.Authentication.login');
    }
    
    
}
