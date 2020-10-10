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
                        <h2 class="text-center">EDIT Data</h2>
                    </div>
                    <div class="card-body px-5 py-4">
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-2">
                                <label for="add_name">Name</label>
                                <input class="form-control" type="text" id="add_name" name="name" placeholder="Enter Your Full Name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="add_email">Email</label>
                                <input class="form-control" type="text" id="add_email" name="email" placeholder="Give a Valid Email ID">
                            </div>
                            <div class="form-group mb-2">
                                <label for="add_photo">Photo</label>
                                <input class="form-control"  type="file" name="photo" id="add_photo">
                            </div>
                            <div class="form-group mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                      <button class="form-control btn btn-success" type="submit" name="add">UPDATE <i class='fa fa-arrow-up ml-3'></i></button>
                                    </div>
                                    <div class="col-md-6">
                                      <a href="index.php" class="form-control btn btn-outline-dark">Cancel <i class="fa fa-arrow-right ml-3" aria-hidden="true"></i></a>
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
