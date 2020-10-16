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
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7 mt-5 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="text-center">EDIT Data</h2>
                    </div>
                    <?php

                    // Run SQL Query
                    $id = $_GET['data_id'];
                    $sql = "SELECT * FROM students WHERE id='$id'";

                    // Fetch DATA with PDO-Prepare
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $student = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="card-body px-5 py-4">
                      <form action="store.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                          <label for="add_name">Name</label>
                          <input class="form-control" type="text" id="add_name" name="name" value="<?=$student['name']?>">
                          <?php if(isset($_GET['name_error'])){?>
                            <small class="text-danger">
                              <?php echo $_GET['name_error']; ?>
                            </small>
                          <?php } ?>
                        </div>
                        <div class="form-group mb-2">
                          <label for="add_email">Email</label>
                          <input class="form-control" type="text" id="add_email" name="email" value="<?=$student['email']?>">
                          <?php if(isset($_GET['email_error'])){?>
                            <small class="text-danger">
                              <?php echo $_GET['email_error']; ?>
                            </small>
                          <?php } ?>
                        </div>
                        <div class="form-group mb-2">
                          <div class="row">
                            <div class="col-md-7">
                              <label for="add_cell">Cell</label>
                              <input class="form-control" type="text" id="add_cell" name="cell" value="<?=$student['cell']?>">
                              <?php if(isset($_GET['cell_error'])){?>
                                <small class="text-danger">
                                  <?php echo $_GET['cell_error']; ?>
                                </small>
                              <?php } ?>
                            </div>
                            <div class="col-md-5">
                              <label for="add_location">Location</label>
                              <select id="add_location" name="location" class="custom-select">
                                <option value="">-- Select --</option>
                                <option value="Abdullahpur" <?=(($student['location']=='Abdullahpur')?'selected':'')?>>Abdullahpur</option>
                                <option value="Banani" <?=(($student['location']=='Banani')?'selected':'')?>>Banani</option>
                                <option value="Dhanmondi" <?=(($student['location']=='Dhanmondi')?'selected':'')?>>Dhanmondi</option>
                                <option value="Farmgate" <?=(($student['location']=='Farmgate')?'selected':'')?>>Farmgate</option>
                                <option value="Gulshan" <?=(($student['location']=='Gulshan')?'selected':'')?>>Gulshan</option>
                                <option value="Gulistan" <?=(($student['location']=='Gulistan')?'selected':'')?>>Gulistan</option>
                                <option value="Kalyanpur" <?=(($student['location']=='Kalyanpur')?'selected':'')?>>Kalyanpur</option>
                                <option value="Lalmatia" <?=(($student['location']=='Lalmatia')?'selected':'')?>>Lalmatia</option>
                                <option value="Mirpur" <?=(($student['location']=='Mirpur')?'selected':'')?>>Mirpur</option>
                                <option value="Mohakhali" <?=(($student['location']=='Mohakhali')?'selected':'')?>>Mohakhali</option>
                                <option value="Mohammadpur" <?=(($student['location']=='Mohammadpur')?'selected':'')?>>Mohammadpur</option>
                                <option value="Motijheel" <?=(($student['location']=='Motijheel')?'selected':'')?>>Motijheel</option>
                                <option value="New Market" <?=(($student['location']=='New Market')?'selected':'')?>>New Market</option>
                                <option value="Puran Dhaka" <?=(($student['location']=='Puran Dhaka')?'selected':'')?>>Puran Dhaka</option>
                                <option value="Rampura" <?=(($student['location']=='Rampura')?'selected':'')?>>Rampura</option>
                                <option value="Savar" <?=(($student['location']=='Savar')?'selected':'')?>>Savar</option>
                                <option value="Science Lab" <?=(($student['location']=='Science Lab')?'selected':'')?>>Science Lab</option>
                                <option value="Shyamoli" <?=(($student['location']=='Shyamoli')?'selected':'')?>>Shyamoli</option>
                                <option value="Uttara" <?=(($student['location']=='Uttara')?'selected':'')?>>Uttara</option>
                              </select>
                              <?php if(isset($_GET['location_error'])){?>
                                <small class="text-danger">
                                  <?php echo $_GET['location_error']; ?>
                                </small>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div><label for="add_photo">Photo <span class="text-info"></span> </label></div>
                        <div class="form-group mb-2 mt-4">
                            <img class="img-fluid w-50 d-block m-auto" src="assets/uploads/img/students/<?=$student['photo']?>">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="add_photo" name="photo">
                          <label class="custom-file-label" for="add_photo">Choose a Photo ...</label>
                          <?php if(isset($_GET['photo_error'])){?>
                            <small class="text-danger">
                              <?php echo $_GET['photo_error']; ?>
                            </small>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <div class="row no-gutters">
                            <div class="col-sm-12 col-md-7 ">
                              <p class="mt-2 mb-0" style="cursor: default;">Gender</p>
                              <div class="row no-gutters">
                                <div class="col-md-6">
                                  <div class="mt-2">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="radio" id="female" name="gender" value="female" <?=(($student['gender']=='female')?'checked':'')?>>
                                        </div>
                                      </div>
                                      <label for="female" class="mb-0">
                                        <div class="input-group-append">
                                          <div class="input-group-text bg-white" style="border-radius: 0 .25rem .25rem 0;">Female</div>
                                        </div>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mt-2">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="radio" id="male" name="gender" value="male" <?=(($student['gender']=='male')?'checked':'')?>>
                                        </div>
                                      </div>
                                      <label for="male" class="mb-0">
                                        <div class="input-group-append">
                                          <div class="input-group-text bg-white" style="border-radius: 0 .25rem .25rem 0;">Male</div>
                                        </div>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-5 ">
                              <label class="mt-2" for="add_status">Status <span class="text-info">(Optional)</span> </label>
                              <select id="add_status" name="status" class="custom-select">
                                <option value="ACTIVE" <?=(($student['status']=='ACTIVE')?'selected':'')?>>ACTIVE</option>
                                <option value="INACTIVE" <?=(($student['status']=='INACTIVE')?'selected':'')?>>INACTIVE</option>
                              </select>
                            </div>
                          </div>
                          <?php if(isset($_GET['gender_error'])){?>
                            <small class="text-danger">
                              <?php echo $_GET['gender_error']; ?>
                            </small>
                          <?php } ?>
                        </div>
                        <div class="form-group mb-2">
                          <label for="add_age">Birthdate</label>
                          <?php
                             $date = $student['age'];
                             date_default_timezone_set('Asia/Dhaka');
                             $birth_day = date('Y-m-d', $date);
                          ?>
                          <input class="form-control" type="date" id="add_age" name="age" value="<?=$birth_day?>">
                          <?php if(isset($_GET['age_error'])){?>
                            <small class="text-danger">
                              <?php echo $_GET['age_error']; ?>
                            </small>
                          <?php } ?>
                        </div>
                        <div class="form-group mt-4">
                          <div class="row">
                            <div class="col-md-6">
                              <button class="form-control btn btn-success" type="submit" name="add">ADD</button>
                            </div>
                            <div class="col-md-6">
                              <a href="index.php" class="form-control btn btn-outline-dark">Cancel</a>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
