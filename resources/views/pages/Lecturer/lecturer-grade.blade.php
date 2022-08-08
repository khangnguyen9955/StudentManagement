@extends('pages.Lecturer.lecturer-layout')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row" style="justify-content:center;">
                        <!-- Small table -->
                        <div class="col-md-6 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Small table</h5>
                                    <p class="card-text">Add .table-sm to make tables more compact by cutting cell padding
                                        in half.</p>
                                    <table class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Grading</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3224</td>
                                                <td>Keith Baird</td>
                                                <td>Enim Limited</td>
                                                <td>901-6206 Cras Av.</td>
                                                <td>Apr 24, 2019</td>
                                                <td><span class="text-warning">Hold</span></td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Fail</a>
                                                        <a class="dropdown-item" href="#">Pass</a>
                                                        <a class="dropdown-item" href="#">Merit</a>
                                                        <a class="dropdown-item" href="#">Distinction</a>
                                                        <a class="dropdown-item" href="#">Not yet</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3218</td>
                                                <td>Graham Price</td>
                                                <td>Nunc Lectus Incorporated</td>
                                                <td>Ap #705-5389 Id St.</td>
                                                <td>May 23, 2020</td>
                                                <td><span class="text-warning">Success</span></td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Fail</a>
                                                        <a class="dropdown-item" href="#">Pass</a>
                                                        <a class="dropdown-item" href="#">Merit</a>
                                                        <a class="dropdown-item" href="#">Distinction</a>
                                                        <a class="dropdown-item" href="#">Not yet</a>
                                                    </div>
                                                </td>
                                            </tr>



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
