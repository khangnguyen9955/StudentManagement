<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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


Route::get('/smallTable', [StudentController::class, 'viewSmallTable']);
Route::get('/studentprofile', [StudentController::class, 'viewStudentProfile']);
Route::get('/calendar', [StudentController::class, 'viewCalendar']);
Route::get('/addstudentform', [StudentController::class, 'viewAddStudentForm']);


Route::get('/add-student', [StudentController::class, 'addStudent'])->name('student.add');
Route::post('/add-student', [StudentController::class, 'saveStudent'])->name('save.student');
Route::get('/list-student', [StudentController::class, 'studentList'])->name('student.list');
Route::get('/list-student1', [StudentController::class, 'studentList1'])->name('student.list');


Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
Route::post('/update-student', [StudentController::class, 'updateStudent'])->name('update.student');
Route::get('/remove-student/{id}', [StudentController::class, 'removeStudent'])->name('student.remove');


Route::get('/add-classroom', [ClassroomController::class, 'addClassroom'])->name('classroom.add');
Route::post('/add-classroom', [ClassroomController::class, 'saveClassroom'])->name('save.classroom');
Route::get('/list-classroom', [ClassroomController::class, 'classroomList'])->name('classroom.list');
Route::get('/remove-classroom/{id}', [ClassroomController::class, 'removeClassroom'])->name('classroom.remove');


Route::get('/add-subject', [SubjectController::class, 'addSubject'])->name('subject.add');
Route::post('/add-subject', [SubjectController::class, 'saveSubject'])->name('save.subject');
Route::get('/list-subject', [SubjectController::class, 'subjectList'])->name('subject.list');



Route::get('/addlecturerform', [LecturerController::class, 'viewAddLecturerForm']);
Route::get('/add-lecturer', [LecturerController::class, 'addLecturer'])->name('lecturer.add');
Route::post('/add-lecturer', [LecturerController::class, 'saveLecturer'])->name('save.lecturer');
Route::get('/list-lecturer', [LecturerController::class, 'lecturerList'])->name('lecturer.list');



Route::get('/add-student-classroom', [StudentController::class, 'addStudentToClassroom'])->name('studentClassroom.add');
Route::post('/add-student-classroom', [StudentController::class, 'saveStudentToClassroom'])->name('save.studentClassroom');
Route::get('/list-student-classroom', [StudentController::class, 'studentClassroomList'])->name('studentClassroom.list');

Route::get('/add-lecturer-subject', [LecturerController::class, 'addLecturerSubject'])->name('lecturerSubject.add');
Route::post('/add-lecturer-subject', [LecturerController::class, 'saveLecturerSubject'])->name('save.lecturerSubject');









Route::get('add-classroom-subject/choose-classroom', [ClassroomController::class, 'chooseClassroomToAddSubject'])->name('classroom.add.subject.choose.classroom');
Route::post('add-classroom-subject/choose-classroom', [ClassroomController::class, 'saveClassroomToAddSubject'])->name('classroom.add.subject.choose.classroom.save');

Route::get('add-classroom-subject/choose-subject', [ClassroomController::class, 'chooseSubject'])->name('classroom.add.subject.choose.subject');
Route::post('add-classroom-subject/choose-subject', [ClassroomController::class, 'saveSubject'])->name('classroom.add.subject.choose.subject.save');

Route::get('add-classroom-subject/choose-lecturer', [ClassroomController::class, 'chooseLecturerStep'])->name('classroom.add.subject.choose.lecturer');
Route::post('add-classroom-subject/choose-lecturer', [ClassroomController::class, 'saveLecturer'])->name('classroom.add.subject.choose.lecturer.save');

Route::get('add-classroom-subject/choose-schedule',  [ClassroomController::class, 'chooseScheduleStep'])->name('classroom.add.subject.choose.schedule');
Route::post('add-classroom-subject/choose-schedule', [ClassroomController::class, 'saveSchedule'])->name('classroom.add.subject.choose.schedule.save');
