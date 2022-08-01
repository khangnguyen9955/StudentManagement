<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lecturer List</title>
</head>
<body>
  <table>
    <tr>
    <th>Lecturer Code</th> 
    <th>Full Name</th>
    <th>Password</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Major</th>
    </tr>  
 
      @foreach($lecturers as $lecturer)
      <tr>
          <td>{{$lecturer->lecturerCode}}
          </td>
          <td>{{$lecturer->fullName}}</td>
          <td>{{$lecturer->password}}</td>
          <td>{{$lecturer->email}}</td>
          <td>{{$lecturer->phone}}</td>
          <td>{{$lecturer->major->majorName}}</td>
      </tr>
      @endforeach
  
  </table> 


</body>
</html>