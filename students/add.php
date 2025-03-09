<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "../config/config.php");
include_once (DIR_URL.  "config/database.php");
include_once ( "include/middleware.php");
include_once (DIR_URL.  "models/student.php");


//add submit functionality
if (isset($_POST['submit'])){
    $res = create($conn,$_POST);  //book.php
    if (isset($res['success'])){
        $_SESSION['success'] = "Student has been created successfully.";
        header("LOCATION:". BASE_URL. "students");
        exit;
    }
    else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION:". BASE_URL. "students/add.php");
        exit;
    }
    }

?>
<?php

include_once (DIR_URL.  "include/header.php");
include_once (DIR_URL.  "include/topbar.php");
include_once (DIR_URL.  "include/sidebar.php");



?>

    
  
<!-- main dashboard starts  -->

<!-- main dashboard starts  -->

<main class="mt-1 pt-3 ">
  <div class="container-fluid">
    <div class="row dashboard-count">
      <div class="col-md-12">
      <?php include_once (DIR_URL.  "include/alerts.php"); ?>
        <h4 class="fw-bold text-uppercase ">Add Students</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method ="post" action="<?php echo BASE_URL?>students/add.php" >
            <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Phone No.</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="phone_no">
                  </div>
                </div>
             
                 <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                  </div>
                 </div>
              
               
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
                  <button type="submit" class="btn btn-secondary">Cancel</button>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- main dashboard stops -->
<!-- main dashboard stops -->


<?php
 include_once (DIR_URL."include/footer.php")

?>