
@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('subject_list'))


<div class="alert alert-success" role="alert">{{Session::get('subject_list')}} </div>
@endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Subject List</h2>
          
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
                       </tr>  
                      </thead>
                      <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                          
                          <td>{{$subject->subjectCode}}
                          </td>
                          <td>{{$subject->subjectName}}</td>
                          <td>{{$subject->major->majorName}}</td>
                         
                         
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