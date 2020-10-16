<?php

include_once "app/db.php";
include_once "app/functions.php";

$id = $_POST['id'];


// Fetch Delete DATA Info with PDO-Prepare
$sql = "SELECT * FROM students WHERE id='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);
unlink('assets/uploads/img/students/'.$student['photo']);

// Run SQL Query
$sql = "DELETE FROM students WHERE id='$id'";

// Delete DATA with PDO-Prepare
$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<p class="alert alert-danger text-center alert-dismissible fade show" role="alert"><strong>A Student has been Deleted from Database</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';

?>
