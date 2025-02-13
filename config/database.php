<?php

// to remove warnin =we can add @
  
  $conn= @new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);


  //CHECK
  if ($conn->connect_error){
    die ("Connection failed:  ". $conn->connect_error);
  }




?>