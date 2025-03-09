<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


// function to log in 
function login($conn,$param)
{  
    extract($param);
     $sql = "SELECT * from users where email='$email'  ";
   $res = $conn->query($sql);
   
   if($res -> num_rows > 0){
    $user = mysqli_fetch_assoc($res);
    $hash = $user['password'];
  
    if (password_verify($password , $hash)){
        $result = array('status'=> true, 'user' => $user);
    } else{
        $result = array('status'=> false );
    } 
    
} else {
    $result = array ('status' => false );

}
return $result;

}



// function to forgot password 
// pizza123

function forgotPassword($conn, $param)
{
    extract($param);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $user = mysqli_fetch_assoc($res);
        $user_id = $user['id'];
        $datetime = date("Y-m-d H:i:s");

        // Generate OTP
        $otp = rand(1111, 9999);
        $message = "Please use this OTP <b>$otp</b> to reset your password.";

        // Load environment variables
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USER'];
            $mail->Password   = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT'];

            // Email settings
            $mail->setFrom($_ENV['SMTP_USER'], 'Library Management');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Forgot Password Request";
            $mail->Body    = $message;

            if ($mail->send()) {
                // Insert OTP into database
                $sql = "INSERT INTO reset_password (user_id, reset_code, created_at)
                        VALUES ($user_id, '$otp', '$datetime')";
                $conn->query($sql);
                return array('status' => true);
            } else {
                return array('status' => false, 'message' => 'Mail could not be sent.');
            }
        } catch (Exception $e) {
            return array('status' => false, 'message' => "Mail Error: {$mail->ErrorInfo}");
        }
    } else {
        return array('status' => false, 'message' => 'No email found.');
    }
}


function resetPassword($conn,$param){
    extract($param);
$sql= "select * from reset_password where reset_code = '$reset_code'";
$res = $conn->query($sql);
 if ($res->num_rows > 0 ){
    $code = mysqli_fetch_assoc($res);

    if ($password === $confirm_password){
      $hash = password_hash($password , PASSWORD_DEFAULT);

      $sql = "UPDATE users SET password = '$hash' WHERE id= " . $code['user_id'];
      $conn->query($sql);
     
      // to delete reset password 
      return array ('status' => true , "message" => "Password has been reset successfully");
      
      $sql = "DELETE  from reset_password where id = " . $code['id'];
      $conn->query($sql);


      return array ('status' => true , "message" => "Password has been reset successfully");
    }
    else {

        return  array ('status' => false , "message" => "Confirm Password doesn't match");
    }
}
    else{
        return array ('status' => false , "message" => "Invalid reset code ");
    }
 }


// change paassword who is already logged in 
 function changePassword($conn,$param){
   extract($param);
   $hash= $_SESSION['user']['password'];
   if (password_verify($current_pass, $hash)){
    if ($new_pass === $conf_pass){
        $hash = password_hash($new_pass , PASSWORD_DEFAULT);
    
        $sql = "UPDATE users SET password = '$hash' WHERE id= " . $_SESSION['user']['id'];
        $conn->query($sql);
       
        // to delete reset password 
        return array ('status' => true , "message" => "Password has been updated successfully");
      }
      else {
          return  array ('status' => false , "message" => "Confirm Password doesn't match");
      }
   }
   else {
  
    return array ('status'=> false, "message" => " invalid Current Password");
   }
    

 }
  
   
 

 function updateProfile($conn,$param){
    extract($param);
  // upload image 
    $uploadTo = "assets/uploads/";
    $allowedFileTypes = array ("jpg", "png" , "jpeg" , "gif");
    $fileName = $_FILES['profile_pic']['name'];
    $tempPath = $_FILES['profile_pic']['tmp_name'];

    $basename = basename($fileName);
    $originalPath = $uploadTo . $fileName;
    $fileType = pathinfo($originalPath, PATHINFO_EXTENSION);

    if (!empty($fileName)){
        if(in_array($fileType, $allowedFileTypes))
        {
           $upload = move_uploaded_file($tempPath , $originalPath) ;
        
        }
        else {
            return array ('status' => false  , "message" => "Invalid file format "); 
        }
    }

  //upload image stops 


    $user_id = $_SESSION['user']['id'];
    $datetime= date ("Y-m-d H:i:s");
    $sql = "UPDATE users SET name = '$name' ,email = '$email' ,phone_no = '$phone_no', updated_at= '$datetime' ";
    
    if(isset($upload)){

        $sql .= ",profile_pic = '$fileName'";
        $_SESSION['user']['profile_pic'] = $fileName;
    }
    
    $sql .= " WHERE id = $user_id " ;
     # Execute the query and return success/failure message
    $conn->query($sql);
    //update the User data 
     $_SESSION['user']['name'] = $name;
     $_SESSION['user']['email'] = $email;
     $_SESSION['user']['phone_no'] = $phone_no;
   
    // to delete reset password 
    return array ('status' => true , "message" => "Profile has been updated succesfully");

 
  }


?>