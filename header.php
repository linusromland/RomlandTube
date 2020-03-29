
<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "123"; /* Password */
$dbname = "LoginSystem"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
    
    if (!isset($_SESSION["username"])) {
        $href ='<div class="item" style="background-color:gray;overflow: hidden;float: right; width: 90px; height: 50px; margin-top: 0.75%; margin-right: 1%;border-radius: 3px; border: 2px solid black"><a href="./backend/login.php" style="  float: right;display: block;color: #f2f2f2;text-align: center;text-decoration: none;font-size: 120%; margin-top: 14%; margin-right: 18px;font-family: sans-serif;">Login</a></div>';
    } else {
    $href = '<div class="item" style="background-color:gray;overflow: hidden;float: right; width: 7%; height: 50px; margin-top: 0.75%; margin-right: 1%;border-radius: 3px; border: 2px solid black">
    <a href="./backend/logout.php" style="  float: right;display: block;color: #f2f2f2;text-align: center;text-decoration: none;font-size: 117%; margin-top: 14%; margin-right: 18px;font-family: sans-serif;">Logout</a>
    </div>
    <div class="item" style="background-color:gray;overflow: hidden;float: right; width: 7%; height: 50px; margin-top: 0.75%; margin-right: 1%;border-radius: 3px; border: 2px solid black">
    <a href="./dashboard.php" style="float: right;display: block;color: #f2f2f2;text-align: center;text-decoration: none;font-size: 117%; margin-top: 13%; margin-right: 2px;  white-space: nowrap;font-family: sans-serif;">My Account</a>
    </div>';
    }
    ?>
  
        <div class="topnav" style="background-color:#2c4260;overflow: hidden;">

            <img src="img/logo_transparent.png" height="70" style="float: left;display: block;color: #f2f2f2;text-align: center;padding: 4px  6px;">

            <a style="float: left;display: block;color: #f2f2f2;text-align: center;padding: 14px 16px;text-decoration: none;font-size: 250%;font-family: sans-serif;">RomlandTube </a>

            
            <?php
                    echo $href;
                ?>

        </div> 
