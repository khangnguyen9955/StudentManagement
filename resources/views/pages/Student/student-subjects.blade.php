
@extends('pages.Student.student-layout')

@section('content')

<main role="main" class="main-content">

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Subject List - {{$classroom->classCode}}</h2>
          
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
                        <th>Major</th>
                        <th>View Attendance Report</th>
                       </tr>  
                      </thead>
                      <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                          
                          <td>{{$subject->subjectCode}}
                          </td>
                          <td>{{$subject->subjectName}}</td>
                          <td>{{$subject->major->majorName}}</td>
                          <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">View Attendance Report</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="{{route('studentAttendance',['subject_id'=>$subject->id])}}">View Attendane Report</a>
                          </div>
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
    

</body>
</html>