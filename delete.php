<?php 
include_once "autoload.php";
$delete_id = $_GET['delete_id'];

//deleting query


connect()->query("DELETE FROM students WHERE id ='$delete_id'");
header("location:index.php");

?>