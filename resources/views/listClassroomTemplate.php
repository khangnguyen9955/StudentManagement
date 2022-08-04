<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Student List</title>
</head>
<body>
  <table>
    <tr>
    <th>Classroom Code</th> 
    <th>Major</th>
    </tr>  
 
      @foreach($classrooms as $classroom)
      <tr>
         <td>{{$classroom->classCode}}</td>
         <td>{{$classroom->major->majorName}}</td>
      </tr>
      @endforeach
  
  </table> 


</body>
</html>