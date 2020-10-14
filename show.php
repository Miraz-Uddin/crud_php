<?php

include_once "app/db.php";
include_once "app/functions.php";

$id = $_POST['id'];

// Run SQL Query
$sql = "SELECT * FROM students WHERE id='$id'";

// Fetch DATA with PDO-Prepare
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetch(PDO::FETCH_ASSOC);

echo(json_encode($students));
?>
