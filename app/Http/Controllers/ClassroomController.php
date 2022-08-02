<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function addClassroom()
    {
        $majors = Major::get();
        return view('add-classroom', compact('majors'));
    }


    public function saveClassroom(Request $request)
    {
        $classroom = new Classroom();
        $classroom->major_id = $request->major_id;
        $classroom->save();

        return back()->with('classroom_add', 'Classroom added successfully!');
    }

    public function classroomList()
    {
        $classrooms = Classroom::with('major')->get();
        return view('list-classroom')->with('classrooms', $classrooms);
    }

    public function addSubjectToClassroom()
    {
        $subjects = Subject::get();
        $classrooms = Classroom::get();
        return view('add-subject-to-classroom', compact('subjects'), compact('classrooms'));
    }

    public function saveSubjectToClassroom(Request $request)
    {
        $classroom = Classroom::where('id','=', $request->classroom_id)->get();
        $subject = Subject::where('id','=',$request->subject_id)->get();
        $lecturer = Lecturer::where('id','=',$request->lecturer_id)->get();



    }
}
