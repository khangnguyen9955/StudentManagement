<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Subject List</title>
</head>
<body>
  <table>
    <tr>
    <th>Subject Code</th> 
    <th>Subject Name</th>
    <th>Major</th>
   </tr>  
 
      @foreach($subjects as $subject)
      <tr>
          <td>{{$subject->subjectCode}}
          </td>
          <td>{{$subject->subjectName}}</td>
          <td>{{$subject->major->majorName}}</td>
      </tr>
      @endforeach
  
  </table> 


</body>
</html>