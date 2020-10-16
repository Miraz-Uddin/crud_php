<?php

include_once "app/db.php";
include_once "app/functions.php";

$id = $_POST['id'];

// Run SQL Query
$sql = "DELETE FROM students WHERE id='$id'";

// Delete DATA with PDO-Prepare
$stmt = $conn->prepare($sql);
$stmt->execute();
echo "Data Deleted";
?>
