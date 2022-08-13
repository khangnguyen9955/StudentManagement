
@extends('pages.Student.student-layout')

@section('content')

<main role="main" class="main-content">

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Attendance Report -  {{$subject->subjectName}} - {{$student->studentCode}}</h2>
          
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>Attendance status</th>
                        <th>Made at </th>
                       </tr>  
                      </thead>
                      <tbody>
                        @foreach ($attendances as $attendance)
                        <tr>
                          <td>
                            @if($attendance->status == "Absent")
                            <span class="text-danger">{{$attendance->status}}</span>
                            @else
                            <span class="text-success">{{$attendance->status}}</span>
                            @endif
                          </td>
                          <td>{{$attendance->created_at}}</td>
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