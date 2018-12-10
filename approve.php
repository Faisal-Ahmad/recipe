<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('index.php');
}
include('adminheader.php');
include("connection.php");
    $result2=mysqli_query($conn,"SELECT * from recipe_post WHERE approve_status=0");
    $rows2=mysqli_num_rows($result2);
?>
    <div class="container">
                <?php
                if ($rows2> 0)
                {
                    while($row2 = mysqli_fetch_assoc($result2)) 
                    {
                        $name2 = $row2["name"];
                        $id=$row2['id'];
                        $details = $row2['recipe_details'];
                ?>
        <div class="card">
                <?php
                    $result3=mysqli_query($conn,"SELECT MIN(id),image from recipe_instruct WHERE post_id=$id");
                    $row3=mysqli_fetch_assoc($result3);
                        $imagename = $row3['image'];
                        echo "./posts/$id/pictures/$imagename";
                        echo "<img class='card-img-top' src='./posts/$id/pictures/$imagename' alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$name2</h5>";
                        echo "<p class='card-text'>$details</p>";
                        echo "<a href='showrecipe.php?postid=$id' class='btn btn-primary btn-block'>Details</a>";
                        echo "<a href='updatestatus.php?postid=$id' class='btn btn-secondary btn-block'>Approve</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>       
        </div>
    </div>
<?php 
 include("footer.php");
?>