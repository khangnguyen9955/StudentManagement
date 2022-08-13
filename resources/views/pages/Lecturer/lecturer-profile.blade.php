@extends('pages.Lecturer.lecturer-layout')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="h3 mb-4 page-title"> Lecturer Profile</h2>
          <div class="row mt-5 align-items-center">
            <div class="col-md-3 text-center mb-5">
              <h4>{{$lecturer->fullName}} - {{$lecturer->lecturerCode}}</h4>
            </div>
        
          </div>
          <div class="row my-4">
            <div class="col-md-4">
              <div class="card mb-4 shadow">
                <div class="card-body my-n3">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-lg bg-light">
                        <i class="fe fe-user fe-24 text-primary"></i>
                      </span>
                    </div> <!-- .col -->
                    <div class="col">
                      <a href="#">
                        <h3 class="h5 mt-4 mb-1">Email</h3>
                      </a>
                      <p class="text-muted">{{$lecturer->email}}</p>
                    </div> <!-- .col -->
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
            
              </div> <!-- .card -->
            </div> <!-- .col-md-->
            <div class="col-md-4">
              <div class="card mb-4 shadow">
                <div class="card-body my-n3">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-lg bg-light">
                        <i class="fe fe-shield fe-24 text-primary"></i>
                      </span>
                    </div> <!-- .col -->
                    <div class="col">
                      <a href="#">
                        <h3 class="h5 mt-4 mb-1">Phone Number</h3>
                      </a>
                      <p class="text-muted">{{$lecturer->phone}}</p>
                    </div> <!-- .col -->
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
                
              </div> <!-- .card -->
            </div> <!-- .col-md-->

       
            <div class="col-md-4">
              <div class="card mb-4 shadow">
                <div class="card-body my-n3">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-lg bg-light">
                        <i class="fe fe-shield fe-24 text-primary"></i>
                      </span>
                    </div> <!-- .col -->
                    <div class="col">
                      <a href="#">
                        <h3 class="h5 mt-4 mb-1">Major</h3>
                      </a>
                      <p class="text-muted">{{$lecturer->major->majorName}}</p>
                    </div> <!-- .col -->
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
                
              </div> <!-- .card -->
            </div> <!-- .col-md--> 
          </div> <!-- .row-->
         
        </div> <!-- /.col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  
  </main> <!-- main -->
@endsection