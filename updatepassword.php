<?php
    session_start();
    $id = $_SESSION['type'];
    $password = md5($_POST["Password"]);
    $conn = mysqli_connect("localhost", "root", "", "recipe");
    require_once("connection.php");
        $sql = "update user set Password = '$password' WHERE User_Id = $id";
        if (mysqli_query($conn, $sql)) {
            header("location:sclose.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>