<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location:index.php");
}
include('header.php');
?>
<div class="container">
    <div class="row justify-content-md-center">
        <h1>User Password Update</h1>
    </div>
    <div class="clear-fix"></div>
    <div class="row">
        <div class="col">
            <form name="update" method="post" onsubmit="return updatepass()" action="updatepassword.php">
                <div class="form-group">
                    <label for="user_name">Old Password</label>
                    <input type="password" class="form-control" name="oldpasss" onblur="checkoldpassword()" placeholder="Old Password">
                    <span id="oldpasserr"></span>
                </div>
                <div class="form-group">
                    <label for="user_name">New Password</label>
                    <input type="password" class="form-control" name="Password" onkeyup="checkpassword()"
                        placeholder="New Password">
                    <span id="correctpass"></span>
                </div>
                <div class="form-group">
                    <label for="user_name">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" onkeyup="checkcpassword()"
                        placeholder="Confirm Password">
                    <span id="correctcpass"></span>
                </div>
                <button class="btn btn-success btn-lg btn-block" type="submit">Update</button>
            </form>
        </div>
    </div>
    <div class="foot-space">
    </div>
</div>
<?php 
 include("footer.php")
?>