<?php
    session_start();
    $user_id=$_SESSION['id'];
    $title = $_POST['title'];
    $descrip = $_POST['desc'];
    $category = $_POST['chatid'];
    $serving = $_POST['seving'];
    $prept = $_POST['prept'];
    $cookt = $_POST['clockt'];
    $ingredients = $_POST['ingredient'];
    $index = $_POST["instructionIndex"];
    $index = (int) $index;
    $instructions = explode("###", $_POST['instruction']);

    $descrip = str_replace("'", '"', $descrip);
    require_once("connection.php");
       $sql = "INSERT INTO recipe_post (user_id,category ,recipe_details ,name,approve_status) VALUES ('$user_id', '$category','$descrip', '$title', '0');";
        if (!mysqli_query($conn, $sql))
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $result=mysqli_query($conn,"SELECT max(id) as max FROM recipe_post");  
        $row = mysqli_fetch_assoc($result);
        $lastpostid = $row['max'];
        $sql2 = "";
        
        $video = $_FILES["instVideo"];
        if( $video["size"] > 0 ){
            $target_dir = "posts/" . $lastpostid . '/' . 'video' . '/' ;
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["instVideo"]["name"]);
            move_uploaded_file($_FILES["instVideo"]["tmp_name"], $target_file);
           
            $sql2 = "INSERT INTO recipe_details (post_id, serving, prep_time,cook_time, ingradiants, video) VALUES ('$lastpostid', '$serving', '$prept', '$cookt', '$ingredients', '$target_file');";
            
        }
        else{
            $sql2 = "INSERT INTO recipe_details (post_id, serving, prep_time,cook_time, ingradiants) VALUES ('$lastpostid', '$serving', '$prept', '$cookt', '$ingredients');";
        }
        
        if (mysqli_query($conn, $sql2))
        {
            for( $i=0; $i < $index; $i++ ){
                $target_dir = "posts/" . $lastpostid . '/' . 'pictures' . '/' ;
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $target_file = $target_dir . basename($_FILES["picture".$i]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $filename = (string)$i .'.'. $imageFileType;
                move_uploaded_file($_FILES["picture".$i]["tmp_name"], $target_dir.$filename);
                $sqlAdd = "INSERT INTO recipe_instruct VALUES(NULL, $lastpostid , '$instructions[$i]' , '$filename' )";
                mysqli_query($conn, $sqlAdd);
            }
          
        }
        else
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
        header("location:uploadrecipe.php");

    mysqli_close($conn);
?>