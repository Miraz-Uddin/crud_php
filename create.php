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
              <h2 class="text-center">Add New Data</h2>
            </div>
            <div class="card-body px-5 py-4">
              <form action="store.php" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['empty_error'])){?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $_GET['empty_error'];?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php }?>
                <?php if(isset($_GET['success'])){?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_GET['success'];?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php }?>
                <div class="form-group mb-2">
                  <label for="add_name">Name</label>
                  <input class="form-control" type="text" id="add_name" name="name" placeholder="Enter Your Full Name">
                  <?php if(isset($_GET['name_error'])){?>
                    <small class="text-danger">
                      <?php echo $_GET['name_error']; ?>
                    </small>
                  <?php } ?>
                </div>
                <div class="form-group mb-2">
                  <label for="add_email">Email</label>
                  <input class="form-control" type="text" id="add_email" name="email" placeholder="Give a Valid Email ID">
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
                      <input class="form-control" type="text" id="add_cell" name="cell" placeholder="Mobile No.">
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
                        <option value="Abdullahpur">Abdullahpur</option>
                        <option value="Banani">Banani</option>
                        <option value="Dhanmondi">Dhanmondi</option>
                        <option value="Farmgate">Farmgate</option>
                        <option value="Gulshan">Gulshan</option>
                        <option value="Gulistan">Gulistan</option>
                        <option value="Kalyanpur">Kalyanpur</option>
                        <option value="Lalmatia">Lalmatia</option>
                        <option value="Mirpur">Mirpur</option>
                        <option value="Mohakhali">Mohakhali</option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Motijheel">Motijheel</option>
                        <option value="New Market">New Market</option>
                        <option value="Puran Dhaka">Puran Dhaka</option>
                        <option value="Rampura">Rampura</option>
                        <option value="Savar">Savar</option>
                        <option value="Science Lab">Science Lab</option>
                        <option value="Shyamoli">Shyamoli</option>
                        <option value="Uttara">Uttara</option>
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
                                  <input type="radio" id="female" name="gender" value="FEMALE">
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
                                  <input type="radio" id="male" name="gender" value="MALE">
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
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
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
                  <input class="form-control" type="date" id="add_age" name="age">
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
    <script src="assets/js/font_awesome.min.js" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
