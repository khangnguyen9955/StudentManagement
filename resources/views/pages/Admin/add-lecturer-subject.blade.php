@extends('pages.Admin.admin-layout')

@section('content')

<main role="main" class="main-content">
  @if(Session::has('lecturer_subject_add'))
  <span>{{Session::get('lecturer_subject_add')}}</span> 
  @endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title" style=" text-align: center; ">Add Subject For Lecturer</h2>
          <div class="row" style="justify-content: center; ">          
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Information</strong>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('save.lecturerSubject')}}">
                    @csrf 
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="lecturer">Choose a lecturer:</label>
                        <select name="lecturer_id" id="lecturers">
                          @if(count($lecturers) > 0 )
                            @foreach ($lecturers as $lecturer)
                              <option  value="{{$lecturer->id}}">{{$lecturer->lecturerCode}} </option>  
                            @endforeach
                          @else
                          <option value="">There is no available lecturer</option>
                          @endif
                        </select>
                      </div>
                    </div> <!-- /.form-row -->
                    <div class="form-group mb-3">
                      <label for="subject">Choose a subject:</label>
    <select name="subject_id" id="subjects">
        @foreach ($subjects as $subject)
          <option value="{{$subject->id}}">{{$subject->subjectCode}} - {{$subject->subjectName}} </option>  
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
