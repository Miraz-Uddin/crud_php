<?php

include_once "app/db.php";
include_once "app/functions.php";

if(isset($_POST['update'])){

  // name Management
  $id = $_GET['id'];
  $name = $_POST['name'];
  $name_exception = preg_match('/[\d\[\]\/\'`^£$%&*()};"!:{@#~?><>,|=_+¬-]/', $name);
  $name_back_slash_check = preg_match('/\\\\/', $name);

  // e-mail Management
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
    $age = '';
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
   * *********************DATA UPDATE Validation Logics***********************************************
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
    header("location:edit.php?name_error=$name_error&data_id=$id");
  }
  elseif(empty(trim($name)) || $name_exception || $name_back_slash_check){
    $name_error = "Please Give a VALID Name";
    header("location:edit.php?name_error=$name_error&data_id=$id");
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
    header("location:edit.php?email_error=$email_error&data_id=$id");
  }
  elseif(!$email_validity){
    $email_error = "Please Give a Proper E-mail Address";
    header("location:edit.php?email_error=$email_error&data_id=$id");
  }elseif(!$email_institution){
    $email_error = "This Email isn't Linked to our Institution";
    header("location:edit.php?email_error=$email_error&data_id=$id");
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
    header("location:edit.php?cell_error=$cell_error&data_id=$id");
  }
  elseif(!$cell_validity){
    $cell_error = "Give a Proper Phone Number of Bangladesh";
    header("location:edit.php?cell_error=$cell_error&data_id=$id");
  }


  /**
   *  ----------Photo DATA Validation----------
   *
   *  It will accept
   *      => 'Empty Field'
   *  because One Person may not want to update his/her PHOTO
   *
   */


  /**
   *  ----------Location DATA Validation----------
   *
   *  It won't accept
   *      => 'Empty Field'
   *
   */
  elseif(empty($location)){
    $location_error = "Please Select Your Home Location";
    header("location:edit.php?location_error=$location_error&data_id=$id");
  }


  /**
   *  ----------Gender DATA Validation----------
   *
   *  It won't accept
   *      => 'Empty Field'
   *
   */
  elseif(empty($gender)){
    $gender_error = "Please Choose Your Gender";
    header("location:edit.php?gender_error=$gender_error&data_id=$id");
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
    *  It won't accept People Who Are
    *      => Below 18
    *      => More Than 80 years Old
    *
    */
  elseif(empty($age)){
    $age_error = "Please Pick Your Birth Date";
    header("location:edit.php?age_error=$age_error&data_id=$id");
  }
  elseif($age<18 || $age>80){
    $age_error = "You Are Not Matured Enough to Register Here";
    header("location:edit.php?age_error=$age_error&data_id=$id");
  }


  /**
   *  ----------All Validation Passed----------
   */
  else{
    // Organize All DATAs
    $data_name = trim($name);
    $data_email = $email;
    $data_cell = $cell;
    $data_location = $location;
    $data_gender = $gender;
    $data_age = $_POST['age'];
    $data_status = $status;

    // Checking if a photo is selected or not for updating
    if(!empty($_FILES['photo']['name'])){

      // Uploading the photo in Directory
      $data = fileUpload($_FILES['photo'],'assets/uploads/img/students/');
      if($data['trueFalse'] == false){
        $photo_error = "You have given an INVALID Image Format";
        header("location:edit.php?photo_error=$photo_error&data_id=$id");
      }else{
        $data_photo = $data['name'];

        // Updating ALL DATAS using PDO Prepare
        $sql = "UPDATE students SET name=:name, email=:email, cell=:cell, location=:location, gender=:gender, age=:age, status=:status, photo=:photo, updated_at=:updated_at  WHERE id='$id'";
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
            ':updated_at'=>time(),
        ]);

        // Delete Old Photo to Replace New photo
        unlink('assets/uploads/img/students/'.$_POST['old_photo']);

        //  Give Success Message After Updating All DATAS
        $success = "DATA UPDATED SUCCESSFULLY";
        header("location:edit.php?success=$success&data_id=$id");
      }
    }else{

        // Keeping Same photo , because User didn't upload a new One
        $data_photo = $_POST['old_photo'];

        // Updating ALL DATAS using PDO Prepare
        $sql = "UPDATE students SET name=:name, email=:email, cell=:cell, location=:location, gender=:gender, age=:age, status=:status, photo=:photo, updated_at=:updated_at  WHERE id='$id'";
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
            ':updated_at'=>time(),
        ]);

        //  Give Success Message After Updating All DATAS
        $success = "DATA UPDATED SUCCESSFULLY";
        header("location:edit.php?success=$success&data_id=$id");
    }
  }
}

?>
