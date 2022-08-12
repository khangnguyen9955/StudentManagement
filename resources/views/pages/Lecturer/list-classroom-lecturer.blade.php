@extends('pages.Lecturer.lecturer-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('student_list'))


<div class="alert alert-success" role="alert">{{Session::get('student_list')}} </div>
@endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Classroom List</h2>
          
          
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>Class Code</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allClassrooms as $classroom)
                      @php
                      $subjects = $classroom->subjects()->get();
                      @endphp
                      @for($i = 0; $i<count($subjects); $i++ )
                      <tr>
                        <td>{{$classroom->classCode}}</td>
                        <td>{{$subjects[$i]->subjectName}}</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="{{route('getScoreReport',['classroom_id' => $classroom->id, 'subject_id'=>$subjects[$i]->id])}}" >Grade this class</a>
                          <a class="dropdown-item" href="{{route('viewStudentClassroom',['classroom_id'=> $classroom->id,'subject_id'=>$subjects[$i]->id])}}">View students</a>
                        </div>
                      </td>
                      </tr>
                      @endfor

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