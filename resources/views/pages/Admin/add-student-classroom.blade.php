<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Student to Classroom</title>
</head>
<body>
@if(Session::has('student_classroom_add'))
<span>{{Session::get('student_classroom_add')}}</span> 
@endif

  <form method="POST" action="{{route('save.studentClassroom')}}">
    @csrf 
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
     <label for="classroom">Choose a classroom:</label>
    <select name="classroom_id" id="classrooms">
        @foreach ($classrooms as $classroom)
          <option value="{{$classroom->id}}">{{$classroom->classCode}} </option>  
        @endforeach
    </select>
    <input type="submit" value="Submit">
  </form>

  



</body>
</html>