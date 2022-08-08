<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject()
    {
        $majors = Major::get();

        return view('add-subject', compact('majors'));
    }



    public function saveSubject(Request $request)
    {
        $subject = new Subject();
        echo $request->subjectName;
        $subject->subjectName = $request->subjectName;
        $subject->major_id = $request->major_id;
        $subject->save();
        return back()->with('subject_add', 'Subject added successfully!');
    }
    public function subjectList()
    {
        $subjects = Subject::with('major')->get();
        return view('pages.Admin.list-subject')->with('subjects', $subjects);
    }
}
