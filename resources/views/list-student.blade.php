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
    <th>Student Code</th> 
    <th>Full Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Major</th>
    <th>Class code</th>
    </tr>  
 
      @foreach($students as  $student )
      <tr>
          <td>{{$student->studentCode}}
          </td>
          <td>{{$student->fullName}}</td>
          <td>{{$student->email}}</td>
          <td>{{$student->phone}}</td>
          <td>{{$student->major->majorName}}</td>
          <td>{{$student->classroom !== null ? $student->classroom->classCode : "Not yet" }}</td> 
      </tr>
      @endforeach
  
  </table> 


</body>
</html>