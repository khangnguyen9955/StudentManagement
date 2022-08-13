@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('student_classroom_add'))
  <div class="alert alert-success" role="alert">{{Session::get('student_classroom_add')}}</div>
  @elseif(Session::has('student_classroom_add_fail'))
  <div class="alert alert-danger" role="alert">{{Session::get('student_classroom_add_fail')}}</div>
  @endif

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Add Student To Classroom</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Information</strong>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('save.studentClassroom')}}">
                    @csrf 
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="student">Choose a student:</label>
                        <select name="student_id" id="students">
                          @if(count($students) > 0 )
                            @foreach ($students as $student)
                              <option  value="{{$student->id}}">{{$student->studentCode}} </option>  
                            @endforeach
                          @else
                          <option value="">There is no available student</option>
                          @endif
                        </select>
                      </div>
                    </div> <!-- /.form-row -->
                    <div class="form-group mb-3">
                      <label for="classroom">Choose a classroom:</label>
    <select name="classroom_id" id="classrooms">
        @foreach ($classrooms as $classroom)
          <option value="{{$classroom->id}}">{{$classroom->classCode}} </option>  
        @endforeach
    </select>
                      </div>
                    <a  class="btn btn-secondary" href="{{route('student.list')}}">
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
