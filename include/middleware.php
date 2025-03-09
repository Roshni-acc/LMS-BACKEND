<?php

 if(isset($_SESSION['is_user_login'])) {
     return true ;
 } else {
    $_SESSION['error'] = "Please login first";
    header("Location: " . BASE_URL .'login.php'  );
    exit;
 }





?>