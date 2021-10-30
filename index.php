<?php

  include_once "autoload.php";
  include_once "app/database.php";

  if(userloginCheck()==true)
  {
	  header('location:profile.php');
  }
  if(isset($_COOKIE['login_user_cookie_id']))
  {
	  $login_cookie_id = $_COOKIE['login_user_cookie_id'];
	  $_SESSION['id'] =  $login_cookie_id ;
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
				setcookie('login_user_cookie_id',$login_user_data->id,time() + (60*60*24*365*7));

				

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


	<div class="wrap rlogin">
		<div class="row">
			<?php 
			if(isset($_COOKIE['recent_login_id'])) :

			//arrray te convert 
				$recent_login_user_arr = json_decode($_COOKIE['recent_login_id'],true);
				//koma koma kore arrayr element gulo ase
				$users_id = implode(',',$recent_login_user_arr);
				// query
				$sql = "SELECT * FROM users WHERE id IN ($users_id)";
				$data = connect()->query($sql);
				
			
			while($user = $data->fetch_object()):
			
			?>
			
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<img style = "width:100%; height:160 px;" src="media/users/<?php echo $user->photo ;?>" alt="">
						<h4><?php echo $user->name ;?></h4>
					</div>
				</div>
				
			</div>
			<?php endwhile ; ?>
			<?php endif ; ?>
			
			
		</div>
		
	</div>
  
	






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>