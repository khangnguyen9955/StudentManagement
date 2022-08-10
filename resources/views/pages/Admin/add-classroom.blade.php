<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add New Class</title>
</head>
<body>
@if(Session::has('classroom_add'))
<span>{{Session::get('classroom_add')}}</span> 
@endif
  <h1>Add new class</h1>
  <form method="POST" action="{{route('save.classroom')}}">
    @csrf
    <label for="major">Choose a major of this class:</label>
    <select name="major_id" id="majors">
        @foreach ($majors as $major)
          <option value="{{$major->id}}">{{$major->majorName}} </option>  
        @endforeach
</select>
    <input type="submit" value="Submit">
  </form>



</body>
</html>