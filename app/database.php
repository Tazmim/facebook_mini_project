<?php

include_once "autoload.php";

//Database connection

function connect()
{
    
    return new mysqli(HOST,USER,PASS,DB);
}
//Create function

function create($sql)
{
    connect()->query($sql);
}
//query for selectiong all from database

function all($table)
{
    
   return connect()->query("SELECT * FROM $table");

}

//This is used in updating
function find($table,$id)

{
    $sql = "SELECT * FROM {$table} WHERE id = {$id}";
    $data = connect()->query($sql);
    return $data->fetch_object();
}



?>