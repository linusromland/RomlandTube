<?php 
readfile('header.html');
require("backend/config.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
	<style>
		body{
			color: lightgray;
			}
	</style>
    </head>
    <body>
	<br>
        <form method="post" action="backend/uploading.php" enctype="multipart/form-data">
            Select Video:<br>
            <input type="file" name="video" accept="video/*" required="">
            <br><br>
            Select Thumbnail:<br>
            <input type="file" name="thumbnail" accept="image/*" required="">
            <br><br>
            Select Title:<br>
            <input type="text" name="title" required="">
            <br><br>
            Submit:<br>
            <input type="submit" value="Upload" name="upload">
        </form>

    

</body></html>
