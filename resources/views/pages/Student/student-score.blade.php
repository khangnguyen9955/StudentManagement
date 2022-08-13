@extends('pages.Student.student-layout')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row" style="justify-content:center;">
                        <!-- Small table -->
                        <div class="col-md-12 ">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Score Reports</h5>
                                    <table class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Classroom code</th>
                                                <th>Created at </th>
                                                <th>Status</th>
                                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($scores as $score)
                                              
                                            <tr>
                                                <td>{{$score->subject->subjectName}}</td>
                                                <td>{{$score->subject->subjectCode}}</td>
                                                <td>{{$classroom->classCode}}</td>
                                                <td>{{$score->created_at}}</td>
                                                <td>
                                                 @if($score->score == "Fail") 
                                                 <span class="text-danger">{{$score->score}}</span>
                                                 @else
                                                  <span class="text-success">{{$score->score}}</span>
                                                  @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                        <!--Expandable rows -->

                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
