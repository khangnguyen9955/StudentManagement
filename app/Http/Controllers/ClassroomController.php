<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Schedule;
use App\Models\Slot;
use App\Models\Student;
use App\Models\Subject;
use DateTime;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{


    public function addClassroom()
    {
        $majors = Major::get();
        return view('pages.Admin.add-classroom', compact('majors'));
    }


    public function saveClassroom(Request $request)
    {
        $classroom = new Classroom();
        $classroom->major_id = $request->major_id;
        $classroom->save();

        return back()->with('classroom_add', 'Classroom added successfully!');
    }

    public function classroomList()
    {
        $classrooms = Classroom::with('major')->get();
        return view('pages.Admin.list-classroom')->with('classrooms', $classrooms);
    }


    public function editClassroom($id)
    {

        $classroom = Classroom::where('id', '=', $id)->first();
        $majors = Major::get();

        return view('pages.Admin.edit-classroom')->with(compact('majors', 'classroom'));
    }

    public function updateClassroom(Request $request)
    {
        $id = $request->id;
        $majorID = $request->major_id;
        $findUsed = Student::where('class_id', '=', $id)->get();
        if (count($findUsed) > 0) {
            return back()->with('classroom_edit_fail', "This classroom is being used for students, cannot change it information!");
        }
        Classroom::where('id', '=', $id)->update([
            'major_id' => $majorID,
        ]);
        return back()->with('classroom_edit', 'Classroom has been updated successfully!');
    }



    public function viewStudentClassroom($id)
    {
        $students = Student::where('class_id', '=', $id)->get();
        $classroom = Classroom::find($id);
        return view('pages.Admin.view-student-in-classroom', compact('students', 'classroom'));
    }


    public function chooseClassroomToAddSubject(Request $request)
    {
        $classrooms = Classroom::get();
        $classroom_id = $request->session()->get('classroom_id');
        return view('pages.Admin.add-classroom-subject.choose-classroom', compact('classrooms', 'classroom_id'));
    }

    public function saveClassroomToAddSubject(Request $request)
    {
        $request->session()->put('classroom_id', $request->get('classroom_id'));
        return redirect()->route('classroom.add.subject.choose-subject');
    }

    public function chooseSubject(Request $request)
    {
        $classroom = Classroom::find($request->session()->get('classroom_id'));
        $subjects = Subject::where('major_id', '=', $classroom->major_id)->get();
        $subject_id = $request->session()->get('subject_id');
        return view('pages.Admin.add-classroom-subject.choose-subject', compact('subjects', 'subject_id'));
    }


    public function saveSubject(Request $request)
    {
        $classroom = Classroom::find($request->session()->get('classroom_id'));
        if ($classroom->subjects->contains($request->get('subject_id'))) {
            return back()->with('classroom.add.subject.choose.subject', 'This subject is already added to this classroom!');
        }
        $request->session()->put('subject_id', $request->get('subject_id'));

        return redirect()->route('classroom.add.subject.choose-lecturer');
    }


    public function chooseLecturerStep(Request $request)
    {
        $subject = Subject::find($request->session()->get('subject_id'));
        $lecturers = $subject->lecturers()->with('subjects')->get();


        return view('pages.Admin.add-classroom-subject.choose-lecturer', compact('lecturers'));
    }

    public function saveLecturer(Request $request)
    {


        $request->session()->put('lecturer_id', $request->get('lecturer_id'));

        return redirect()->route('classroom.add.subject.choose-schedule');
    }


    public function chooseScheduleStep(Request $request)
    {
        $slots = Slot::get();


        return view('pages.Admin.add-classroom-subject.choose-schedule', compact('slots'));
    }


    public function saveSchedule(Request $request)
    {
        $recurrences = $request->input('recurrence');
        $request->session()->put('slot_id', $request->get('slot_id'));
        $request->session()->put('start_date', $request->get('start_date'));
        $request->session()->put('end_date', $request->get('end_date'));
        $request->session()->put('recurrences', $recurrences);
        $classroom = Classroom::find($request->session()->get('classroom_id'));
        $lecturer = Lecturer::find($request->session()->get('lecturer_id'));
        $subject = Subject::find($request->session()->get('subject_id'));
        $schedule = new Schedule();
        $schedule->classroom_id = $request->session()->get('classroom_id');
        $schedule->lecturer_id = $request->session()->get('lecturer_id');
        $schedule->slot_id =  $request->session()->get('slot_id');
        $schedule->subject_id = $request->session()->get('subject_id');
        $schedule->start_date = $request->session()->get('start_date');
        $schedule->end_date = $request->session()->get('end_date');
        $recurrencesArray = $schedule->recurrence;
        for ($i = 0; $i <= 5; $i++) {
            if ((isset($recurrences[$i]))) {
                $recurrencesArray[$i] = $recurrences[$i];
            }
        }
        $schedule->recurrence = $recurrencesArray;
        for ($i = 0; $i < count($recurrencesArray); $i++) {  // this is used for check every day in recurrence
            //check whether there is any overlapped days with every request day
            $overlappedRecurrences = Schedule::whereJsonContains('recurrence', $recurrencesArray[$i])->get();

            // if there is any recurrences that are overlapped -> then check 
            if (count($overlappedRecurrences) > 0) {
                for ($j = 0; $j < count($overlappedRecurrences); $j++) {
                    //first we will check if this overlapped lecture is the same with the lecturer we add, as well as the classroom.
                    if (($overlappedRecurrences[$j]->lecturer_id == $request->session()->get('lecturer_id')) || ($overlappedRecurrences[$j]->classroom_id == $request->session()->get('classroom_id'))) {
                        // if recurrences are overlapped, check whether the slot is overlapped
                        if ($overlappedRecurrences[$j]->slot_id == $request->session()->get('slot_id')) {
                            $startDateRequest = date('Y-m-d', strtotime($request->session()->get('start_date')));
                            $endDateRequest = date('Y-m-d', strtotime($request->session()->get('end_date')));
                            $startDateSchedule = date('Y-m-d', strtotime($overlappedRecurrences[$j]->start_date));
                            $endDateSchedule = date('Y-m-d', strtotime($overlappedRecurrences[$j]->end_date));

                            //if slot is overlapped, check the date
                            if (($startDateRequest  >= $startDateSchedule  &&   $startDateRequest <= $endDateSchedule) || ($startDateRequest <= $startDateSchedule && $endDateRequest >= $startDateSchedule)) {

                                return back()->with('classroom_add_subject_finish', 'This schedule will be overlapped with other schedules!');
                            }
                        }
                    }
                }
            }
        }
        // get all the recurrences of the request lecturer's id that are overlapped 

        //  add new record to classroom subject table
        $attachValues = [];
        $attachValues[$subject->id] = ['lecturer_id' => $lecturer->id];
        $classroom->subjects()->syncWithoutDetaching($attachValues);




        $schedule->save();
        return redirect()->route('classroom.list')->with('classroom_add_subject_finish', 'Added the subject to the classroom successfully!');
    }


    public function removeClassroom($id)
    {
        $findUsed = Student::where('class_id', '=', $id)->get();
        if (count($findUsed) > 0) {
            return back()->with('classroom_delete_fail', "This classroom is being used for students, cannot delete it!");
        }
        Classroom::destroy($id);
        return redirect()->back()->with('classroom_delete', '
        Classroom has been removed successfully ');
    }
}
