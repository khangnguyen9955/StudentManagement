@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('lecturer_list'))
<div class="alert alert-success" role="alert">{{Session::get('lecturer_list')}} </div>
@endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Lecturer List</h2>
          
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th>Lecturer Code</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Major</th>
                        <th>Action</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @foreach ($lecturers as $lecturer)
                        <tr>
                          
                          <td>{{$lecturer->lecturerCode}}</td>
                          <td>{{$lecturer->fullName}}</td>
                          <td>{{$lecturer->email}}</td>
                          <td>{{$lecturer->phone}}</td>
                          <td>{{$lecturer->major->majorName}}</td>
                         
                          <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{route('lecturer.edit',['id'=>$lecturer->id])}}">Edit</a>
                              <a class="dropdown-item" href="{{route('lecturer.remove',['id' => $lecturer->id])}}">Remove</a>
                              
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
    