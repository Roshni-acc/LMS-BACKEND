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
  $res = resetPassword($conn, $_POST);
  if ($res['status'] == true) {
      $_SESSION['success'] =  $res['message'];
      header("LOCATION: " . BASE_URL );
      exit;
  } else {
      $_SESSION['error'] = $res['message'];
      header("LOCATION: " . BASE_URL . 'reset-password-link.php');
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
                          <p class="card-text">Reset Password </p>
                          <?php include_once (DIR_URL.  "include/alerts.php"); ?>
                          <form action="./reset-password-link.php" method= "POST">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Reset Password Code </label>
                              <input type="text" class="form-control" name="reset_code">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Password </label>
                                <input type="password" class="form-control" name="password">
                              </div>

                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirm Password </label>
                                <input type="password" class="form-control" name="confirm_password">
                              </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    
</html>