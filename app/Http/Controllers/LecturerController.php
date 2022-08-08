<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function viewAddLecturerForm()
    {
        return view('pages.addlecturerform');
    }

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

    public function addLecturerSubject()
    {
        $subjects = Subject::get();
        $lecturers = Lecturer::get();
        return view('add-lecturer-subject', compact('lecturers'), compact('subjects'));
    }

    public function saveLecturerSubject(Request $request)
    {
        $lecturer = Lecturer::find($request->lecturer_id);
        $subject = Subject::find($request->subject_id);
        if ($lecturer->subjects->contains($request->subject_id)) {
            return back()->with('lecturer_subject_add', 'This subject is already added to lecturer!');
        } else if ($lecturer->major_id !== $subject->major_id) {
            return back()->with('lecturer_subject_add', 'This subject must be the same majority with the lecturer!');
        }
        $lecturer->subjects()->syncWithoutDetaching([$request->subject_id]);
        return back()->with('lecturer_subject_add', 'Added subject to lecturer successfully!');
    }

    public function editLecturer($id)
    {
        $lecturers = Lecturer::where('id', '=', $id)->first();
        $majors = Major::get();
        $classrooms = Classroom::get();

        return view('edit-lecturer')->with(compact('lecturers', 'majors', 'classrooms'));
    }
    public function updateLecturer(Request $request)
    {
        $id = $request->id;
        $fullName = $request->fullName;
        $email = $request->email;
        $phone = $request->phone;
        $majorID = $request->major_id;
        $classID = $request->classroom_id;


        Lecturer::where('id', '=', $id)->update([
            'fullName' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'major_id' => $majorID,
            'class_id' => $classID
        ]);
        return back()->with('lecturer_edit', 'Lecturer updated successfully!');
    }
    public function removeLecturer($id)
    {
        // Lecturer::where('id', '=', $id)->delete();
        Lecturer::destroy($id);
        return redirect()->back()->with('lecturer_list', '
        Lecturer removed successfully ');
    }

