<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Schedule;
use App\Models\ScoreReport;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function viewAddLecturerForm()
    {
        return view('pages.Admin.add-lecturer-form');
    }

    public function addLecturer()
    {
        $majors = Major::get();

        return view('pages.Admin.add-lecturer', compact('majors'));
    }

    public function viewLecturerGrade()
    {
        return view('pages.Lecturer.lecturer-grade');
    }

    public function viewLecturerClass()
    {

        $lecturer = Lecturer::find(1);
        $allSchedules = Schedule::where('lecturer_id', '=', $lecturer->id)->get('classroom_id');
        $allClassrooms = Classroom::find($allSchedules);
        return view('pages.Lecturer.list-classroom-lecturer', compact('allClassrooms'));
    }

    public function viewLecturerProfile()
    {
        return view('pages.Lecturer.lecturer-profile');
    }

    public function saveLecturer(Request $request)
    {
        $lecturer = new Lecturer();
        $lecturer->fullName = $request->fullName;
        $lecturer->password = "12345678";
        $lecturer->role = 3;
        $lecturer->email = $request->email;
        $lecturer->phone = $request->phone;
        $lecturer->major_id = $request->major_id;
        $lecturer->save();
        return back()->with('lecturer_add', 'Lecturer added successfully!');
    }
    public function lecturerList()
    {
        $lecturers = Lecturer::with('major')->get();
        return view('pages.Admin.list-lecturer')->with('lecturers', $lecturers);
    }

    public function addLecturerSubject()
    {
        $subjects = Subject::get();
        $lecturers = Lecturer::get();
        return view('pages.Admin.add-lecturer-subject', compact('lecturers'), compact('subjects'));
    }

    public function saveLecturerSubject(Request $request)
    {
        $lecturer = Lecturer::find($request->lecturer_id);
        $subject = Subject::find($request->subject_id);
        $classroom = Classroom::find(1);

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

        return view('pages.Admin.edit-lecturer')->with(compact('lecturers', 'majors', 'classrooms'));
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






    public function getScoreReport(Request $request)
    {
        //get all classrooms of the lecturer id (logged in)
        // return classrooms to view, get the classcode, the subject's name
        $students = Student::where('class_id', '=', $request->classroom_id)->get();
        $classroom = Classroom::find($request->classroom_id);
        $subject = Subject::find($request->subject_id);
        return view('pages.Lecturer.take-score', compact('students', 'subject', 'classroom'));
    }

    public function takeScoreReport(Request $request)
    {
        $findStudent = ScoreReport::where('student_id', '=', $request->student_id)->get();
        echo $findStudent;
        return view('cc');
        $score = new ScoreReport();
        $score->subject_id = $request->subject_id;
        $score->student_id = $request->student_id;
        $score->score = $request->status;
        $score->save();
        return back()->with('take_score', 'This student has been graded!');
    }

    public function viewStudentClassroom(Request $request)
    {
        $students = Student::where('class_id', '=', $request->classroom_id)->get();
        $classroom = Classroom::find($request->classroom_id);
        $subject = Subject::find($request->subject_id);
        return view('pages.Lecturer.view-student-classroom', compact('students', 'classroom', 'subject'));
    }
}
