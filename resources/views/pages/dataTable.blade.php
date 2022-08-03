@extends('pages.studentlayout')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="mb-2 page-title">Data table</h2>
          <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p>
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                      <tr>
                        <th></th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <label class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>368</td>
                        <td>Imani Lara</td>
                        <td>(478) 446-9234</td>
                        <td>Asset Management</td>
                        <td>Borland</td>
                        <td>9022 Suspendisse Rd.</td>
                        <td>High Wycombe</td>
                        <td>Jun 8, 2019</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <label class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>323</td>
                        <td>Walter Sawyer</td>
                        <td>(671) 969-1704</td>
                        <td>Tech Support</td>
                        <td>Macromedia</td>
                        <td>Ap #708-5152 Cursus. Ave</td>
                        <td>Bath</td>
                        <td>May 8, 2020</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <label class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>371</td>
                        <td>Noelle Ray</td>
                        <td>(803) 792-2559</td>
                        <td>Human Resources</td>
                        <td>Sibelius</td>
                        <td>Ap #992-8933 Sagittis Street</td>
                        <td>Ivanteyevka</td>
                        <td>Apr 2, 2021</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
  </main> <!-- main -->
  @endsection