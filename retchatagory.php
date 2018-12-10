<?php
    include("connection.php");
    $result=mysqli_query($conn,"SELECT * FROM recipe_chatagory");
    $rows=mysqli_num_rows($result);
    $res = Array();
    if ($rows> 0)
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($res,$row['id'],$row['name']);
        }
       echo json_encode($res);
      
    }
    else
    {
        echo json_encode(true);
    }

?>