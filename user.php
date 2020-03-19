
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <div>

            <?php
            readfile("header.html");
            require("backend/db.php");
                
            $query = $_SERVER['QUERY_STRING'];
            $fetchUser = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '".$query."'");
            $userRow = mysqli_fetch_assoc($fetchUser);
            $id = $userRow['id'];   
            $username = $userRow['username'];
            echo "<h1>User: ".$username."</h1>";

            $fetchVid = mysqli_query($con, "SELECT * FROM videos WHERE user LIKE '".$username."' order by id");
            while($row = mysqli_fetch_assoc($fetchVid)){
                $id = $row['id'];
                $thumbLocation = $row['thumb'];
                $title = $row['title'];
                $views = $row['views'];

                echo "<div >";
                echo "<a href=\"./view.php?$id\"><img src='".$thumbLocation."' controls width='320px' height='200px'></video><br></a>";
                echo "<a href=\"./view.php?$id\"><b>".$title."</b></a>";
                echo "<p>Views ".$views."</p>";
                echo "</div>";}
            ?>
        </div>

    </body>
</html>