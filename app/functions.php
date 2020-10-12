<?php

/**
 *
 *  File Upload System
 *  Argument (File, String-Of-Location, Array-of-Format-Types)
 *  e.g: fileUpload($_FILES['photo'],'assets/uploads/img/students/',['docx'])
 *  if i write abovecode, this will allow only docx file
 *
 */
function fileUpload($file, $location = '', $file_format = ['jpg','png','jpeg','gif'], $file_type = null){

  //  File Type Default Value
  if(!isset($file_type['type'])){ $file_type['type'] = 'image'; }
  if(!isset($file_type['file_name'])){ $file_type['file_name'] = ''; }
  if(!isset($file_type['first_name'])){ $file_type['first_name'] = ''; }
  if(!isset($file_type['last_name'])){ $file_type['last_name'] = ''; }

  //  File Info
  $file_name = $file['name'];
  $file_temporary_name = $file['tmp_name'];

  //  File Extension
  $file_array = explode('.',$file_name);
  $file_extension = strtolower(end($file_array));

  //  File Name Generate by Given Type
  if($file_type['type'] == 'image'){
    $file_name = md5(time().rand()).'.'.$file_extension;
  }elseif($file_type['type'] == 'file'){
    $first_name = str_replace(' ','_',$file_type['first_name']) ;
    $last_name = str_replace(' ','_',$file_type['last_name']) ;
    date_default_timezone_set('Asia/Dhaka');
    $file_name = date('Y_m_d_G_i_s_').$file_type['file_name'].'_'.$first_name.'_'.$last_name.'.'.$file_extension;
  }

  //  File Format check and Upload
  $boolean_feedback = true;
  if(in_array($file_extension,$file_format) == false){
    $boolean_feedback = false;
  }else{
    move_uploaded_file( $file_temporary_name, $location.$file_name);
    $boolean_feedback = true;
  }

  // Return Values
  return [
    'trueFalse'=>$boolean_feedback,
    'name'=>$file_name
  ];
}

 ?>
