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
        <h1>User Profile Update</h1>
    </div>
    <div class="clear-fix"></div>
    <div class="row">
        <div class="col">
            <form name="updateuser" method="post" onsubmit="return checkName()" action="updateuser.php">
                <div class="form-group">
                    <label for="user_name">UserName</label>
                    <input type="text" class="form-control" id="update_name" onkeyup="checkName()" name="Name" placeholder="User Name..">
                    <span id="correctname"></span>
                </div>
                <div class="form-group">
                    <label for="dob">Gender</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input gender" type="radio" id="male" name="gender" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input gender" type="radio" id="female" name="gender" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input gender" type="radio" id="other" name="gender" value="Other">
                        <label class="form-check-label" for="female">Other</label>
                    </div>
                </div>
                <div class="form-group incline">
                    <label for="dob">Date Of Birth</label>
                    <div class="col">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker'>
                                <input type='date' class="form-control" id="dob" name="dob"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" disabled>
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
<script>
    edituser();
</script>
</body>