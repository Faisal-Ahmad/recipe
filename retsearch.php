<?php
    session_start();
    include("connection.php");
    $key=$_GET["key"]; 
    $result=mysqli_query($conn,"SELECT id,name,recipe_details FROM recipe_post WHERE name LIKE '%$key%' and approve_status=1");
    $rows=mysqli_num_rows($result);
   
    $res2=Array();
    if ($rows> 0)
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $res = Array();
            $id=$row['id'];
            $result2=mysqli_query($conn,"SELECT MIN(id),image from recipe_instruct WHERE post_id=$id");
            $row2=mysqli_fetch_assoc($result2);
            array_push($res,$id,$row['name'],$row['recipe_details'],$row2['image']);
            array_push($res2,$res);
        }
       echo json_encode($res2);
    }
    else
    {
        echo json_encode(null);
    }

?>