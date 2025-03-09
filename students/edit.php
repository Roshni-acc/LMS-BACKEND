
<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once("../config/config.php");
include_once(DIR_URL .  "config/database.php");
include_once ( "include/middleware.php");
include_once(DIR_URL .  "models/student.php");



// update book functionality 
if (isset($_POST['submit'])) {
  $res = updateStudent($conn, $_POST);  //edit.php
  if (isset($res['success'])) {
    $_SESSION['success'] = "students data  has been updated successfully.";
    header("LOCATION:" . BASE_URL . "students");
  } else {
    $_SESSION['error'] =  $res['error'] ;
    header("LOCATION:" . BASE_URL . "students/edit.php");
    exit;
  }
}
// read get param to get book data to edit
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $students = getStudentById($conn, $_GET['id']);
  if ($students->num_rows > 0) {
    $students = mysqli_fetch_assoc($students);
  }
} else {
  header("LOCATION: " . BASE_URL . "students");
  exit;
}
?>
<?php
include_once(DIR_URL .  "include/header.php");
include_once(DIR_URL .  "include/topbar.php");
include_once(DIR_URL .  "include/sidebar.php");

?>

<!-- main dashboard starts  -->

<!-- main dashboard starts  -->

<main class="mt-1 pt-3 ">
  <div class="container-fluid">
    <div class="row dashboard-count">
      <div class="col-md-12">
        <?php include_once(DIR_URL .  "include/alerts.php"); ?>
        <h4 class="fw-bold text-uppercase ">Edit Student</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo BASE_URL ?>students/edit.php">
              <input type="hidden" name="id" value="<?php echo $students['id'] ?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Name"  value = "<?php echo $students['Name']?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email"  value = "<?php echo $students['email']?>">
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Phone No.</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="phone_no"  value = "<?php echo $students['phone_no']?>">
                  </div>
                </div>
             
                 <div class="col-md-6">
                  <div class="mb-3">
                    <label  class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address" value = "<?php echo $students['address']?>">
                  </div>
                 </div>
              
               
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
                  <a href="<?php echo BASE_URL ?>students"  class="btn btn-secondary">Cancel</a>
             </div>
            </form>
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
include_once(DIR_URL . "include/footer.php")

?>
