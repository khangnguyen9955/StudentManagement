@extends('pages.adminlayout')

@section('content')
<main role="main" class="main-content">
  
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <h2 class="page-title">Add Classroom Subject</h2>
                   
          <div class="card my-4">
            <div class="card-body">
              <form action="{{ route('classroom.add.subject.choose.lecturer.save')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><h4> Step 3: Choose Lecturer</h4></div>
                      <div class="card-body">
                            <div class="form-group">
                              <label for="lecturer"> <strong> Choose Lecturer(*) </strong></label>
                              <select name="lecturer_id" id="lecturers">
                              @foreach ($lecturers as $lecturer)
                              <option value="{{$lecturer->id}}" >{{$lecturer->lecturerCode}} - {{$lecturer->fullName}} </option>                      
                              @endforeach
                              </select>
                            </div>
                    </div>
                      <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
            </div> <!-- .card-body -->
          </div> <!-- .card -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  
  </main> <!-- main -->
  @endsection