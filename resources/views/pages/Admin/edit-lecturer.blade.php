@extends('pages.Admin.admin-layout')

@section('content')
<main role="main" class="main-content">
  @if(Session::has('lecturer_edit'))
<div class="alert alert-success" role="alert">{{Session::get('lecturer_edit')}} </div>
@endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Edit Lecturer</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Lecturer information</strong>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('update.lecturer')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$lecturers->id}}">
                              <div class="form-group mb-3">
                      <label for="validationCustom3">Full Name</label>
                      <input type="text" class="form-control" id="validationCustom3" placeholder="Enter lecturer's full name" required  name="fullName" value="{{$lecturers->fullName}}">
                      <div class="valid-feedback"> Looks good! </div>                    </div>
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Phone Number</label>
                      <input type="text" id="address-wpalaceholder"  value="{{$lecturers->phone}}" class="form-control" placeholder="Enter your phone number" required name="phone">
                      <div class="invalid-feedback"> Please enter your phone number</div>
                    </div>
                    <div class="form-group mb-3">
                    <label for="major">Choose a major:</label>
                    <select name="major_id" id="majors">
                        @foreach ($majors as $major)
                          <option value="{{$major->id}}">{{$major->majorName}} </option>  
                        @endforeach
                </select>
                    </div>

                    <a  class="btn btn-secondary" href="{{route('lecturer.list')}}">
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
