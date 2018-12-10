<?php
$postid = $_GET["postid"];
$userid = $_GET["user"];
$comment = $_GET["comment"];
require_once("connection.php");
    $sql = "INSERT INTO comment (user_id,post_id,comments) VALUES ( '$userid', '$postid', '$comment');";
    if (mysqli_query($conn, $sql)) {
        echo "Done";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>