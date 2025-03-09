<?php

include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/login.php");


if(isset($_SESSION['is_user_login'])) {
  header("Location: " . BASE_URL . 'index.php');
  exit;

} 


// Forgot password functionality
if (isset($_POST['submit'])) {
  $res = forgotPassword($conn, $_POST);
  if ($res['status'] == true) {
      //$_SESSION['success'] = "Reset password code has been sent on email";
      header("LOCATION: " . BASE_URL . 'reset-password-link.php');
      exit;
  } else {
      $_SESSION['error'] = "No email found";
      header("LOCATION: " . BASE_URL . 'forgot-password.php');
      exit;
  }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./assets/css/style.css" />
    <title>Dashboard</title>
</head>
<script src="./assets/Js/518e5b18ce.js" crossorigin="anonymous"></script>

<body style = "background-color: #212529;">
    <div class="container vh-100 d-flex align-items-center justify-content-center ">
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="card mb-5" style="max-width:900px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="./assets/images/2.jpg" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h1 class="card-title text-uppercase fw-bold">Roshni's Library</h5>
                          <p class="card-text">Enter email to reset password!</p>
                          <?php include_once (DIR_URL.  "include/alerts.php"); ?>
                          <form action="<?php echo  BASE_URL?>forgot-password.php"  method= "post">
                            <div class="mb-3">
                              <label  class="form-label">Email address</label>
                              <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                              
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                          </form>

                          <hr/>
                          <a href="./Login.php" class="link-offset-2 link-underline link-underline-opacity-0">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>



    

    <script src="./assets/Js/bundle.min.js"></script>
</body>
</html>