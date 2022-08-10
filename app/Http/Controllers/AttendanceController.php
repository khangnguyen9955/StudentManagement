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

    public function getAttendanceReport(Request $request)
    {

        $date = $request->date;
        $classroomId = $request->classroom_id;
        $subjectId = $request->subject_id;
        $classroom = Classroom::find($classroomId);
        $subject = Subject::find($subjectId);
        $students = Student::where('class_id', '=', $classroomId)->get();
        return view('pages.Lecturer.take-attendance', compact('classroom', 'students', 'subject', 'date'));
    }


    public function saveAttendanceReport(Request $request)
    {

        $currentDate = date('Y-m-d');
        $checkAttend = Attendance::where('subject_id', '=', $request->subject_id)->get();
        $flagCanMark = true;
        foreach ($checkAttend as $attend) {
            if ($attend->student_id == $request->student_id) {
                if ($request->date != $currentDate) {
                    $flagCanMark = false;
                    return back()->with('attendance.failure', 'This attendance need to be made on the correct date!');
                } else if (date('Y-m-d', strtotime($attend->created_at)) == $request->date) {
                    $flagCanMark = false;
                    return back()->with('attendance.failure', 'This attendance is already marked!');
                }
            }
        }
        if ($flagCanMark == true) {
            $attendance = new Attendance();
            $attendance->student_id = $request->student_id;
            $attendance->subject_id = $request->subject_id;
            $attendance->status = $request->attendance;
            $attendance->save();
            return back()->with('attendance.success', 'Taken attendance report successfully!');
        }
    }
}
