<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Student to Classroom</title>
</head>
<body>
@if(Session::has('lecturer_subject_add'))
<span>{{Session::get('lecturer_subject_add')}}</span> 
@endif

  <form method="POST" action="{{route('save.lecturerSubject')}}">
    @csrf 
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
     <label for="subject">Choose a subject:</label>
    <select name="subject_id" id="subjects">
        @foreach ($subjects as $subject)
          <option value="{{$subject->id}}">{{$subject->subjectCode}} - {{$subject->subjectName}} </option>  
        @endforeach
    </select>
    <input type="submit" value="Submit">
  </form>

  



</body>
</html>