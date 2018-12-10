<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location:index.php");
}
include('header.php');
include("connection.php");
    $result=mysqli_query($conn,"SELECT * from recipe_chatagory");
    $rows=mysqli_num_rows($result);
?>
<div class="container">
    <div class="row justify-content-md-center">
        <h1>Upload Reciepe</h1>
    </div>
    <div class="clear-fix"></div>
    <form method="post"  onsubmit="return postcheck()" action="savepost.php"  enctype="multipart/form-data">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" onkeyup="checkTitle()" />
                    <span id="errtititle"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="oldchatagory">Categories</label>
                    <select class="form-control" onclick="updateInput(this)" name="chatid">
                    <?php 
                        if ($rows> 0)
                        {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<option value='" . $row['name']. "'>". $row['name']."</option>";
                            }

                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="desc">Description</label>
                    <br>
                    <textarea name="desc" id="desc" cols="100" rows="5" onkeyup="checkDesc()"></textarea>
                    <span id="errdecs"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="serving">Serving</label>
                    <input type="text" class="form-control" name="seving" placeholder="Number 0f people" id="serving"
                        onkeyup="checkServing()" />
                    <span id="errserv"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="prept">Prep Time</label>
                    <input type="text" class="form-control" name="prept" id="prept" onkeyup="checkPreptime()"
                        placeholder="Calculate in minute" />
                    <span id="errprep"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <label for="clockt">Cook Time</label>
                    <input type="text" class="form-control" name="clockt" id="clockt" onkeyup="checkCookTime()"
                        placeholder="Calculate in minute" />
                    <span id="errcook"></span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Ingredients</h3>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <input type="text" name="ingredient" id="ingredient" style="display:none">
            <div class="col-10">
                <ul class="list-group list-group-flush" id="ingredientList">
                </ul>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-inline aIngredient">
                    <div class="col-md-1">
                        <label>Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="ingredientName" class="form-control" placeholder="Ingredient" />
                        <span id="graderr"></span>
                    </div>
                    <div class="col-md-1">
                        <label>Quantity</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="IngredientQuantity" class="form-control" placeholder="Quantity" />
                        <span id="quanerr"></span>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col-8">
                <button class="btn btn-primary btn-md btn-block" type="button" onclick="addIngredient()">Add</button>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Instruction</h3>
            </div>
            <input id="instructionIndex" name="instructionIndex" style="display:none" value="0" />
            <input type="text" name="instruction" id="instruction" style="display:none">
        </div>
        <br>
        <div id="instuctionList">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <br>
                        <textarea id="instructionDes0" style="height:150px;width:90%;" onkeyup="checkDesc()"></textarea>
                        <span id="errdecs"></span>
                    </div>
                </div>
                <div class="col-6 p-5">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload a Picture</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="picture0" id="picture0" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-8">
                <button class="btn btn-primary btn-md btn-block" type="button" onclick="addInstruction()">Add</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Upload a Video</h3>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload a Video</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="instVideo" id="instVideo" accept="video/*">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong> Only mp4 file is Allowed.
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <button class="btn btn-success btn-lg btn-block" type="submit">Upload</button>
            </div>
        </div>
    </form>
</div>
<div class="foot-space">
</div>

<?php 
 include("footer.php")
?>
