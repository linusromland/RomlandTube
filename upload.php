<?php 
readfile('header.html');
require("backend/config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/style.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
    </head>
    <body>
       <?php
        include("header.php");
        ?>
        <br>
        <form method="post" action="backend/uploading.php" enctype="multipart/form-data">
           <p>Max 500mb!</p>
           <br>
            Select Video (only MP4!):<br>
            <input type="file" name="video" accept="video/*" required="">
            <br><br>
            Select Thumbnail: (png, jpg, jpeg, svg)<br>
            <input type="file" name="thumbnail" accept="image/*" required="">
            <br><br>
            Select Title:<br>
            <input type="text" name="title" required="" maxlength="40">
            <br><br>
            Submit:<br>
            <input type="submit" value="Upload" name="upload">
        </form>

        <?php
        include("footer.html");
        ?>

    </body></html>
