<?php
include_once "autoload.php";
include_once "database.php";

//login authentication check

function authCheck($table,$col,$data)
{
   $login_data =  connect()->query("SELECT * FROM {$table} Where {$col} = '$data'");
   
    
   if($login_data->num_rows==1)
   {
       return $login_data->fetch_object();
   }
   else {
       
       return false ;
   }
}

//password check

function passwordCheck($users_pass,$db_pass)
{
   $data = password_verify($users_pass,$db_pass);
   if($data == true)
   {
       return true;
   }
   else{
       return false;
   }


}

//user login check
function userloginCheck()
{
    if(isset($_SESSION['id']))
    {
        return true;
    }
    else{
        return false;
    }

}



?>