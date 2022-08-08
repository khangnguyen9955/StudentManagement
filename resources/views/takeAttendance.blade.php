f=@extends('pages.adminlayout')

@section('content')

<main role="main" class="main-content">


    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Classroom {{$classroom->classCode}}</h2>
          
          <div class="row my-4">
            
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <form action=""> 
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
                        <td>
                          <span class="text-muted sr-only">Attendance status</span>
                            <fieldset id="{{$student->id}}">
                           <input type="radio" name="attend-{{$student->id}}" value="{{$student->id}}"/> Attend
                           <input type="radio" name="attend-{{$student->id}}" value="{{$student->id}}" /> Absent
                            </fieldset>
                        </td>
                      </tr>
                      @endforeach
               
                    </tbody>
                  </table>
                  <input style="float:right; margin-right:20px;" class="btn btn-primary" type="submit" value="Submit">
                </form> 
                 <button style ="float:right; margin-right:10px" onclick="window.location='{{ URL::route('getSchedule'); }}'" class="btn btn-danger">Back</button>

                </div>
              </div>
            </div> <!-- simple table -->

          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
  </main> <!-- main -->
  @endsection