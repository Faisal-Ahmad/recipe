<?php
    $conn= mysqli_connect('localhost','root','','recipe');
    if(!$conn)
    {
        die("Connection Problem: " . mysqli_connect_error());
        echo "<h3><a href='Signup.php'>Back</a></h3>";
    }
?>