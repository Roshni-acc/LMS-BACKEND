<?php
  

  

include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/login.php");


//login functionality
if (isset($_POST['submit'])) {
 $res = login($conn, $_POST);  
  // print_r ($res) ;
  // exit;
  if ($res['status'] === true) {
      $_SESSION['is_user_login'] = true;
      $_SESSION['user'] = $res['user'];
      header("Location: " . BASE_URL . 'index.php');
      exit;
  } else {
      $_SESSION['error'] = "Invalid login information";
       header("Location: " . BASE_URL . 'login.php');
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
                          <p class="card-text">Enter email and password to login!</p>
                          <?php include_once (DIR_URL.  "include/alerts.php"); ?>
                          <form action   method= "post">
                            <div class="mb-3">
                              <label  class="form-label">Email address</label>
                              <input type="email" class="form-control"  aria-describedby="emailHelp" name="email" required >
                              
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                          </form>

                          <hr/>
                          <a href="./forgot-password.php" class="link-offset-2 link-underline link-underline-opacity-0">Forgot Password?</a>
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