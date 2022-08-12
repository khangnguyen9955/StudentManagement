@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
@if(Session::has('classroom_edit'))
<div class="alert alert-success" role="alert">
  {{Session::get('classroom_edit')}}</div> 
@elseif(Session::has('classroom_edit_fail'))
<div class="alert alert-danger" role="alert">
  {{Session::get('classroom_edit_fail')}}</div> 
@endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Edit Classroom</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Classroom information</strong>
                </div>
                <div class="card-body">
  <form method="POST" action="{{route('update.classroom')}}">
    @csrf
    <input type="hidden" name="id" value="{{$classroom->id}}">
    <div class="form-row">
      <div class="-md-6 mb-3">
        <label for="validationCustom3">Classroom Code: </label>
        <span> <strong> {{$classroom->classCode}} </strong></span>
        <div class="valid-feedback"> Looks good! </div>
      </div>
    </div>
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
