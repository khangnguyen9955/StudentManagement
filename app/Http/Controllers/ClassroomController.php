<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function addClassroom(){
        $majors = Major::get();
       return view('add-classroom',compact('majors'));
    }


    public function saveClassroom(Request $request){
            $classroom = new Classroom();
            $classroom->major_id= $request->major_id;
            $classroom->save();

            return back()->with('classroom_add','Classroom added successfully!');
    }

    public function classroomList(){
        $classrooms =Classroom::with('major')->get();
        return view('list-classroom')->with('classrooms',$classrooms);
    }

}
