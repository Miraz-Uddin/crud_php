<?php

include_once "app/db.php";
include_once "app/functions.php";


$search = $_POST['search_key'];


// Run SQL Query
echo $sql = "SELECT * FROM students WHERE location='$search' OR gender='$search' OR name LIKE '%$search%'";
