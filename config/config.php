<?php

session_start();

//to distinguish the base url with local and live we are going to write a condition 

 if ($_SERVER['HTTP_HOST'] == 'localhost')
 {
define ("BASE_URL" , "http://localhost/LMS_Backend/LMS-BACKEND/");
define ("DIR_URL" , $_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/");
 
define("SERVER_NAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "lms");





}
else {
    define ("BASE_URL" , "https://localhost/LMS_Backend/LMS-BACKEND/");
define ("DIR_URL" , $_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/");


define("SERVER_NAME", "");
define("USERNAME", "");
define("PASSWORD", "");
define("DATABASE", "");
}

?>