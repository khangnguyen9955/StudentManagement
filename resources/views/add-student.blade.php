<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Student</title>
</head>
<body>
@if(Session::has('student_add'))
<span>{{Session::get('student_add')}}</span> 
@endif

  <form method="POST" action="{{route('save.student')}}">
    @csrf
     Full Name: <br><input type="text" name="fullName" value=""><br>
     Password:  <br><input type="text" name="password" value=""><br> 
     Email <br><input type="text" name="email" value=""><br>
     Phone <br><input type="text" name="phone" value=""><br>
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