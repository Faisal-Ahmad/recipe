<?php
    include("connection.php");
    $email=$_GET["email"]; 
    $result=mysqli_query($conn,"SELECT * FROM user where Email='$email'");
    $rows=mysqli_num_rows($result);
    if ($rows> 0)
    {        
        echo json_encode(false);
    }
    else
    {
        echo json_encode(true);
    }

?>