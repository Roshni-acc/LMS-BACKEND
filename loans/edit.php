
<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once("../config/config.php");
include_once(DIR_URL .  "config/database.php");
include_once(DIR_URL .  "models/loan.php");



// update book functionality 
if (isset($_POST['submit'])) {
  $res = updateLoan($conn, $_POST);  //edit.php
  if (isset($res['success'])) {
    $_SESSION['success'] = "Book loan  has been updated successfully.";
    header("LOCATION:" . BASE_URL . "loans");
  } else {
    $_SESSION['error'] =  $res['error'] ;
    header("LOCATION:" . BASE_URL . "loans/edit.php");
    exit;
  }
}
// read get param to get book data to edit
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $loans = getLoanId($conn, $_GET['id']);
  if ($loans->num_rows > 0) {
    $loans = mysqli_fetch_assoc($loans);
  }
} else {
  header("LOCATION: " . BASE_URL . "loans");
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
        <h4 class="fw-bold text-uppercase ">Edit Loan</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo BASE_URL ?>loans/edit.php">
              <input type="hidden" name="id" value="<?php echo $loans['id'] ?>" />
              <div class="row">  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="book" class="form-label" name = "book_id">Select Book</label>
                          <?php
                    
                    ?>
                    <select name = "book_id" class="form-control" required>
                      <option value ="">Please select</option>
                      <?php
                       $cats = getBooks($conn);
                      while ($rows = $cats->fetch_assoc()) {
                        $selected = ($rows['id'] == $loans['book_id']) ? "selected" : "";
                      ?>
                        <option value="<?php echo $rows['id']; ?>" <?php echo $selected; ?>>
                          <?php echo $rows['title']; }?>


                    </select>
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="student" class="form-label" name="student_id">Select Student</label>
                          <?php
                     
                    ?>
                    <select name = "student_id" class="form-control" required>
                    <?php
                     $cats = getStudents($conn);
                      while ($rows = $cats->fetch_assoc()) {
                        $selected = ($rows['id'] == $loans['student_id']) ? "selected" : "";
                      ?>
                        <option value="<?php echo $rows['id']; ?>" <?php echo $selected; ?>>
                          <?php echo $rows['Name']; }?>
                    </select>
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="startDate" class="form-label">Loan Date</label>
                          <input type="date" class="form-control" id="startDate" name="loan_date" required value="<?php echo $loans['loan_date']?>" >
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="endDate" class="form-label">Due Date</label>
                          <input type="date" class="form-control" id="endDate"name="return_date" required value="<?php echo $loans['return_date']?>" >
                        </div>
                      </div>
                  
                      <div class="col-md-12">
                        <button type="submit"  name="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                      </div>
                    </div>
            </form>
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
