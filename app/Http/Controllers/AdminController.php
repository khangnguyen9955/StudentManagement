<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function studentList()
    {
        return view('pages.Admin.list-student');
    }
    public function viewProfile()
    {
        return view('pages.Admin.admin-profile');
    }
}
