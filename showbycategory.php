<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('primaryheader.php');
}
else
{
    include('header.php');
}
$category=$_GET['key'];
include("connection.php");
    if($result=mysqli_query($conn,"SELECT * FROM recipe_post  WHERE category='$category' ORDER by id DESC"))
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
                        $name2 = $row["name"];
                        $id=$row['id'];
                        $details = $row['recipe_details'];
                ?>
                    <div class="card" style="width: 18rem;">
                <?php
                    $result2=mysqli_query($conn,"SELECT MIN(id),image from recipe_instruct WHERE post_id=$id");
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