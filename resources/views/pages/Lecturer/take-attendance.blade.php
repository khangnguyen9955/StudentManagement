@extends('pages.Lecturer.lecturer-layout')

@section('content')
<main role="main" class="main-content">

@if(Session::has('attendance.success'))
<div class="alert alert-success" role="alert">
  {{Session::get('attendance.success')}}
</div>
@endif

@if(Session::has('attendance.failure'))
<div class="alert alert-danger" role="alert">
  {{Session::get('attendance.failure')}}
</div>
@endif
<div class="container-fluid">

<div class="row justify-content-center">
  <div class="col-12">
    <h2 class="mb-2 page-title">Classroom: {{$classroom->classCode}} - {{$subject->subjectCode}} - {{$date}}</h2>
    
    <div class="row my-4">
      
      <!-- Small table -->
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
                              <!-- table -->
            <table class="table datatables" id="dataTable-1">
              <thead>
                <tr>
                  <th>Student Code</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Major</th>
                  <th>Class code</th>
                  <th>Attendance status</th>
                </tr>
              </thead>
              <tbody>
              
               @foreach ($students as $student)
                <tr>
                 <td>{{$student->studentCode}}</td>
                  <td>{{$student->fullName}}</td>
                  <td>{{$student->email}}</td>
                  <td>{{$student->phone}}</td>
                  <td>{{$student->major->majorName}}</td>
                  <td>{{$student->classroom !== null ?  $student->classroom->classCode : "Not yet"}}</td>
                  <form action="{{route('saveAttendanceReport.post',['subject_id' => $subject->id,  'student_id'=>$student->id, 'date' => $date])}}" method="POST"> 
                    @csrf
                  <td>
                    <span class="text-muted sr-only">Attendance status</span>
                     <button type="submit" name="attendance" class="btn btn-success" value="Present" > Present</button>   
                     <button type="submit" name="attendance" class="btn btn-danger" value="Absent">Absent</button>
                  </td>
                </form> 

                </tr>
                @endforeach
              </tbody>
            </table>
           <button style="float:right; margin-right:20px;" class="btn btn-primary" onclick="window.location='{{ URL::route('lecturerCalendar') }}'">Finish</button>
           <button style ="float:right; margin-right:10px" onclick="window.location='{{ URL::route('lecturerCalendar') }}'" class="btn btn-warning">Back</button>
          </div>
        </div>
      </div> <!-- simple table -->
    </div> <!-- end section -->
  </div> <!-- .col-12 -->
</div> <!-- .row -->
</div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection