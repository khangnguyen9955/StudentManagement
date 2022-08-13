@extends('pages.Lecturer.lecturer-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('student_list'))


<div class="alert alert-success" role="alert">{{Session::get('student_list')}} </div>
@endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Subject of Lecturer</h2>
          
          
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($subjects as $subject)
                     <tr>
                        <td>{{$subject->subjectCode}}</td>
                        <td>{{$subject->subjectName}}</td>
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