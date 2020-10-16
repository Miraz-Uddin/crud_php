<?php

include_once "app/db.php";
include_once "app/functions.php";


// Run SQL Query
$sql = $_GET['sql'];
// Fetch DATA with PDO-Prepare
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll();
$i=0;
foreach($students as $student):
?>

<tr class="d-flex">
  <td class="col-2 align-self-center border-0">
    <div class="d-flex">
      <div class="col-3 text-right">
        <?=++$i?>
      </div>
      <div class="col-9 text-center">
        <?=$student['name']?>
      </div>
    </div>
  </td>
  <td class="col-2 align-self-center border-0"><?=$student['email']?></td>
  <td class="col-1 align-self-center border-0 text-center"><?=$student['cell']?></td>
  <td class="col-1 align-self-center border-0 text-center"><?=$student['location']?></td>
  <td class="col-1 align-self-center border-0 text-center"><?=$student['gender']?></td>
  <td class="col-2 align-self-center border-0 text-center">
    <?php
      $birth_day= strtotime($student['age']);
      date_default_timezone_set('Asia/Dhaka');
      $birth_day_string = date('j',$birth_day)."<sup>".date('S',$birth_day)."</sup>"." ".date('F',$birth_day).", ".date('Y',$birth_day);
      echo $birth_day_string;
    ?>
  </td>
  <td class="col-1 align-self-center border-0 text-center">
    <?php if($student['status']=='ACTIVE'): ?>
      <span class="badge badge-pill badge-success px-4 py-2 font-weight-bold" style="font-size:15px;">ACTIVE</span>
    <?php endif; ?>
    <?php if($student['status']=='INACTIVE'): ?>
      <span class="badge badge-pill badge-danger px-4 py-2 font-weight-bold" style="font-size:15px;">INACTIVE</span>
    <?php endif; ?>

  </td>
  <td class="col-1">
    <img class="img-fluid img-thumbnail" src="assets/uploads/img/students/<?=$student['photo']?>">
  </td>
  <td class="col-1 align-self-center border-0 text-center">
      <a href="javascript:void(0)" id="view_info" data_id="<?=$student['id']?>" class="btn btn-info d-block btn-sm mb-2">View</a>
      <a href="javascript:void(0)" id="delete_info" data_id="<?=$student['id']?>" class="btn btn-danger d-block btn-sm mb-2">Delete</a>
      <a href="edit.php?data_id=<?=$student['id']?>" class="btn btn-primary d-block btn-sm">Edit</a>
  </td>
</tr>
<?php endforeach; ?>
