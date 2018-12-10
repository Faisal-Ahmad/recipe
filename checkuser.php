<?php
    session_start();
    include("connection.php");     
    $email=$_POST["Email"];
    $password = $_POST["Password"];
    setcookie("enter_email", $email, time() + (5), "/");
    setcookie("enter_pass", $password, time() + (5), "/");
    $query = "SELECT * FROM user where Email='$email' and Password='".md5($password)."'";
    $result=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($result);
    if ($rows> 0)
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $_SESSION['id']=$row['User_Id'];
            $_SESSION['type']=$row['Type'];
        }
        if($_SESSION['type']==1)
        {
        header("Location:admin.php");
        }
        if($_SESSION['type']==2)
        {
            header("Location:home.php");
        }
    }
    else
    {
        header("Location:login.php?ue=y");
    }

?>
   
