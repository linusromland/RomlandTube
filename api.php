<?php
require("config.php");

$title = $_GET['title'];
$printtitle = "SELECT * FROM videos WHERE title LIKE"." '%".$title."%'";
$fetchVideos = mysqli_query($con, $printtitle);
$title = mysqli_fetch_assoc($fetchVideos);
echo "[";
$actual_json;

while($row = mysqli_fetch_assoc($fetchVideos)){
    $actual_json .= json_encode($row, JSON_UNESCAPED_UNICODE);
    $actual_json .= ",";
}

echo substr($actual_json, 0, -1);
echo "]";
?>