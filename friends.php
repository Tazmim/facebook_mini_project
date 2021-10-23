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

	<link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
   <?php
    
    include_once "template/menu.php";
   
   ?>
  <div class="container">
     
     <div class="row">
     <?php
        $all_user = all('users');

        while($users = $all_user->fetch_object()):
        if($users->id != $_SESSION['id']):
        
    ?>
         <div class="col-md-3">
            <img style = "height:150px;width:150px;border-radius:50%;object-fit:cover;margin-top:20px;" src="media/users/<?php echo $users->photo?>" alt="">
                <h4><?php echo $users->name;?></h4>
            <a href="profile.php?user_id=<?php echo $users->id ;?>" class="btn btn-primary">view profile</a>
             
         </div>

      
     <?php endif; endwhile;?>

         
    
    
    
         
     </div>
     
     
 </div>


  


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>    
</body>
</html>