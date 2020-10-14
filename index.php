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
            <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8 mt-5 mx-auto">
                <div class="card shadow">
                    <div class="card-header px-5">
                      <div class="row">
                        <div class="col-sm-3 col-md-3">
                          <a href="create.php" class="float-left btn btn-success mt-1 mr-1 rounded px-3 py-2">
                            ADD NEW
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                          </a>
                        </div>
                        <div class="col-sm-5 col-md-5">
                          <h2 class="text-center clearfix">
                            All Data
                          </h2>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <form class="searchbox" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                            <input type="search" placeholder="Name/Location/Gender/Email" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
                            <input type="submit" class="searchbox-submit" value="Search" name="submit">
                            <span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="card-body px-5">
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Cell</th>
                              <th>Location</th>
                              <th>Gender</th>
                              <th>Age</th>
                              <th>Created_at</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

                            // Get Values From Search
                            $serach = '';
                            if(isset($_POST['submit'])){
                              $serach = $_POST['search'];
                            }

                            // Run SQL Query
                            $sql = "SELECT * FROM students WHERE location='$serach' OR gender='$serach' OR name LIKE '%$serach%'";

                            // Fetch DATA with PDO-Prepare
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $students = $stmt->fetchAll();

                            // Running For-each Loop to Print All DATA
                            $i=0;
                            foreach($students as $student):
                            ?>
                            <tr>
                              <td><?=++$i?></td>
                              <td>
                                <p><img class="rounded-circle" src="assets/uploads/img/students/<?=$student['photo']?>" style="width:14%;">
                                <?=$student['name']?></p>
                              </td>
                              <td><?=$student['email']?></td>
                              <td><?=$student['cell']?></td>
                              <td><?=$student['location']?></td>
                              <td><?=$student['gender']?></td>
                              <td><?=$student['age']?></td>
                              <td>
                                <?php
                                $time = $student['created_at'];
                                echo date('d/m/Y G:i:s',$time);
                                ?></td>
                              <td>
                                  <p role="group" class="btn-group btn-group-sm">
                                      <a id="view_info" class="btn btn-info btn-sm">View</a>
                                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                      <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                  </p>
                              </td>
                            </tr>
                          <?php endforeach; ?>
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
