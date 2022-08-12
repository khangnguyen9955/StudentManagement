<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AuthenticationController;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});



Route::get('/login', [AuthenticationController::class, 'Login']);




Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('/add-student-form', [StudentController::class, 'viewAddStudentForm']);
    Route::get('/add-student', [StudentController::class, 'addStudent'])->name('student.add');
    Route::post('/add-student', [StudentController::class, 'saveStudent'])->name('save.student');
    Route::get('/list-student', [StudentController::class, 'studentList'])->name('student.list');
    Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
    Route::post('/update-student', [StudentController::class, 'updateStudent'])->name('update.student');
    Route::get('/remove-student/{id}', [StudentController::class, 'removeStudent'])->name('student.remove');


    Route::get('/multi-form', [ClassroomController::class, 'showMultiForm']);
    Route::get('/add-classroom', [ClassroomController::class, 'addClassroom'])->name('classroom.add');
    Route::post('/add-classroom', [ClassroomController::class, 'saveClassroom'])->name('save.classroom');
    Route::get('/list-classroom', [ClassroomController::class, 'classroomList'])->name('classroom.list');
    Route::get('/remove-classroom/{id}', [ClassroomController::class, 'removeClassroom'])->name('classroom.remove');


    Route::get('/add-subject', [SubjectController::class, 'addSubject'])->name('subject.add');
    Route::post('/add-subject', [SubjectController::class, 'saveSubject'])->name('save.subject');
    Route::get('/list-subject', [SubjectController::class, 'subjectList'])->name('subject.list');

    Route::get('/add-lecturer-form', [LecturerController::class, 'viewAddLecturerForm']);
    Route::get('/add-lecturer', [LecturerController::class, 'addLecturer'])->name('lecturer.add');
    Route::post('/add-lecturer', [LecturerController::class, 'saveLecturer'])->name('save.lecturer');
    Route::get('/list-lecturer', [LecturerController::class, 'lecturerList'])->name('lecturer.list');

    Route::get('/edit-lecturer/{id}', [LecturerController::class, 'editLecturer'])->name('lecturer.edit');
    Route::post('/update-lecturer', [LecturerController::class, 'updateLecturer'])->name('update.lecturer');
    Route::get('/remove-lecturer/{id}', [LecturerController::class, 'removeLecturer'])->name('lecturer.remove');

    Route::get('/add-student-classroom', [StudentController::class, 'addStudentToClassroom'])->name('studentClassroom.add');
    Route::post('/add-student-classroom', [StudentController::class, 'saveStudentToClassroom'])->name('save.studentClassroom');
    Route::get('/list-student-classroom', [StudentController::class, 'studentClassroomList'])->name('studentClassroom.list');

    Route::get('/add-lecturer-subject', [LecturerController::class, 'addLecturerSubject'])->name('lecturerSubject.add');
    Route::post('/add-lecturer-subject', [LecturerController::class, 'saveLecturerSubject'])->name('save.lecturerSubject');


    Route::get('add-classroom-subject/choose-classroom', [ClassroomController::class, 'chooseClassroomToAddSubject'])->name('classroom.add.subject.choose-classroom');
    Route::post('add-classroom-subject/choose-classroom', [ClassroomController::class, 'saveClassroomToAddSubject'])->name('classroom.add.subject.choose.classroom.save');


    Route::get('add-classroom-subject/choose-subject', [ClassroomController::class, 'chooseSubject'])->name('classroom.add.subject.choose-subject');
    Route::post('add-classroom-subject/choose-subject', [ClassroomController::class, 'saveSubject'])->name('classroom.add.subject.choose.subject.save');

    Route::get('add-classroom-subject/choose-lecturer', [ClassroomController::class, 'chooseLecturerStep'])->name('classroom.add.subject.choose-lecturer');
    Route::post('add-classroom-subject/choose-lecturer', [ClassroomController::class, 'saveLecturer'])->name('classroom.add.subject.choose.lecturer.save');

    Route::get('add-classroom-subject/choose-schedule',  [ClassroomController::class, 'chooseScheduleStep'])->name('classroom.add.subject.choose-schedule');
    Route::post('add-classroom-subject/choose-schedule', [ClassroomController::class, 'saveSchedule'])->name('classroom.add.subject.choose.schedule.save');
});

Route::group(['prefix' => 'student', 'middleware' => ['isStudent', 'auth', 'PreventBackHistory']], function () {
    Route::get('/list-student1', [StudentController::class, 'studentList1'])->name('student.list1');
    Route::get('/student-profile', [StudentController::class, 'viewStudentProfile'])->name('student.profile');
    Route::get('/student-calendar', [ScheduleController::class, 'viewStudentCalendar']);
});

// Route::group(['prefix'=>'lecturer', 'middleware'=>['isLecturer','auth','PreventBackHistory']], function()
// {

//     Route::get('/lecturer-profile', [LecturerController::class, 'viewLecturerProfile'])->name('lecturer.profile');
//     Route::get('/list-student2', [StudentController::class, 'studentList2'])->name('student.list2');
//     Route::get('/lecturer-calendar', [ScheduleController::class, 'viewLecturerCalendar']);
//     Route::get('/admin-calendar', [ScheduleController::class, 'getSchedule'])->name('getSchedule');

// });

// Route::group(['prefix' => 'student', 'middleware' => ['isStudent', 'auth', 'PreventBackHistory']], function () {
// Route::get('/list-student1', [StudentController::class, 'studentList1'])->name('student.list');
// Route::get('/student-profile', [StudentController::class, 'viewStudentProfile'])->name('student.profile');
// Route::get('/student-calendar', [ScheduleController::class, 'viewStudentCalendar']);
// });

Route::group(['prefix' => 'lecturer', 'middleware' => ['isLecturer', 'auth', 'PreventBackHistory']], function () {

    Route::get('/lecturer-profile', [LecturerController::class, 'viewLecturerProfile'])->name('lecturer.profile');
    Route::get('/list-student2', [StudentController::class, 'studentList2'])->name('student.list');
    Route::get('/lecturer-calendar', [ScheduleController::class, 'viewLecturerCalendar']);
    Route::get('/list-classroom-lecturer', [LecturerController::class, 'viewLecturerClass'])->name('lecturer-classroom.list');
    Route::get('/take-attendance/{subject_id}/{classroom_id}/{date}', [AttendanceController::class, 'getAttendanceReport'])->name('getAttendanceReport');
    Route::post('/save-attendance/{subject_id}/{student_id}', [AttendanceController::class, 'saveAttendanceReport'])->name('saveAttendanceReport.post');
    Route::get('/take-score/{classroom_id}/{subject_id}', [LecturerController::class, 'getScoreReport'])->name('getScoreReport');
    Route::post('/save-score/{subject_id}/{student_id}', [LecturerController::class, 'takeScoreReport'])->name('takeScoreReport.post');
    Route::get('view-student-classroom/{classroom_id}/{subject_id}', [LecturerController::class, 'viewStudentClassroom'])->name('viewStudentClassroom');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
