<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('primaryheader.php');
}
else
{
    if($_SESSION['type']==1)
    {
    include('adminheader.php');
    }
    if($_SESSION['type']==2)
    {
    include('header.php');
    }
}
include("connection.php");
    $result=mysqli_query($conn,"SELECT * from recipe_chatagory");
    $rows=mysqli_num_rows($result);
    $result2=mysqli_query($conn,"SELECT * from recipe_post WHERE approve_status=1");
    $rows2=mysqli_num_rows($result2);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="catagory">
                    <h2>All Chatagories</h2>
                    <div class="catagory-container">
                        <ul class="list-unstyled">
                            <?php
                            if ($rows> 0)
                            {
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $name = $row["name"];
                                    echo "<li><a href='showbycategory.php?key=$name'>". $name."</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  flex-row justify-content-center">
            <div class="col-md-4">
                <div id="card-list">
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
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>     
                </div>
            </div>
        </div>
    </div>
<?php 
 include("footer.php");
?>