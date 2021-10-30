<?php

session_start();
//recent laogin with cookies start here

$logout_user_id = $_SESSION['id'];

if(isset($_COOKIE['recent_login_id']))

{
     //old data ke array te convert

    $old_data = json_decode($_COOKIE['recent_login_id'],true); 
    // new data ke old datar sathe push

    array_push($old_data,$logout_user_id);  

    // cookie set
    setcookie('recent_login_id',json_encode($old_data),time() + (60*60*24*365*7));

}

else
{
    //jodi recent_login_id faka thake
    $arr = [];
    // array te push
    array_push($arr,$logout_user_id);
    
    //cookie set and json e convert
    setcookie('recent_login_id',json_encode($arr),time() + (60*60*24*365*7));


}

//recent laogin with cookies ends here







session_destroy();
setcookie('login_user_cookie_id','',time() - (60*60*24*365*7));

header('location:index.php');




?>