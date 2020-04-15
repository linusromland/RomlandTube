<?php

require("config.php");

$title = $_GET['search'];
$printid = "SELECT * FROM videos WHERE title LIKE"." '%".$title."%'";
$fetchid = mysqli_query($con, $printid);
?>