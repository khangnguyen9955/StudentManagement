@extends('pages.Admin.adminlayout')

@section('content')
<main role="main" class="main-content">
  @if(Session::has('classroom.add.subject.choose.subject'))
  <span>{{Session::get('classroom.add.subject.choose.subject')}}</span> 
  @endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <h2 class="page-title">Add Classroom Subject</h2>
                   
          <div class="card my-4">
           
            <div class="card-body">
              <form action="{{ route('classroom.add.subject.choose.subject.save') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><h4> Step 2: Choose Subject</h4></div>
                      <div class="card-body">
                            <div class="form-group">
                              <label for="subject"> <strong>Choose Subject(*) </strong></label>
                              <select name="subject_id" id="subjects">
                              @foreach ($subjects as $subject)
                              <option value="{{$subject->id}}" >{{$subject->subjectCode}} - {{$subject->subjectName}} </option>                      
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