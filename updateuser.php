<?php
    session_start();
    $name = $_POST["Name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $id=$_SESSION['id'];
        require_once("connection.php");
        $sql = "update user set Name='$name',Dob='$dob',gender='$gender' where User_Id=$id";
        if (mysqli_query($conn, $sql)) {
            header("location:user.php");
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>