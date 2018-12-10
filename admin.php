<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location:index.php");
}
include('adminheader.php');
?>
    <div class="container">
    <div class="row justify-content-md-center">
        <h1>Admin Profile</h1>
    </div>
    <div class="clear-fix"></div>
    <div class="row"> 
        <div class="col">
            <form>
                <div class="form-group">
                    <label for="user_name">UserName</label>
                    <input type="text" class="form-control" id="user_name"  disabled>
                </div>
                <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input type="text" class="form-control" id="dob"  disabled>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender"  disabled>
                </div>
                <div class="form-group">
                    <label for="dob">Email</label>
                    <input type="text" class="form-control" id="email"  disabled>
                </div>
            </form>
        </div>
    </div>
<?php
    include("footer.php");
?>
<script>
    showuser();
</script>