<?php

   session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../login.php");
        exit();
    }

	$host = "localhost"; /* Host name */
	$user = "root"; /* User */
	$password = "123"; /* Password */
	$dbname = "LoginSystem"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
