<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function studentList()
    {
        return view('pages.Admin.list-student');
    }
    function addStudent()
    {
        return view('pages.Admin.add-student');
    }
}
