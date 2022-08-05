@extends('pages.adminlayout')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <h2 class="page-title">Add Classroom subject</h2>
                   
          <div class="card my-4">
            <div class="card-header">
              <strong>Add subject form</strong>
            </div>
            <div class="card-body">
              <form id="example-form" action="#">
              <div>
                  <h3>Choose Subject</h3>
                  <section>
                <form>
                    {{-- <div class="form-group">
                      <label for="confirm">Confirm Password *</label>
                      <input id="confirm" name="confirm" type="text" class="form-control required">
                    </div> --}}
                    <div class="form-group">
                      <label for="subject">Choose subject (*) </label>
                      <select name="subject_id" id="subjects">
                      @foreach ($subjects as $subject)
                      <option value="{{$subject->id}}" >{{$subject->subjectCode}} - {{$subject->subjectName}} </option>                      
                      @endforeach
                      </select>
                    </div>
                    <div class="help-text text-muted">(*) Mandatory</div>
                </form>
                  </section>
                  <h3>Choose Lecturer</h3>
                  <section>
                <form>
                  <div class="form-group">
                    <label for="lecturer">Choose Lecturer (*) </label>
                    <select name="lecturer_id" id="lecturers">
                    @foreach ($lecturers as $lecturer)
                    <option value="{{$lecturer->id}}" >{{$lecturer->lecturerCode}} - {{$lecturer->fullName}} </option>                      
                    @endforeach
                    </select>
                  </div>
                  <div class="help-text text-muted">(*) Mandatory</div>
                </form>
                  </section>
                </form>
                  <h3>Choose schedule</h3>
                  <section>
                    <form>
                    <ul class="ml-5">
                      <li>Foo</li>
                      <li>Bar</li>
                      <li>Foobar</li>
                    </ul>
                    </form>
                  </section>
                         <h3>Finish</h3>
                  <section>
                  <form action="">             
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                  </form>
                  </section>
                </div>
              </form>
            </div> <!-- .card-body -->
          </div> <!-- .card -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  
  </main> <!-- main -->
  @endsection