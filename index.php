<?php

include_once "app/db.php";
include_once "app/functions.php";
?>

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-sm-3 col-md-3 clearfix">
                          <a href="create.php" class="float-left btn btn-success mt-1 mr-1 rounded px-3 py-2">
                            ADD NEW
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                          </a>
                          <a href="javascript:void(0)" id="show_all_datas" class="float-left btn btn-primary mt-1 ml-4 rounded px-3 py-2">
                            Show All
                          </a>

                        </div>
                        <div class="col-sm-5 col-md-5">
                          <h2 class="text-center clearfix">
                            All Data
                          </h2>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <form id="search_form" class="searchbox">
                            <input id="search_field" type="search" placeholder="Name/Location/Gender/Email" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
                            <input type="submit" class="searchbox-submit" value="Search" name="submit">
                            <span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr class="d-flex">
                              <th class="col-2 align-self-center border-0">
                                <div class="d-flex">
                                  <div class="col-3 text-right">
                                    #
                                  </div>
                                  <div class="col-9 text-center">
                                    Name
                                  </div>
                                </div>
                              </th>
                              <th class="col-2 align-self-center border-0">E-Mail Address</th>
                              <th class="col-1 align-self-center border-0 text-center">Contact</th>
                              <th class="col-1 align-self-center border-0 text-center">Location</th>
                              <th class="col-1 align-self-center border-0 text-center">Gender</th>
                              <th class="col-2 align-self-center border-0 text-center">Birth Date</th>
                              <th class="col-1 align-self-center border-0 text-center">Status</th>
                              <th class="col-1 align-self-center border-0 text-center">Photo</th>
                              <th class="col-1 align-self-center border-0 text-center">Actions</th>
                            </tr>
                          </thead>
                          <div id="delete_message"></div>
                          <tbody id="all_students_information">

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
                            <td class="col-5 border-0">
                                <img id="show_data_modal_photo" class="w-100 d-block m-auto" src="">
                            </td>
                            <td class="col-7 border-0">
                                <table class="table border-0">
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Name</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_name" class="col-8 border-0"></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">E - Mail</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_email" class="col-8 border-0"></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Contact</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_cell" class="col-8 border-0"></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Location</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_location" class="col-8 border-0"></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Gender</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_gender" class="col-8 border-0"></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3 border-0">Age</th>
                                        <th class="col-1 border-0">:</th>
                                        <td id="show_data_modal_age" class="col-8 border-0"></td>
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
