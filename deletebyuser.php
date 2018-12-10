<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('index.php');
}
$userid=$_SESSION['id'];
include('header.php');
include("connection.php");
    $result2=mysqli_query($conn,"SELECT * from recipe_post WHERE approve_status=1 and user_id=$userid");
    $rows2=mysqli_num_rows($result2);
?>
    <div class="container bg-secondary">
        <div class="row">
            <div class="col-md-6">
                <h2 class=" text-success">Approved</h2>
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
                                echo "<img class='card-img-top' src='./posts/$id/pictures/$imagename' alt='Card image cap'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>$name2</h5>";
                                echo "<p class='card-text'>$details</p>";
                                echo "<a href='showrecipe.php?postid=$id' class='btn btn-primary btn-block'>Details</a>";
                                echo "<a href='deletepost.php?postid=$id' class='btn btn-danger btn-block'>Delete</a>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>       
            </div>
            <div class="col-md-6">
                <h2 class=" text-danger">Panding</h2>
                    <?php
                    $result=mysqli_query($conn,"SELECT * from recipe_post WHERE approve_status=0 and user_id=$userid");
                    $rows=mysqli_num_rows($result);
                    if ($rows> 0)
                    {
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            $name = $row["name"];
                            $id=$row['id'];
                            $details = $row['recipe_details'];
                    ?>
                <div class="card">
                        <?php
                            $result4=mysqli_query($conn,"SELECT MIN(id),image from recipe_instruct WHERE post_id=$id");
                            $row4=mysqli_fetch_assoc($result4);
                                $imagename = $row4['image'];
                                echo "<img class='card-img-top' src='./posts/$id/pictures/$imagename' alt='Card image cap'";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>$name2</h5>";
                                echo "<p class='card-text'>$details</p>";
                                echo "<a href='showrecipe.php?postid=$id' class='btn btn-primary'>Details</a>";
                                echo "<a href='deletepost.php?postid=$id' class='btn btn-danger'>Delete</a>";
                                echo "</div>";
                            }
                        }
                        ?>  
            </div>
        </div>
    </div>
<?php 
 include("footer.php");
?>