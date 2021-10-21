<?php

  include_once "autoload.php";
  include_once "app/database.php";

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
	if(isset($_POST['reg']))
	{
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $cell = $_POST['cell'];
		 $uname = $_POST['username'];
		 $pass = $_POST['pass'];
		 $cpass = $_POST['cpass'];
		$gender  = NULL;
		if(isset($_POST['gender']))
		{
			 echo $gender = $_POST['gender'];
		}
	}
	

	if(empty($name)||empty($email)||empty($cell)||empty($uname)||empty($pass)||empty($cpass)||empty($gender))
	{
		$msg = validate("All fileds are required");
	}

	else if(emailCheck($email)==false)
	{
		$msg = validate("Invalid Email");

	}

	else if(passCheck($pass,$cpass)==false)
	{
		$msg = validate("Invalid Password");


	}
	else if(dataCheck('users','email',$email)==false)
	{
		$msg = validate("Email already exists");

	}
	else if(dataCheck('users','username',$uname)==false)
	{
		$msg = validate("Username already exists");

	}
	else if(dataCheck('users','cell',$cell)==false)
	{
		$msg = validate("cell already exists");

	}
	
	

	else{
		//HASH passord
	$hash_pass = getHash($pass);
		create("INSERT INTO users (name,email,cell,username,password,gender)  VALUES ('$name','$email','$cell','$uname','$hash_pass','$gender')");

		$msg = validate("User registration successfull");
		formClean();
	}
	
	
	?>

  

	<div class="wrap ">
	
		<div class="card shadow">
		
			<div class="card-body">
				<h2>Sign Up</h2>
				<?php
				if(isset($msg))
				{
					echo $msg;
				}
				
				?>
				
				<form action="" method = 'POST' enctype = "multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name = 'name' class="form-control" type="text" value ="<?php old('name');//old value gulo dhore rekhecehe?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name = 'email' class="form-control" type="text" value ="<?php old('email');?>">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name = 'cell' class="form-control" type="text" value = "<?php old('cell');?>"">
					</div>

					<div class="form-group">
						<label for="">Username</label>
						<input name = 'username' class="form-control" type="text" value = "<?php old('username');?>"">
					</div>

                    <div class="form-group">
						<label for="">Password</label>
						<input name = 'pass' class="form-control" type="password" value = "<?php old('pass');?>"">
					</div>
                    <div class="form-group">
						<label for="">Confirm Password</label>
						<input name = 'cpass' class="form-control" type="password" value = "<?php old('cpass');?>"">
					</div>
                   
					
					<div class="form-group">
						<label for="">Gender</label>
						<input type="radio" value = "Male" id = "Male" name = "gender"><label for="Male">Male</label>
						<input type="radio" value = "Female" id = "Female" name ="gender"><label for="Female">Female</label>

						</div>
						
					
					<div class="form-group">
						<input name = 'reg' class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
                <a href="index.php">Login Now</a>
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