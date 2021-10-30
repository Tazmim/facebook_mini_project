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
    <title><?php echo $login_user->name;?></title>
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

	<?php
    if(isset($_POST['update']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $cell = $_POST['cell'];
            $edu = $_POST['edu'];
            $uname = $_POST['username'];
            $gender = $_POST['gender'];
			$updated_at =date('Y-m-d h:m:s');

        if(empty($name) || empty($email) || empty($cell) || empty($uname))
            {
                echo validate("Fields are required");
                
            }
        else
           {
               update("UPDATE users SET name ='$name',username ='$uname',email ='$email',cell ='$cell', age = '$age', 
               edu = '$edu', gender = '$gender',updated_at = '$updated_at' WHERE id = '$login_user->id'");
			   set_msg('success','Data updated succesfully');
               header('location:edit.php');


           }


        }

		get_msg('success');
        
    
    
    
    ?>
	

	
	
	


<div class="wrap ">
	
	<br>
		<div class="card shadow">
		
			<div class="card-body">
			
				<h2>Change password</h2>
                
				
				
				<form action="" method = 'POST' >
					<div class="form-group">
						<label for="">Name</label>
						<input name = 'name' value = "<?php echo $login_user->name ;?>" class="form-control" type="text" >
					</div>
					<div class="form-group">
						<label for="">email</label>
						<input name = 'email' value = "<?php echo $login_user->email ;?>"class="form-control" type="text" >
					</div>
                    <div class="form-group">
						<label for="">Cell</label>
						<input name = 'cell'  value = "<?php echo $login_user->cell ;?>" class="form-control" type="text" >
					</div>

                    <div class="form-group">
						<label for="">username</label>
						<input name = 'username'  value = "<?php echo $login_user->username ;?>" class="form-control" type="text" >
					</div>
                    <div class="form-group">
						<label for="">Age</label>
						<input name = 'age'  value = "<?php echo $login_user->age ;?>" class="form-control" type="text" >
					</div>
                    <div class="form-group">
						<label for="">Education</label>
						<input name = 'edu'  value = "<?php echo $login_user->edu ;?>" class="form-control" type="text" >
					</div>
                    <div class="form-group">
						<label for="">Gender</label>
						<input type="radio" <?php echo($login_user->gender=='Male')?'checked':'' ;?> value = "Male" id = "Male" name = "gender"><label for="Male">Male</label>
						<input type="radio"  <?php echo($login_user->gender=='Female')?'checked':'' ;?> value = "Female" id = "Female" name ="gender"><label for="Female">Female</label>

						</div>
					<div class="form-group">
						<input name = 'update' class="btn btn-primary" type="submit" value="update">
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