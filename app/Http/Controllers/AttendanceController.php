<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    public function getAttendanceReport($subjectId, $classroomId)
    {
        $classroom = Classroom::find($classroomId);

        $subject = Subject::find($subjectId);
        $students = Student::where('class_id', '=', $classroomId)->get();
        return view('take-attendance', compact('classroom', 'students', 'subject'));
    }


    public function saveAttendanceReport(Request $request)
    {

        $currentDate = date('Y-m-d');
        $checkAttend = Attendance::where('student_id', '=', $request->student_id)->get();
        $flagCanMark = false;
        // foreach ($checkAttend as $attend) {
        //     if ($currentDate == date('Y-m-d', strtotime($attend->created_at)) && $attend->subject_id == $request->subject_id) {
        //         $flagCanMark = false;
        //         return back()->with('attendance.failure', 'Attendance marked already');
        //     }
        // }
        $attendance = new Attendance();
        $attendance->student_id = $request->student_id;
        $attendance->subject_id = $request->subject_id;
        $attendance->status = $request->attendance;
        $attendance->save();
        return back()->with('attendance.success', 'Taken attendance report successfully!');
    }
}
