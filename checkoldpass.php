<?php
    session_start();
    include("connection.php");
    $password=$_GET["pass"]; 
    $id=$_SESSION['id'];
    $result=mysqli_query($conn,"select Password from user where User_Id=$id");
    $rows=mysqli_num_rows($result);
    if ($rows> 0)
    {
        $row = mysqli_fetch_assoc($result);
        if(md5($password)==$row['Password'])
        {
            echo json_encode(true);
        }    
    }
    else
    {
        echo json_encode(false);
    }

?>