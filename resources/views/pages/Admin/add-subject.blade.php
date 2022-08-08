<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Subject</title>
</head>
<body>
@if(Session::has('subject_add'))
<span>{{Session::get('subject_add')}}</span> 
@endif

  <form method="POST" action="{{route('save.subject')}}">
    @csrf
     Subject Name: <br>
     <input type="text" name="subjectName" value="">
     <br>
     <label for="major">Choose a major:</label>
    <select name="major_id" id="majors">
        @foreach ($majors as $major)
          <option value="{{$major->id}}">{{$major->majorName}} </option>  
        @endforeach
</select>
    <input type="submit" value="Submit">
  </form>



</body>
</html>