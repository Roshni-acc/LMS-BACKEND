<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "../config/config.php");
include_once (DIR_URL.  "config/database.php");
include_once (DIR_URL.  "models/loan.php");


//add  functionality
if (isset($_POST['submit'])){
    $res = create($conn,$_POST);  //book.php
    if (isset($res['success'])){
        $_SESSION['success'] = "Book loan has been created successfully.";
        header("LOCATION:". BASE_URL. "loans");
        exit;
    }
    else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION:". BASE_URL. "loans/add.php");
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
        <h4 class="fw-bold text-uppercase ">Add Loans</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method ="post" action="<?php echo BASE_URL?>loans/add.php" >
            <div class="row">  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="book" class="form-label" name = "book_id">Select Book</label>
                          <?php
                     $cats = getBooks($conn);
                    ?>
                    <select name = "book_id" class="form-control" required>
                      <option value ="">Please select</option>
                      <?php while ($row = $cats->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                 <?php } ?>


                    </select>
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="student" class="form-label" name="student_id">Select Student</label>
                          <?php
                     $cats = getStudents($conn);
                    ?>
                    <select name = "student_id" class="form-control" required>
                      <option value ="">Please select</option>
                      <?php while ($row = $cats->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>
                                 <?php } ?>

                    </select>
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="startDate" class="form-label">Loan Date</label>
                          <input type="date" class="form-control" id="startDate" name="loan_date" required >
                        </div>
                      </div>
                  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="endDate" class="form-label">Due Date</label>
                          <input type="date" class="form-control" id="endDate"name="return_date">
                        </div>
                      </div>
                  
                      <div class="col-md-12">
                        <button type="submit"  name="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                      </div>
                    </div>
            </form>
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