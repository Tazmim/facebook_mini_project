<?php
 include_once "autoload.php";

 if(userloginCheck()==false)
 {
     header('location:index.php');

 }
 else{
     if(isset($_GET['user_id']))
     {
        $login_user = login_user_data('users',$_GET['user_id']);
     }
     else{
        $login_user = login_user_data('users',$_SESSION['id']);

     }

   
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
    <section class="user-profile">
    <?php if(isset($login_user->photo)):?>
            <img class="justify-content-cenetr" src="media/users/<?php echo $login_user->photo;?>" alt="">
       <?php elseif ($login_user->gender):?>
            <img class="justify-content-cenetr" src="assets/image/male.png" alt="">
       <?php else:?>
            <img class="justify-content-cenetr" src="assets/image/female.jpg" alt="">

        

        <?php endif;?>

        <h3 class="text-center  display-5 py-3"><?php $login_user->name;?></h3>
        <div class="card shadow">
            <div class="card-body shadow">
                <table class="table table-stripped">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $login_user->name;?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><?php echo $login_user->email;?></td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td><?php echo $login_user->cell;?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $login_user->gender;?></td>
                    </tr>
                </table>
            </div>
        </div>
</section>




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>    
</body>
</html>