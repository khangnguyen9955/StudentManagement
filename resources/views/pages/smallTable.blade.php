@extends('pages.layout')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="row">
            <!-- Small table -->
            <div class="col-md-6 my-4">
              <div class="card shadow">
                <div class="card-body">
                  <h5 class="card-title">Small table</h5>
                  <p class="card-text">Add .table-sm to make tables more compact by cutting cell padding in half.</p>
                  <table class="table table-hover table-sm">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Status</th>
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
                      </tr>
                      <tr>
                        <td>3218</td>
                        <td>Graham Price</td>
                        <td>Nunc Lectus Incorporated</td>
                        <td>Ap #705-5389 Id St.</td>
                        <td>May 23, 2020</td>
                        <td><span class="text-success">Success</span></td>
                      </tr>
                      <tr>
                        <td>2651</td>
                        <td>Reuben Orr</td>
                        <td>Nisi Aenean Eget Limited</td>
                        <td>7425 Malesuada Rd.</td>
                        <td>Nov 4, 2019</td>
                        <td><span class="text-warning">Hold</span></td>
                      </tr>
                      <tr>
                        <td>2636</td>
                        <td>Akeem Holder</td>
                        <td>Pellentesque Associates</td>
                        <td>896 Sodales St.</td>
                        <td>Mar 27, 2020</td>
                        <td><span class="text-danger">Danger</span></td>
                      </tr>
                      <tr>
                        <td>2757</td>
                        <td>Beau Barrera</td>
                        <td>Augue Incorporated</td>
                        <td>4583 Id St.</td>
                        <td>Jan 13, 2020</td>
                        <td><span class="text-success">Success</span></td>
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