<?php
    session_start();
    $id = $_GET["postid"];
        require_once("connection.php");
       $sql = "update recipe_post SET approve_status=1 WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            header("location:approve.php");
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>