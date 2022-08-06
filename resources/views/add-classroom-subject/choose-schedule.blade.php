@extends('pages.adminlayout')

@section('content')
<main role="main" class="main-content">
  @if(Session::has('classroom_add_subject_finish'))
<span>{{Session::get('classroom_add_subject_finish')}}</span> 
@endif
     <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <h2 class="page-title">Add Classroom Subject</h2>
                   
          <div class="card my-4">
            <div class="card-body">
              <form action="{{route('classroom.add.subject.choose.schedule.save')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><h4> Step 4: Choose Schedule</h4></div>
                      <div class="card-body">
                        <label for="recurrence"> <strong> Choose days (*) </strong></label>

                        <div class="form-group"> 
                           <input type="checkbox" name="recurrence[]" value="1" /> Monday
                          <input type="checkbox" name="recurrence[]" value="2" /> Tuesday
                          <input type="checkbox" name="recurrence[]" value="3" /> Wednesday
                          <input type="checkbox" name="recurrence[]" value="4" /> Thursday
                          <input type="checkbox" name="recurrence[]" value="5" /> Friday
                          <input type="checkbox" name="recurrence[]" value="6" /> Saturday
                        </div>
                        <label for="date"> <strong>Choose start and end date (*) </strong> </label>
                            <div class="form-group">
                              <label for="from">From</label>
                              <input type="text" id="from" name="start_date">
                              <label for="to">to</label>
                              <input type="text" id="to" name="end_date">
                            </div>

                            <label for="slots"> <strong>Choose slots (*) </strong> </label>

                            <div class="form-group">
                              <select name="slot_id" id="slots">
                                @foreach ($slots as $slot)        
                                <option value="{{$slot->id}}" >{{$slot->start_time}} - {{$slot->end_time}}</option>                                            
                                @endforeach
                              </select>
                           </div>


                    </div>
                      <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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