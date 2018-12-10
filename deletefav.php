<?php
    $Postid = $_GET["post"];
    $userid = $_GET["user"];
        require_once("connection.php");
       $sql = "DELETE FROM favourite WHERE user_id=$userid and post_id=$Postid";
        if (mysqli_query($conn, $sql)) {
            echo "Done";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
?>