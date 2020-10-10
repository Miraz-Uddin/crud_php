<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v4.5.2 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title></title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                      <h2 class="text-center px-4">All Data
                        <a href="create.php" class="float-right btn btn-success btn-sm mt-1 mr-1 rounded px-3 py-2">ADD NEW
                          <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                      </h2>
                    </div>
                    <div class="card-body px-5">
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr class="d-flex">
                              <th class="col-1">#</th>
                              <th class="col-2">Name</th>
                              <th class="col-3">Email</th>
                              <th class="col-2">Cell</th>
                              <th class="col-1">Status</th>
                              <th class="col-1 text-center">Photo</th>
                              <th class="col-2 text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="d-flex">
                              <td class="col-1">1</td>
                              <td class="col-2">Name</td>
                              <td class="col-3">Email</td>
                              <td class="col-2">Cell</td>
                              <td class="col-1">Status</td>
                              <td class="col-1">
                                  <img class="img-fluid" src="assets/media/img/tom.jpeg" alt="">
                              </td>
                              <td class="col-2">
                                  <div class="btn-group btn-group-sm" role="group">
                                      <a id="view_info" class="btn btn-info btn-sm">View</a>
                                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                      <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Data Modal Start -->
    <div class="modal fade" id="show_data_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-head">
                    <h3 class="text-center">Information</h3>
                </div>
                <div class="modal-body">
                    <table class="table border-0">
                        <tr class="d-flex">
                            <td class="col-3 border-0">
                                <img class="w-100 d-block m-auto" src="assets/media/img/tom.jpeg">
                            </td>
                            <td class="col-9 border-0">
                                <table class="table border-0">
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">ID</th>
                                        <th class="col-1 border-0">:</th>
                                        <td class="col-8 border-0">3</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Name</th>
                                        <th class="col-1 border-0">:</th>
                                        <td class="col-8 border-0">Tom Candy</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">E - Mail</th>
                                        <th class="col-1 border-0">:</th>
                                        <td class="col-8 border-0">candy.tom@gmail.com</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Show Data Modal End -->

    <!-- Optional JavaScript -->
    <!-- jQuery v3.5.1 -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Font awesome v4.7.0-->
    <script src="assets/js/font_awesome.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
