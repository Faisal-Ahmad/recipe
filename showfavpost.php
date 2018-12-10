<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('index.php');
}
    $id=$_SESSION['id'];
    include('header.php');
include("connection.php");
    if($result=mysqli_query($conn,"SELECT post_id FROM favourite WHERE user_id=$id"))
    {
    $rows=mysqli_num_rows($result);
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
?>
    <div class="container">
                <?php
                
                if ($rows> 0)
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        $recid = $row['post_id'];
                        $result4=mysqli_query($conn,"SELECT * FROM recipe_post  WHERE id=$recid");
                        $row4 = mysqli_fetch_assoc($result4);
                        $name2 = $row4["name"];
                        $details = $row4['recipe_details'];
                ?>
                    <div class="card" style="width: 18rem;">
                <?php
                    $result2=mysqli_query($conn,"SELECT MIN(id),image from recipe_instruct WHERE post_id=$recid");
                    $row2=mysqli_fetch_assoc($result2);
                        $imagename = $row2['image'];
                        echo "<img class='card-img-top' src='./posts/$id/pictures/$imagename' alt='Card image cap'";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$name2</h5>";
                        echo "<p class='card-text'>$details</p>";
                        echo "<a href='showrecipe.php?postid=$id' class='btn btn-primary'>Details</a>";
                        echo "</div>";
                    }
                }
                ?>       
    </div>
<?php 
 include("footer.php");
?>