@extends('pages.Lecturer.lecturer-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('take_score'))
<div class="alert alert-success" role="alert">{{Session::get('take_score')}} </div>
@endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Student List - {{$classroom->classCode}} - {{$subject->subjectName}}</h2>
          
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
                        <th>Grading</th>
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
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Grading</span>
                        </button>
                        <form action="{{route('takeScoreReport.post',['subject_id' => $subject->id,'student_id' => $student->id])}}" method="POST">                        
                          @csrf
                          <div class="dropdown-menu dropdown-menu-right">
                          <input type="submit" class="dropdown-item" name="status" value="Fail">
                          <input  type="submit" class="dropdown-item" name="status" value="Pass">
                          <input type="submit" class="dropdown-item" name="status" value="Merit">
                          <input  type="submit" class="dropdown-item" name="status" value="Distinc">
                        </div>
                         </form>

                      </td>
                      
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
  </main> <!-- main -->
  @endsection