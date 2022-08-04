<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Student</title>
</head>
<body>
@if(Session::has('student_edit'))
<div class="alert alert-success" role="alert">{{Session::get('student_edit')}} </div>

@endif

  <form method="POST" action="{{url('update-student')}}">
    @csrf
    <input type="hidden" name="id" value="{{$students->id}}">
     Full Name: <br><input type="text" name="fullName" value="{{$students->fullName}}"><br>
     Email <br><input type="text" name="email" value="{{$students->email}}"><br>
     Phone <br><input type="text" name="phone" value="{{$students->phone}}"><br>
     <label for="major">Choose a major:</label>
    <select name="major_id" id="majors">
        {{-- <!-- <option value="{{$major_id}}"> {{$major->majorName}} </option> --> --}}
        @foreach ($majors as $major)
          <option value="{{$major->id}}">{{$major->majorName}} </option>  
        @endforeach
</select>
<label for="classroom">Choose a classroom:</label>
    <select name="classroom_id" id="classrooms">
  {{-- <!-- <option value="{{$major_id}}"> {{$major->majorName}} </option> --> --}}
  @foreach ($classrooms as $classroom)
    <option value="{{$classroom->id}}">{{$classroom->classCode}} </option>  
  @endforeach
</select>
    <input type="submit" value="Submit">
  </form>



</body>
</html>