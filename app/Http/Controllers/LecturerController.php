<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Major;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function addLecturer()
    {
        $majors = Major::get();

        return view('add-lecturer', compact('majors'));
    }

    public function saveLecturer(Request $request)
    {
        $lecturer = new Lecturer();
        $lecturer->fullName = $request->fullName;
        $lecturer->password = $request->password;
        $lecturer->email = $request->email;
        $lecturer->phone = $request->phone;
        $lecturer->major_id = $request->major_id;
        $lecturer->save();
        return back()->with('lecturer_add', 'Lecturer added successfully!');
    }
    public function lecturerList()
    {
        $lecturers = Lecturer::with('major')->get();
        return view('list-lecturer')->with('lecturers', $lecturers);
    }
}
