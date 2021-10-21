<?php

  include_once "autoload.php";
  include_once "app/database.php";

  if(userloginCheck()==true)
  {
	  header('location:profile.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php
	
	if(isset($_POST['signup']))
	{
		 $login = $_POST['login'];
		  $pass = $_POST['password'];
	

	if(empty($login)||empty($pass))
	{
		$msg = validate("All fields are required");
	}
	else{
		$login_user_data = authCheck('users','email',$login);
		if($login_user_data!=false)
		{
			if(passwordCheck($pass,$login_user_data->password)==true)
			{
				$_SESSION['id'] = $login_user_data->id;
				header('location:profile.php');

				

			}
			else
			{
				$msg = validate("Invalid password","warning");

			}
			

		}
		else{
			$msg = validate("Invalid email address");
		}
	}
}
	
	
	
	
	
	
	?>
<div class="wrap ">
	<a href="index.php" class="btn btn-sm btn-primary">All Students</a>
	<br>
		<div class="card shadow">
		
			<div class="card-body">
				<h2>Login Here</h2>
				<?php
				if(isset($msg))
				{
					echo $msg;
				}
				
				
				?>
				
				<form action="" method = 'POST' autocomplete = "off">
					<div class="form-group">
						<label for="">Login Info</label>
						<input name = 'login' placeholder = "email or cell or username" class="form-control" type="text" value ="<?php old('login');//old value gulo dhore rekhecehe?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name = 'password' placeholder = "password" class="form-control" type="password" value " ">
					</div>
					<div class="form-group">
						<input name = 'signup' class="btn btn-primary" type="submit" value="Login">
					</div>
				</form>
				<hr>
				<a href="reg.php">Create an account</a>
			</div>
		</div>
	</div>

  
	






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>