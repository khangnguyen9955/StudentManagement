<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Slot;
use App\Models\Subject;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function viewLecturerCalendar(){
        return view('pages.Lecturer.lecturer-calendar');
    }

    public function viewStudentCalendar()
    {
        return view('pages.Student.student-calendar');
    }


    public function getSchedule()
    {
        $getSchedules = Schedule::get();
        $getSchedules->transform(function ($schedule) {
            $start =  Slot::where('id', '=', $schedule->slot_id)->get();
            $end = Slot::where('id', '=', $schedule->slot_id)->get();
            $subject = Subject::where('id', '=', $schedule->subject_id)->get();
            // if lecturer => this 
            return [
                'id' => $schedule->id,
                'title' => $subject[0]->subjectCode,
                'description' => $subject[0]->subjectName,
                'startTime' => $start[0]->start_time,
                'endTime' => $end[0]->end_time,
                'daysOfWeek' => $schedule->recurrence,
                'startRecur' => $schedule->start_date,
                'endRecur' => $schedule->end_date,
                'url' => 'take-attendance/' . $schedule->subject_id . '/' . $schedule->classroom_id,
            ];
            // else => url /$classroom_id
        });


        $schedules = json_encode($getSchedules);
        // return response()->json($schedules, 200);
        // return json_encode($schedules);
        return view('pages.Admin.admin-calendar', compact('schedules'));
    }
}
