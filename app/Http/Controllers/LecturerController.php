<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Schedule;
use App\Models\ScoreReport;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{

    public function addLecturer()
    {
        $majors = Major::get();

        return view('pages.Admin.add-lecturer', compact('majors'));
    }

    public function viewLecturerClass()
    {
        $email = Auth::guard('')->user()->email;
        $getLecturer = Lecturer::where('email', '=', $email)->get();
        $lecturer = $getLecturer[0];
        $allSchedules = Schedule::where('lecturer_id', '=', $lecturer->id)->get('classroom_id');
        $allClassrooms = Classroom::find($allSchedules);
        return view('pages.Lecturer.list-classroom-lecturer', compact('allClassrooms'));
    }

    public function lecturerSubjects()
    {
        $email = Auth::guard('')->user()->email;
        $getLecturer = Lecturer::where('email', '=', $email)->get();
        $subjects = $getLecturer[0]->subjects()->get();

        return view('pages.Lecturer.list-subjects-lecturer', compact('subjects'));
    }

    public function viewLecturerProfile()
    {
        $email = Auth::guard('')->user()->email;
        $getLecturer = Lecturer::where('email', '=', $email)->get();
        $lecturer = $getLecturer[0];
        return view('pages.Lecturer.lecturer-profile', compact('lecturer'));
    }

    public function saveLecturer(Request $request)
    {
        $lecturer = new Lecturer();
        $lecturer->fullName = $request->fullName;
        $lecturer->password = Hash::make("12345678"); // password default will be 12345678
        $lecturer->role = 3;
        $lecturer->email = $request->email;
        $lecturer->phone = $request->phone;
        $lecturer->major_id = $request->major_id;
        $findEmail = User::where('email', '=', $request->email)->get();
        if (count($findEmail) > 0) {
            return back()->with('lecturer_add_fail', 'This email has been used, try another email!');
        }
        $user = new User();
        $user->name = $request->fullName;
        $user->password = Hash::make("12345678");
        $user->email = $request->email;
        $user->role = 3;
        $user->save();
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
        if ($lecturer->subjects->contains($request->subject_id)) {
            return back()->with('lecturer_subject_add_fail', 'This subject is already added to lecturer!');
        } else if ($lecturer->major_id !== $subject->major_id) {
            return back()->with('lecturer_subject_add_fail', 'This subject must be the same majority with the lecturer!');
        }
        $lecturer->subjects()->syncWithoutDetaching([$request->subject_id]);
        return back()->with('lecturer_subject_add', 'Added subject to lecturer successfully!');
    }

    public function editLecturer($id)
    {
        $lecturers = Lecturer::where('id', '=', $id)->first();
        $majors = Major::get();

        return view('pages.Admin.edit-lecturer')->with(compact('lecturers', 'majors'));
    }
    public function updateLecturer(Request $request)
    {
        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $majorID = $request->major_id;
        $lecturer = Lecturer::find($id);
        if (count($lecturer->subjects) > 0 && $lecturer->major_id != $majorID) {
            return back()->with('lecturer_edit_fail', "This lecturer is assigned to teach some subjects we cannot change lecturer's information!");
        }
        Lecturer::where('id', '=', $id)->update([
            'fullName' => $fullName,
            'phone' => $phone,
            'major_id' => $majorID,
        ]);
        return back()->with('lecturer_edit', 'Lecturer updated successfully!');
    }
    public function removeLecturer($id)
    {
        // Lecturer::where('id', '=', $id)->delete();
        $checkLecturer = Schedule::where('lecturer_id', '=', $id)->get();
        if (count($checkLecturer) > 0) {
            return redirect()->back()->with('delete_lecturer_failure', 'This lecturer has been added to a classroom, you cannot delete it from the system!');
        }
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
        $findStudent = ScoreReport::where('student_id', '=', $request->student_id)->where('subject_id', '=', $request->subject_id)->get();
        if (count($findStudent) > 0) {
            return back()->with('take_score_failed', 'This student is already graded');
        }
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
