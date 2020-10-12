<?php

include_once "app/db.php";
include_once "app/functions.php";

if(isset($_POST['add'])){

  // name Management
  $name = $_POST['name'];
  $name_exception = preg_match('/[\d\[\]\/\'`^£$%&*()};"!:{@#~?><>,|=_+¬-]/', $name);
  $name_back_slash_check = preg_match('/\\\\/', $name);

  // e-mail Managemnet
  $email = strtolower($_POST['email']);
  $email_validity = filter_var($email,FILTER_VALIDATE_EMAIL);
  $email_piece = explode('@',$email_validity);
  $extension = end($email_piece);
  $email_institution = in_array($extension,['gmail.com','yahoo.com','bracu.ac.bd','aiub.edu','northsouth.edu']);

  // cell Management
  $cell = $_POST['cell'];
  $cell_validity = preg_match('/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',$cell) ;

  // location Management
  if(empty($_POST['location'])){
    $location = '';
  }else{
    $location = $_POST['location'];
  }

  // gender Management
  if(empty($_POST['gender'])){
    $gender = '';
  }else{
    $gender = $_POST['gender'];
  }

  // status Management
  $status = $_POST['status'];

  // age Management
  if(empty($_POST['age'])){
    $age = 0;
  }
  else{
    $age = $_POST['age'];
    $birthDay = explode('-',$_POST['age']);
    $dob_year = $birthDay[0];
    $dob_month = $birthDay[1];
    $dob_day = $birthDay[2];
    $birth_date = new DateTime("$dob_day.$dob_month.$dob_year");
    $today = new Datetime(date('m.d.y'));
    $diff = $today->diff($birth_date);
    $age_years = $diff->y;
    $age_months = $diff->m;
    $age_days = $diff->d;
    if($age_years == 0){
      $age=1;
    }else{
      $age = $age_years;
    }
  }


  /**
   * *************************************************************************************************
   * ****************************DATA Validation Logics***********************************************
   * *************************************************************************************************
   */

  /**
   *  ----------Name DATA Validation----------
   *
   *  It will only accept
   *      => 'Letters & Spaces'
   *  It won't accept
   *      => 'Empty Field'
   *      => 'Only Spaces but no letters'
   *      => 'Any Special Characters'
   *      => 'Any Numbers'
   *
   */
  if(empty($name)){
    $name_error = "Please Give Your Name";
    header('location:create.php?name_error='.$name_error);
  }
  elseif(empty(trim($name)) || $name_exception || $name_back_slash_check){
    $name_error = "Please Give a VALID Name";
    header('location:create.php?name_error='.$name_error);
  }


  /**
   *  ----------Email DATA Validation----------
   *
   *  It will only accept
   *      => '@yahoo.com' , '@gmail.com' , '@bracu.ac.bd' , '@aiub.edu' , '@northsouth.edu'
   *  It won't accept
   *      => 'Empty Field'
   *      => 'Invalid Email Address'
   *      => 'other university e-mail except BRACU,AIUB,NSU university'
   *      => 'other platform except gmail or yahoo mailing system'
   *
   */
  elseif(empty($email)){
    $email_error = "Please Give Your Email Address";
    header('location:create.php?email_error='.$email_error);
  }
  elseif(!$email_validity){
    $email_error = "Please Give a Proper E-mail Address";
    header('location:create.php?email_error='.$email_error);
  }elseif(!$email_institution){
    $email_error = "This Email isn't Linked to our Institution";
    header('location:create.php?email_error='.$email_error);
  }


  /**
   *  ----------Cell DATA Validation----------
   *
   *  It will only accept
   *       => +88018******** / 0088018********
   *       => 011******** / 013******** / 014********
   *       => 015******** / 016******** / 017********
   *       => 018******** / 019********
   *  It won't accept
   *      => 'Empty Field'
   *      => 'Invalid Phone Numbers in Bangladesh'
   *      => 'Number that starts with 012 or 010'
   *
   */
  elseif(empty($cell)){
    $cell_error = "Please Give Your Phone Number";
    header('location:create.php?cell_error='.$cell_error);
  }
  elseif(!$cell_validity){
    $cell_error = "Give a Proper Phone Number of Bangladesh";
    header('location:create.php?cell_error='.$cell_error);
  }


  /**
   *  ----------Photo DATA Validation----------
   *
   *  It won't accept
   *      => 'Empty Field'
   *
   */
  elseif(empty($_FILES['photo']['tmp_name'])){
    $photo_error = "Please Give a Photo of Yours";
    header('location:create.php?photo_error='.$photo_error);
  }


  /**
   *
   *  ----------Location DATA Validation----------
   *
   */
  elseif(empty($location)){
    $location_error = "Please Select Your Home Location";
    header('location:create.php?location_error='.$location_error);
  }


  /**
   *
   *  ----------Gender DATA Validation----------
   *
   */
  elseif(empty($gender)){
    $gender_error = "Please Choose Your Gender";
    header('location:create.php?gender_error='.$gender_error);
  }


  /**
   *  ----------Status DATA Validation----------
   *
   *  No Need to Validate Status , Cause It's
   *  an Optional Input field and it's value
   *  is by-Default 'ACTIVE'
   *
   */


   /**
    *  ----------Age DATA Validation----------
    *
    *  It will only accept People Who are
    *      => Adult means 18+
    *  It won't accept People Whoe Are
    *      => Below 18
    *      => More Than 80 years Old
    *
    */
  elseif(empty($age)){
    $age_error = "Please Pick Your Birth Date";
    header('location:create.php?age_error='.$age_error);
  }
  elseif($age<18 || $age>80){
    $age_error = "You Are Not Matured Enough to Register Here";
    header('location:create.php?age_error='.$age_error);
  }


  /**
   *  ----------All Validation Passed----------
   */
  else{
    $data_name = trim($name);
    $data_email = $email;
    $data_cell = $cell;
    $data_location = $location;
    $data_gender = $gender;
    $data_age = $age;
    $data_status = $status;

    // $file_upload_status =fileUpload($_FILES['photo'],'assets/uploads/file/students/',['docx','pdf'],[
    //   'type'=>'file',
    //   'file_name'=>'javaScript',
    //   'first_name'=>$data_name,
    //   'last_name'=>$data_location,
    // ]);
    $data = fileUpload($_FILES['photo'],'assets/uploads/img/students/',['jpg','png','jpeg','gif'],[
      'type'=>'image',
      'file_name'=>'Photo',
      'first_name'=>$data_name,
      'last_name'=>$data_location,
    ]);
    if($data['trueFalse'] == false){
      $photo_error = "You have given an INVALID Image Format";
      header('location:create.php?photo_error='.$photo_error);
    }else{
      $data_photo = $data['name'];

      // Run SQL Query
      $sql = "INSERT INTO students (name,email,cell,location,photo,gender,age,status,created_at)VALUES(:name,:email,:cell,:location,:photo,:gender,:age,:status,:created_at)";

      // Connect with PDO-Prepare
      $stmt = $conn->prepare($sql);
      $stmt->execute([
          ':name'=>$data_name,
          ':email'=>$data_email,
          ':cell'=>$data_cell,
          ':location'=>$data_location,
          ':photo'=>$data_photo,
          ':gender'=>$data_gender,
          ':age'=>$data_age,
          ':status'=>$data_status,
          ':created_at'=>time(),
      ]);

      $success = "DATA INSERTED SUCCESSFULLY";
      header('location:create.php?success='.$success);

    }
  }

}

?>
