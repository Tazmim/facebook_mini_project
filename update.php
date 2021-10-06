<?php 
include_once "autoload.php";
 echo $edit_id = $_GET['edit_id'];

 $student = find('students',$edit_id);


//connect()->query("UPDATE students SET name ='Tazmim  Hossain Bondhon',email = 'bonhossain@gmail.com' WHERE id = '$edit_id' ");
//header("location:index.php");

?>

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

   if(isset($_POST['update_student']))
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

	//$photo = $_POST['photo'];
	cellCheck($cell);

	if(empty($name)||empty($email)||empty($cell))
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
        $sql = "UPDATE students SET name = '$name', age = '$age', email = '$email',amount = '$amount' WHERE ID = '$edit_id'";


		connect()->query($sql);
		$msg = validate('Data Updated Successfully', 'success');
		formClean();
        header("location:index.php");


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
				if(isset($msg)){
					echo $msg;
				}
				
				?>
				<form action="" method = 'POST' enctype = "multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name = 'name' class="form-control" type="text" value ="<?php echo $student->name;?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name = 'email' class="form-control" type="text" value ="<?php echo $student->email;?>">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name = 'cell' class="form-control" type="text" value = "<?php echo $student->cell;?>"">
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
						<input name = 'age' class="form-control" type="text" value = "<?php echo $student->age;?>"">
					</div>
					
					<div class="form-group">
						<label for="">Gender</label>
						<input type="radio" value = "Male" id = "Male" name = "gender"><label for="Male">Male</label>
						<input type="radio" value = "Female" id = "Female" name ="gender"><label for="Female">Female</label>

						</div>
						<div class="form-group">
						<label for="">amount</label>
						<input name ='amount' class="form-control" type="text" value = "<?php echo $student->Amount;?>"">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name = 'photo' class="" type="file" value = "<?php old('photo');?>">
					</div>
					<div class="form-group">
						<input name = 'update_student' class="btn btn-primary" type="submit" value="Upadate Now">
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