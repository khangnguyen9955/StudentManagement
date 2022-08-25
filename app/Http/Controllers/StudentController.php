<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\ScoreReport;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function viewStudentProfile()
    {
        $email = Auth::guard('')->user()->email;
        $getStudent = Student::where('email', '=', $email)->get();
        $student = $getStudent[0];
        return view('pages.Student.student-profile', compact('student'));
    }
    public function viewStudentCalendar()
    {
        return view('pages.Student.student-calendar');
    }

    public function viewStudentGrade()
    {
        return view('pages.Student.student-grade');
    }

    public function addStudent()
    {
        $majors = Major::get();
        return view('pages.Admin.add-student', compact('majors'));
    }
    public function saveStudent(Request $request)
    {
        $request->validate([
            'fullName' =>'required',
            'email' => 'required|unique:students',
            'phone' => 'required|integer'
        ]);

        $student = new Student();
        $student->fullName = $request->fullName;
        $student->password = Hash::make("12345678"); // password default will be 12345678
        $student->role = 2;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->major_id = $request->major_id;
        
        
       
        $user = new User();
        $user->name = $request->fullName;
        $user->password = Hash::make("12345678");
        $user->email = $request->email;
        $user->role = 2;
        $user->save();
        $student->save();
        return back()->with('student_add', 'Student added successfully!');
    }
    public function studentList()
    {

        $students = Student::with('major', 'classroom')->get();
        return view('pages.Admin.list-student')->with('students', $students);
    }


    public function addStudentToClassroom()
    {
        $students = Student::where('class_id', '=', null)->get();
        $classrooms = Classroom::get();
        // return view('add-student-classroom', compact('students'), compact('classrooms'));
        return view('pages.Admin.add-student-classroom')->with(compact('students', 'classrooms'));
    }

    public function saveStudentToClassroom(Request $request)
    {

        $student = Student::where('id', '=', $request->student_id)->get();
        $classroom = Classroom::where('id', '=', $request->classroom_id)->get();
        if ($student[0]->major_id === $classroom[0]->major_id) {
            Student::where('id', $request->student_id)->update(array('class_id' => $request->classroom_id));
            return back()->with('student_classroom_add', 'Student ' . $student[0]->studentCode . ' has been added to ' . $classroom[0]->classCode . ' successfully!');
        } else {
            return back()->with('student_classroom_add_fail', 'Student must been added to the class which has the same majority with them!');
        }
    }

    public function editStudent($id)
    {
        $students = Student::where('id', '=', $id)->first();
        $majors = Major::get();
        $classrooms = Classroom::get();

        return view('pages.Admin.edit-student')->with(compact('students', 'majors', 'classrooms'));
    }

    public function updateStudent(Request $request)
    {
        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $majorID = $request->major_id;
        $classID = $request->classroom_id;
        $findClassroom = Classroom::find($request->classroom_id)->get();
        if ($request->major_id != $findClassroom[0]->major_id) {
            return back()->with('student_edit_fail', "Student's majority must be the same with the classroom's majority!");
        }

        Student::where('id', '=', $id)->update([
            'fullName' => $fullName,
            'phone' => $phone,
            'major_id' => $majorID,
            'class_id' => $classID
        ]);
        return back()->with('student_edit', 'Student has been updated successfully!');
    }
    public function removeStudent($id)
    {
        // Student::where('id', '=', $id)->delete();
        $checkStudent = Attendance::where('student_id', '=', $id)->get();
        if (count($checkStudent) > 0) {
            return redirect()->back()->with('delete_student_failure', 'This student has been added to a classroom, you cannot delete it from the system!');
        } else {
            Student::destroy($id);
            return redirect()->back()->with('delete_student_success', '
        Student removed successfully ');
        }
    }


    public function studentInClassroom()
    {
        $email =  Auth::guard('')->user()->email;
        $getStudent = Student::where('email', '=', $email)->get();
        $student = $getStudent[0];
        $classroom = Classroom::find($student->class_id);
        $students = Student::where('class_id', '=', $student->class_id)->get();
        if ($classroom == null){
            return redirect()->route('studentCalendar')->with('fail', 'This student has not been added to any classroom!');
        }

        return view('pages.Student.list-student-in-classroom', compact('students', 'classroom'));
    }
    public function studentSubjects()
    {
        $email =  Auth::guard('')->user()->email;
        $getStudent = Student::where('email', '=', $email)->get();
        $student = $getStudent[0];
        $classroom = Classroom::find($student->class_id);

        if ($classroom == null){
            return redirect()->route('studentCalendar')->with('fail', 'This student has not been added to any classroom!');
        }

        $subjects = $classroom->subjects;
        return view('pages.Student.student-subjects', compact('subjects', 'classroom'));
    }

    public function studentAttendance($id)
    {
        $email =  Auth::guard('')->user()->email;
        $getStudent = Student::where('email', '=', $email)->get();
        $student = $getStudent[0];
        $subject = Subject::find($id);
        $attendances = Attendance::where('student_id', '=', $student->id)->where('subject_id', '=', $id)->get();

        return view('pages.Student.student-attendance', compact('attendances', 'subject', 'student'));
    }

    public function studentScore()
    {
        $email =  Auth::guard('')->user()->email;
        $getStudent = Student::where('email', '=', $email)->get();
        $student = $getStudent[0];
        $classroom = Classroom::find($student->class_id);
        $scores = ScoreReport::where('student_id', '=', $student->id)->get();
        return view('pages.Student.student-score', compact('scores', 'classroom'));
    }
}
