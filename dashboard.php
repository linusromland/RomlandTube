<?php 
require("backend/config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard - RomlandTube</title>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/dashboard.css">
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
    </head>
    <body>
        <?php 
        include("header.php");?>
        <div class="parent">
            <div class="div1"><a href="pictures.php">Want to change pictures for your user?</a></div>
            <div class="div2"><a href="upload.php">Want to upload a video?</a></div>
            <div class="div3">Romland.Space</div>
        </div>
        <?php 
        include("footer.html");?>
    </body>
</html>