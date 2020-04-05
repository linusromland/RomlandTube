
<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "123"; /* Password */
$dbname = "LoginSystem"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
    
    if (!isset($_SESSION["username"])) {
        $href ='<a href="./backend/login.php" class="button">
        <p class="btntext">Login</p>
        </a>';
    } else {
    $href = '
    <a href="./backend/logout.php" class="button">
    <p class="btntext">Logout</p>
    </a>
    <a href="./dashboard.php" class="button">
    <p class="btntext">My Account</p>
    </a>';
    }
    ?>
  
        <div class="topnav">

            <img src="img/logo_transparent.png" height="70" id="logo" alt='".logoimg."'>

            <a id="logotext">RomlandTube</a>

            
            <?php
                    echo $href;
                ?>

        </div> 
