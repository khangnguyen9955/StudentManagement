@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('classroom_add_subject_finish'))
  <div class="alert alert-success" role="alert">{{Session::get('classroom_add_subject_finish')}} </div>  
  @endif 
@if(Session::has('classroom_list'))
<div class="alert alert-success" role="alert">{{Session::get('classroom_list')}} </div>
@endif
 @if(Session::has('classroom_delete'))
<div class="alert alert-success" role="alert">{{Session::get('classroom_delete')}} </div>
 @elseif(Session::has('classroom_delete_fail'))
<div class="alert alert-danger" role="alert">{{Session::get('classroom_delete_fail')}} </div>
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
                     
                        <th>Classroom Code</th>
                        <th>Major</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($classrooms as $classroom)
                      <tr >
                        
                        <td>
                           {{$classroom->classCode}}
                        </td>
                        <td>{{$classroom->major->majorName}}</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('classroom.edit',['id'=>$classroom->id])}}">Edit</a>                         
                             <a class="dropdown-item" href="{{route('classroom.remove',['id'=>$classroom->id])}}">Remove</a>
                             <a class="dropdown-item" href="{{route('viewStudentInClassroom',['id'=> $classroom->id])}}">View students</a>
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
  @endsection