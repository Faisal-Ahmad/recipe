<!DOCTYPE html>
<html>
<head>
	<script src="./assets/js/functions.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<div class="container2">
		<div class="picture_box">
			<img src="pix3.png" alt="Image_file" height="600px" width="350px">
		</div>
		<div class="input_field">
			<form name="signup" method="post" onsubmit="return submitdata()" action="checkuser.php">
				<table class="loginbox">
					<tr>
						<td>
							<div class="fields">
								<h1>MyRecipe</h1>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<br /><br /><br />
							<div class="fields">
								<?php
										if(isset($_COOKIE["enter_email"]))
										{
									?>
								<input type="text" name="Email" value="<?php echo $_COOKIE["enter_email"]; ?>" onkeyup="useremail()"/>
								<?php
										}
										else
										{
									?>
								<input type="text" name="Email" placeholder="Enter Your Email" onkeyup="useremail()" />
								<?php
										}
									?>
								<span id="correctemail"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<br />
							<div class="fields">
								<?php
										if(isset($_COOKIE["enter_pass"]))
										{
									?>
								<input type="password" name="Password" value="<?php echo $_COOKIE["enter_pass"]; ?>"
								onkeyup="userpassword()"/>
								<?php
										}
										else
										{
									?>
								<input type="password" name="Password" placeholder="Enter Your Password" onkeyup="userpassword()" />
								<?php
										}
									?>

								<span id="correctpass"></span>
								<?php
										if(isset($_GET["ue"]))
										{
									?>
								<span style="color:red;">Username/Password not exist</span>
								<?php
										}
									?>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<br /><br />
							<div class="fields">
								<button>Login</button>
								<button onclick="location.href='index.php'">back</button>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<br /><br />
							<div class="fields">
								<span>Have No Account? <a href="signup.php">Signup</a></span>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>