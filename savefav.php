<?php
$Postid = $_GET["post"];
$userid = $_GET["user"];
require_once("connection.php");
    $sql = "INSERT INTO favourite (user_id,post_id) VALUES ('$userid', '$Postid');";
    if (mysqli_query($conn, $sql)) {
        echo "Done";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>