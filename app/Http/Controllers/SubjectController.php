<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject()
    {
        $majors = Major::get();

        return view('pages.Admin.add-subject', compact('majors'));
    }



    public function saveSubject(Request $request)
    {
        $subject = new Subject();
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


    public function editSubject($id)
    {

        $subject = Subject::where('id', '=', $id)->first();
        $majors = Major::get();
        return view('pages.Admin.edit-subject')->with(compact('majors', 'subject'));
    }

    public function updateSubject(Request $request)
    {
        $id = $request->id;
        $subjectName = $request->subjectName;
        $majorID = $request->major_id;
        $findUsed = Schedule::where('classroom_id', '=', $id)->get();
        if (count($findUsed) > 0) {
            return back()->with('subject_edit_fail', "This subject is being used for students, cannot change it information!");
        }
        Subject::where('id', '=', $id)->update([
            'subjectName' => $subjectName,
            'major_id' => $majorID,
        ]);
        return back()->with('subject_edit', 'Subject has been updated successfully!');
    }

    public function removeSubject($id)
    {
        $findUsed = Schedule::where('subject_id', '=', $id)->get();
        if (count($findUsed) > 0) {
            return back()->with('subject_delete_fail', "This subject is being used for students, cannot delete it!");
        }
        Subject::destroy($id);
        return redirect()->back()->with('subject_delete', '
        Subject has been removed successfully ');
    }
}
