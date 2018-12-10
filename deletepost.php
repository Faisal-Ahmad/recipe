<?php
    session_start();
    $id = $_GET["postid"];
        require_once("connection.php");
       $sql = "DELETE FROM recipe_post WHERE id=$id";
       $sql2 = "DELETE FROM recipe_instruct WHERE post_id=$id";
       $sql3 = "DELETE FROM recipe_details WHERE post_id=$id";
       $sqle = "DELETE FROM recipe_details WHERE post_id=$id";
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
            if($_SESSION['type']==1)
            {
                header("location:delete.php");
            }
            if($_SESSION['type']==2)
            {
                header("location:deletebyuser.php");
            }
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>