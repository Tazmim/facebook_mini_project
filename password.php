<?php
 include_once "autoload.php";

 if(userloginCheck()==false)
 {
     header('location:index.php');

 }
 else{

    $login_user = login_user_data('users',$_SESSION['id']);
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
   <?php
    
    include_once "template/menu.php";
   
   
   
   
   ?>

<div class="wrap ">
	
	<br>
		<div class="card shadow">
		
			<div class="card-body">
				<h2>Change password</h2>
				
				
				<form action="" method = 'POST' autocomplete = "off">
					<div class="form-group">
						<label for="">password change</label>
						<input name = 'pass' placeholder = "old password" class="form-control" type="password" >
					</div>
					<div class="form-group">
						<label for="">New password</label>
						<input name = 'pass' placeholder = "new password" class="form-control" type="password" >
					</div>
                    <div class="form-group">
						<label for="">confirm password</label>
						<input name = 'pass' placeholder = "confirm password" class="form-control" type="password" >
					</div>
					<div class="form-group">
						<input name = 'signup' class="btn btn-primary" type="submit" value="submit">
					</div>
				</form>
				<hr>
				
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