<?php
    session_start();
    include("connection.php");
    $id=$_SESSION["id"]; 
    $result=mysqli_query($conn,"SELECT * FROM user where User_Id='$id'");
    $rows=mysqli_num_rows($result);
    $res = Array();
    if ($rows> 0)
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($res,$row['Name'],$row['Dob'],$row['Gender'],$row['Email']);
        }
       echo json_encode($res);
      
    }
    else
    {
        echo json_encode(true);
    }

?>