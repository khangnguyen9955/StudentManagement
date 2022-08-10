@extends('pages.adminlayout')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <h2 class="page-title">Add Classroom Subject</h2>
                   
          <div class="card my-4">
           
            <div class="card-body">
              <form action="{{route('classroom.add.subject.choose.classroom.save')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><h4> Step 1: Choose Classroom</h4></div>
                      <div class="card-body">
                            <div class="form-group">
                              <label for="classroom"> <strong> Choose Classroom(*) </strong> </label>
                              <select name="classroom_id" id="classrooms">
                                @foreach ($classrooms as $classroom)        
                                <option value="{{$classroom->id}}" >{{$classroom->classCode}}</option>                                            
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