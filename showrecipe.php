<?php
session_start();
if(!isset($_SESSION['id']))
{
    include('primaryheader.php');
}
else
{
    $userid =$_SESSION['id'];
    if($_SESSION['type']==1)
    {
    include('adminheader.php');
    }
    if($_SESSION['type']==2)
    {
    include('header.php');
    }
}
$postid = $_GET['postid'];
$rating=0;
include("connection.php");
    $result=mysqli_query($conn,"SELECT image FROM recipe_instruct WHERE post_id=$postid");
    $rows=mysqli_num_rows($result);
    $result2=mysqli_query($conn,"SELECT recipe_post.name,recipe_post.recipe_details,recipe_post.category,user.Name from recipe_post INNER JOIN user where recipe_post.user_id=user.User_Id and recipe_post.id=$postid");
    $row2=mysqli_fetch_assoc($result2);
    $result3=mysqli_query($conn,"SELECT * FROM recipe_details WHERE post_id=$postid");
    $row3 = mysqli_fetch_assoc($result3);
    $result4=mysqli_query($conn,"SELECT description FROM recipe_instruct WHERE post_id=$postid");
    $rows4=mysqli_num_rows($result4);
    $result7=mysqli_query($conn,"SELECT value FROM rating WHERE post_id=$postid");
    $rows7=mysqli_num_rows($result7);
    $result8=mysqli_query($conn,"SELECT user_id,comments FROM comment WHERE post_id=$postid");
    $rows8=mysqli_num_rows($result8);
    if ($rows7> 0)
    {
        while($row7 = mysqli_fetch_assoc($result7)) 
        {
            $rating += $row7['value'];
        }
        $rating = round($rating/$rows7,2);
    }
    
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-info"><?php echo $row2['name']."-".$row2['category'];; ?></h2>
                <hr/>
                <p><?php echo $row2['recipe_details'] ?></p>
                <span class="float-right">Posted By -<cite><?php echo $row2['Name'] ?></cite><br/> Rating:<?php echo $rating?> Out of 5</span><br/><br/>
                <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-inline">
                                <form>
                                    <?php
                                    if(isset($_SESSION['type'])==2)
                                    {
                                        $result5=mysqli_query($conn,"SELECT id FROM favourite WHERE user_id=$userid and post_id=$postid");
                                        $row5 = mysqli_fetch_assoc($result5);
                                        $result6=mysqli_query($conn,"SELECT id FROM rating WHERE user_id=$userid and post_id=$postid");
                                        $row6 = mysqli_fetch_assoc($result6);
                                        if($row5['id']==null)
                                        {
                                        
                                   ?>
                                    <li class="list-inline-item" onclick="changefav(<?php echo $postid;?>,<?php echo $_SESSION['id'];?>)" id="favourite" value="0">
                                    <i class="far fa-heart"></i>
                                    </li>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <li class="list-inline-item" onclick="changefav(<?php echo $postid;?>,<?php echo $_SESSION['id'];?>)" id="favourite" value="1">
                                    <i class='fas fa-heart'></i>
                                    </li>
                                    <?php
                                        }
                                        if($row6['id']==null)
                                        {
                                    ?>
                                    <li class="list-inline-item">Rating :
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="1">1
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="2">2
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="3">3
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="4">4
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="5">5
                                        </label>
                                    </li>
                                    <button class="btn btn-primaryc btn-sm" id="rate" type="button" onclick="rating(<?php echo $postid;?>,<?php echo $_SESSION['id'];?>)">Rate</button>
                                    <?php
                                        }
                                    }
                                    ?>
                                </form>
                            </ul>
                        </div>
                    </div>
                <hr/>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                            <?php
                            if ($rows> 0)
                            {
                                $first = 0;
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $imagename = $row["image"];
                                    if($first==0)
                                    {
                                        echo "<div class='carousel-item active'>";
                                        echo "<img class='d-block w-100' src='./posts/$postid/pictures/$imagename' alt='First slide'>";
                                        echo "</div>";
                                        $first++;
                                    }
                                    else
                                    {
                                        echo "<div class='carousel-item'>";
                                        echo "<img class='d-block w-100' src='./posts/$postid/pictures/$imagename' alt='First slide'>";
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                    </div>
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <video class="video-fluid z-depth-1 embed-responsive" autoplay loop controls muted>
                    <source src="<?php echo "./".$row3['Video'] ?>" type="video/mp4" />
                </video>
            </div>
            <div class="col-md-6">
                <h2 class="text-secondary">Ingradients :</h2>
                <hr/>
                <ul class="list-unstyled">
                    <?php 
                    $string= explode(",",$row3['ingradiants']);
                    foreach($string as $ingradiant)
                    {
                        echo "<li><h5><i class='fas fa-certificate'></i>$ingradiant</h5></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-info">Instructions :</h2>
                <hr/>
                <div class="row">
                    <div class="col-md-4">
                    <h5 class="text-secondary">Preparing Time :<?php echo $row3['prep_time'];?> Min.</h5>
                    </div>
                    <div class="col-md-4">
                    <h5 class="text-secondary">Cook Time :<?php echo $row3['cook_time'];?> Min.</h5>
                    </div>
                    <div class="col-md-4">
                    <h5 class="text-secondary">No. of serv:<?php echo $row3['serving'];?> People</h5>
                    </div>
                </div>
                <hr/>
                <ul class="list-unstyled">
                    <?php                   
                        if ($rows4> 0)
                        {
                            while($row4 = mysqli_fetch_assoc($result4)) 
                            {
                                $instract =$row4['description'];
                                echo "<li><h5><i class='fas fa-arrow-circle-right'></i>$instract</h5></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <hr/>
                <h3 class="text-secondary">Comments:</h3>
                <hr/>
                <?php
                if(isset($_SESSION['type'])==2)
                {
                ?>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="comment"></textarea><span id="cmderr"></span>
                            <button class="btn btn-success float-right" type="button" onclick="sendcomment(<?php echo $postid;?>,<?php echo $_SESSION['id'];?>)">Send</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <?php
                        if ($rows8> 0)
                        {
                            while($row8 = mysqli_fetch_assoc($result8)) 
                            {
                                $comuser =$row8['user_id'];
                                $result9=mysqli_query($conn,"SELECT name FROM user WHERE User_Id=$comuser");
                                $row9 = mysqli_fetch_assoc($result9);
                                $comment = $row8['comments']; 
                                $name =$row9['name']; 
                            ?>      
                                <li>
                                <div class="card-header"><?php echo $name?></div>
                                <div class="card-body">
                                   
                                    <p class="card-text"><?php echo $comment?></p>
                                </div>
                                </li>
                            <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php 
 include("footer.php");
?>