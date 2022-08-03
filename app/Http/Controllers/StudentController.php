<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class StudentController extends Controller
{

    public function viewProfile(){
        return view('pages.profile');
    }
    public function viewCalendar(){
        return view('pages.calendar');
    }

    public function addStudent()
    {
        $majors = Major::get();

        return view('add-student', compact('majors'));
    }
    public function saveStudent(Request $request)
    {
        $student = new Student();
        $student->fullName = $request->fullName;
        $student->password = $request->password;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->major_id = $request->major_id;
        $student->save();
        return back()->with('student_add', 'Student added successfully!');
    }
    public function studentList()
    {

        $students = Student::with('major')->with('classroom')->get();

        return view('list-student')->with('students', $students);
    }

    public function addStudentToClassroom()
    {
        $students = Student::where('class_id', '=', null)->get();
        $classrooms = Classroom::get();
        return view('add-student-classroom', compact('students'), compact('classrooms'));
    }

    public function saveStudentToClassroom(Request $request)
    {
        $student = Student::where('id', '=', $request->student_id)->get();
        $classroom = Classroom::where('id', '=', $request->classroom_id)->get();
        if ($student[0]->major_id === $classroom[0]->major_id) {
            Student::where('id', $request->student_id)->update(array('class_id' => $request->classroom_id));
            return back()->with('student_classroom_add', 'Student ' . $student[0]->studentCode . ' has been added to ' . $classroom[0]->classCode . ' successfully!');
        } else {
            return back()->with('student_classroom_add', 'Student must been added to the class which has the same majority with them!');
        }
    }
}
