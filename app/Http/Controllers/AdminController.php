<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function studentList()
    {
        return view('pages.Admin.list-student');
    }
    public function viewProfile()
    {
        $email =  Auth::guard('')->user()->email;
        $getAdmin = Admin::where('email', '=', $email)->get();
        $admin = $getAdmin[0];
        return view('pages.Admin.admin-profile', compact('admin'));
    }
}
