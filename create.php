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
        <div class="col-md-6 mt-5 mx-auto">
          <div class="card shadow">
            <div class="card-header">
              <h2 class="text-center">Add New Data</h2>
            </div>
            <div class="card-body px-5 py-4">
              <form action="store.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-2">
                  <label for="add_name">Name</label>
                  <input class="form-control" type="text" id="add_name" name="name" placeholder="Enter Your Full Name">
                </div>
                <div class="form-group mb-2">
                  <label for="add_email">Email</label>
                  <input class="form-control" type="text" id="add_email" name="email" placeholder="Give a Valid Email ID">
                </div>
                <div class="form-group mb-2">
                  <div class="row">
                    <div class="col-md-7">
                      <label for="add_cell">Cell</label>
                      <input class="form-control" type="text" id="add_cell" name="cell" placeholder="Mobile No.">
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
                    </div>
                  </div>
                </div>
                <div><label for="add_photo">Photo</label></div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="add_photo">
                  <label class="custom-file-label" for="add_photo">Choose a Photo ...</label>
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
                                  <input type="radio" id="female" name="gender" value="female">
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
                                  <input type="radio" id="male" name="gender" value="male">
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
                      <label class="mt-2" for="add_status">Status</label>
                      <select id="add_status" name="status" class="custom-select">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-2">
                  <label for="add_age">Birthdate</label>
                  <input class="form-control" type="date" id="add_age" name="age">
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
