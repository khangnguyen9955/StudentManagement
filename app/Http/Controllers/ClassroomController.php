<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function showMultiForm(){
        return view('pages.multi-form');
    }

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

    public function saveClassroomSubject(Request $request)
    {
        $classroom = Classroom::find($request->classroom_id);
        $subject = Subject::find($request->subject_id);
        if ($classroom->subjects()->contains($request->subject_id)) {
            return back()->with('classroom_subject_add', 'This subject is already added to this classroom!');
        } else if ($classroom->major_id !== $subject->major_id) {
            return back()->with('classroom_subject_add', 'This subject must be the same majority with this classroom!');
        }
        $classroom->subjects()->syncWithoutDetaching([$request->subject_id]);
        return back()->with('classroom_subject_add', 'This subject is added to this classroom successfully!');
    }

    public function viewMulti()
    {
        $subjects = Subject::get();
        $lecturers = Lecturer::get();
        return view('multi-form')->with(compact('subjects', 'lecturers'));
    }

    public function chooseSubjectStep(Request $request)
    {
    }

    public function chooseLecturerStep(Request $request)
    {
    }
    public function chooseScheduleStep(Request $request)
    {
    }

    public function removeClassroom($id)
    {
        // Classroom::where('id', '=', $id)->delete();
        Classroom::destroy($id);
        return redirect()->back()->with('classroom_list', '
        Classroom removed successfully ');
    }
}
