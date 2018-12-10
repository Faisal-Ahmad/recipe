<?php
$postid = $_GET["postid"];
$userid = $_GET["user"];
$value = $_GET["value"];
require_once("connection.php");

    $result=mysqli_query($conn,"SELECT id FROM rating WHERE user_id=$userid and post_id=$postid");
    $rows=mysqli_num_rows($result);
    if($rows==0)
    {
        $sql = "INSERT INTO rating (user_id,post_id,value) VALUES ('$userid', '$postid','$value');";
        if(mysqli_query($conn, $sql))
        {
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        $sql2 = "update rating SET value=$value WHERE user_id=$userid and post_id=$postid";
        mysqli_query($conn, $sql2);
    }
    mysqli_close($conn);
?>