@extends('pages.Admin.admin-layout')

@section('content')
<main role="main" class="main-content">
  @if(Session::has('lecturer_add'))
  <div class="alert alert-success" role="alert">
  {{Session::get('lecturer_add')}}</div> 
  @elseif(Session::has('lecturer_add_fail'))
  <div class="alert alert-danger" role="alert">
  {{Session::get('lecturer_add_fail')}}</div> 
  @endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Add Lecturer</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Lecturer information</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate method="POST" action="{{route('save.lecturer')}}">
                    @csrf
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Full Name</label>
                        <input type="text" class="form-control" id="validationCustom3" value="" placeholder="Enter lecturer's full name" required name="fullName">
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                     
                      <div class="col-md-6 mb-3">
                        
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div> <!-- /.form-row -->
                    <div class="form-row">
                      
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter your email" required name="email">
                        <div class="invalid-feedback"> Please use a valid email </div>
                        <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>

                    </div> <!-- /.form-row -->

           
                    
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Phone Number</label>
                      <input type="text" id="address-wpalaceholder" class="form-control" placeholder="Enter your phone number" required name="phone">
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

                    <a  class="btn btn-secondary" href="{{url('/list-student')}}">
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
