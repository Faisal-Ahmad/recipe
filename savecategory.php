<?php
    $chatagory = $_POST["chatagory"];
    require_once("connection.php");
        $sql = "INSERT INTO recipe_chatagory (name) VALUES ('$chatagory');";
        if (mysqli_query($conn, $sql)) {
            header("location:addcategory.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>