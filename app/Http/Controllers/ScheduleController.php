<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Slot;
use App\Models\Subject;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    // { id:1, start:"10:00", end:"12:00", dow:[1,4],
    //     ranges[{start:"2015/03/01", end:"2015/04/01"},
    //            {start:"2015/05/01", end:"2015/06/01"},
    //            {start:"2016/01/01", end:"2017/01/01"},]
    //   }

    public function getSchedule()
    {
        $getSchedules = Schedule::get();
        $getSchedules->transform(function ($schedule) {
            $start =  Slot::where('id', '=', $schedule->slot_id)->get();
            $end = Slot::where('id', '=', $schedule->slot_id)->get();
            $subject = Subject::where('id', '=', $schedule->subject_id)->get();
            return [
                'id' => $schedule->id,
                'title' => $subject[0]->subjectCode,
                'description' => $subject[0]->subjectName,
                'startTime' => $start[0]->start_time,
                'endTime' => $end[0]->end_time,
                'daysOfWeek' => $schedule->recurrence,
                'startRecur' => $schedule->start_date,
                'endRecur' => $schedule->end_date
            ];
        });


        $schedules = json_encode($getSchedules);
        // return response()->json($schedules, 200);
        // return json_encode($schedules);
        return view('pages.calendar', compact('schedules'));
    }
}
