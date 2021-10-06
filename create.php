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
   //form theke data gulo dhorce

   if(isset($_POST['add_student']))
   {

	$name  = $_POST['name'];
	$email  = $_POST['email'];
	$cell  = $_POST['cell'];
	$location  = $_POST['location'];
	$age  = $_POST['age'];
	$amount  = $_POST['amount'];
	if(isset($_POST['gender'])){
		$gender  = $_POST['gender'];

	}
	else{
		$gender = NULL;
	}

	//cellCheck function call korce validation er jonno
	//cellCheck($cell);

	if(empty($name)||empty($email)||empty($cell)||empty($amount)||empty($age))
	{
		$msg = validate("All fields are required");

	}
	else if (emailCheck($email)==false)
	{
		$msg = validate('Invalid Email');

	}
	else if(cellCheck($cell)==false){
		$msg = validate("Invalid Cell Number");
	}
	else{

		$file_name = move($_FILES['photo'],'media/students/');

		//database a query diye data insert koreche


		create("INSERT INTO students (name,email,cell,photo,location,age,gender,amount) VALUES ('$name','$email','$cell','$file_name','$location','$age','$gender','$amount')");
		$msg = validate('Data Inserted Successfully', 'success');
		formClean();


	}

   }
   
 
 
 ?>
	

	<div class="wrap ">
	<a href="index.php" class="btn btn-sm btn-primary">All Students</a>
	<br>
		<div class="card shadow">
		
			<div class="card-body">
				<h2>Add new student</h2>
				<?php
				//ekhane msg show koreche
				if(isset($msg)){
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
						<label for="" >Location</label>
						<select class= 'form-control' name="location" id="">
							<option value="">--select--</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Banani">Banani</option>
							<option value="Dhanmondi">Dhanmondi</option>
							<option value="Gazipur">Gazipur</option>
					</select>
						
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name = 'age' class="form-control" type="text" value = "<?php old('age');?>"">
					</div>
					
					<div class="form-group">
						<label for="">Gender</label>
						<input type="radio" value = "Male" id = "Male" name = "gender"><label for="Male">Male</label>
						<input type="radio" value = "Female" id = "Female" name ="gender"><label for="Female">Female</label>

						</div>
						<div class="form-group">
						<label for="">amount</label>
						<input name ='amount' class="form-control" type="text" value = "<?php old('amount');?>"">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name = 'photo' class="" type="file" value = "<?php old('photo');?>">
					</div>
					<div class="form-group">
						<input name = 'add_student' class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
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