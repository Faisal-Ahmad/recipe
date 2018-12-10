<!DOCTYPE html>
<html>
	<head>
		<script src="./assets/js/functions.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/styles.css">
	</head>
	<body >
		<div class="container2">
			<div class="picture_box">
			<img src="pix2.jpg" alt="Image_file" height="600px" width="350px">
			</div>
			<div class="input_field">
				<form name="signup" method="post" onsubmit="return validate()" action="saveuser.php">
					<table>
						<tr>
							<td>
								<div class="fields">
									<input type="text" name="Name" placeholder="Enter Your Name" onkeyup="checkName()"/>
									<span id="correctname"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="fields">
									<input type="text" name="Email" placeholder="Enter Your Email" onkeyup="checkEmail()"/>
									<span id="correctemail"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="fields">
									<h2>DOB :</h2><br/>
									<input type="date" name="dob"/>
									<span id="correctdob"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="fields">
									<h2>Gender :</h2><br/>
									<input type="radio" name="gender" value="Male" /><span>Male</span>
									<input type="radio" name="gender" value="Female"/><span>Female</span>
									<input type="radio" name="gender" value="Other" /><span>Other</span>
									<span id="correctgender"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="fields">
									<input type="password" name="Password" placeholder="Enter Your Password" onkeyup="checkpassword()"/>
									<span id="correctpass"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="fields">
									<input type="password" name="cpassword" placeholder="Enter Confirm Password" onkeyup="checkcpassword()"/>
									<span id="correctcpass"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<br/>
								<div class="fields">
									<button>Signup</button>
									<button onclick="location.href='index.php'" >back</button>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<br/>
								<div class="fields">
									<span>Have Account? <a href="login.php">Login</a></span>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
					 