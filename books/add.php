<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "../config/config.php");
include_once (DIR_URL.  "config/database.php");
include_once (DIR_URL.  "include/middleware.php");
include_once (DIR_URL.  "models/book.php");


if (isset($_POST['publish'])){
    $res = storeBook($conn,$_POST);  //book.php
    if (isset($res['success'])){
        $_SESSION['success'] = "Book has been created successfully.";
        header("LOCATION:". BASE_URL. "books");
        exit;
    }
    else {
      $_SESSION['error'] = $res['error'];
      header("LOCATION:". BASE_URL. "books/add.php");
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
        <h4 class="fw-bold text-uppercase ">Add Book</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method ="post" action="<?php echo BASE_URL?>books/add.php" >
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Name</label>
                    <input type="text" name ="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ISBN Number of Book</label>
                    <input type="text" name="ISBN" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pulisher Year</label>
                    <input type="number"  name="publication_year" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                </div>
             
                 <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author Name</label>
                    <input type="text"  name ="author" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                 </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Category</label>
                    <?php
                     $cats = getCategories($conn);
                    ?>
                    <select name = "category_id" class="form-control" required>
                      <option value ="">Please select</option>
                      <?php while ($row = $cats->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>
                                 <?php } ?>


                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <button name="publish" type="submit" class="btn btn-success">Publish</button>
                  <button type="submit" class="btn btn-secondary">Cancel</button>
                </div>

                
                
              
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