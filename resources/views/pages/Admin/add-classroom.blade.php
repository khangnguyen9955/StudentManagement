@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
@if(Session::has('classroom_add'))
<div class="alert alert-success" role="alert">
  {{Session::get('classroom_add')}}</div> 
@endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Add New Classroom</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Classroom information</strong>
                </div>
                <div class="card-body">
  <form method="POST" action="{{route('save.classroom')}}">
    @csrf
                    <div class="form-group mb-3">
                      <label for="major">Choose a major:</label>
                      <select name="major_id" id="majors">
                          @foreach ($majors as $major)
                            <option value="{{$major->id}}">{{$major->majorName}} </option>  
                          @endforeach
                  </select>
                      </div>
                    <a  class="btn btn-secondary" href="{{route('classroom.list')}}">
                      Back
                    </a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->

  </main> <!-- main -->
@endsection
