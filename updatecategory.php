<?php
    $chatagory = $_POST["chatagory"];
    $id=$_POST["chatid"];
    echo $id;
    require_once("connection.php");
       $sql = "UPDATE recipe_chatagory SET name = '$chatagory' WHERE id = $id;";
        if (mysqli_query($conn, $sql)) {
            header("location:categoryupdate.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
?>