<?php
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $password = md5($_POST["Password"]);
    require_once("connection.php");
        $sql = "INSERT INTO user (Name,Dob,Gender,Email,Password,Type) VALUES ('$name', '$dob', '$gender', '$email', '$password',2);";
        if (mysqli_query($conn, $sql)) {
            header("location:user.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
?>