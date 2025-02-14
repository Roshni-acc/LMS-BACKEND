<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once("../config/config.php");
include_once(DIR_URL .  "config/database.php");
include_once(DIR_URL .  "models/book.php");



// update book functionality 
if (isset($_POST['update'])) {
  $res = updateBook($conn, $_POST);  //book.php
  if (isset($res['success'])) {
    $_SESSION['success'] = "Book has been updated successfully.";
    header("LOCATION:" . BASE_URL . "books");
  } else {
    $_SESSION['error'] = is_array($res) && isset($res['error']) ? $res['error'] : "An unexpected error occurred.";
    header("LOCATION:" . BASE_URL . "books/edit.php");
    exit;
  }
}
// read get param to get book data to edit
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $books = getBooksById($conn, $_GET['id']);
  if ($books->num_rows > 0) {
    $books = mysqli_fetch_assoc($books);
  }
} else {
  header("LOCATION: " . BASE_URL . "books");
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
        <h4 class="fw-bold text-uppercase ">Edit Book</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo BASE_URL ?>books/edit.php">
              <input type="text" name="id" value="<?php echo $books['id'] ?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Name</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $books['title'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ISBN Number of Book</label>
                    <input type="text" name="ISBN" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['ISBN'] ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pulisher Year</label>
                    <input type="number" name="publication_year" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['publication_year'] ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author Name</label>
                    <input type="text" name="author" class="form-control" id="exampleInputPassword1" required value="<?php echo $books['author'] ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Category</label>
                    <?php
                    $cats = getCategories($conn);
                    ?>
                    <select name="category_id" class="form-control" required>
                      <option value="">Please select</option>
                      <?php
                      $cats = getCategories($conn);
                      while ($rows = $cats->fetch_assoc()) {
                        $selected = ($rows['id'] == $books['category_id']) ? "selected" : "";
                      ?>
                        <option value="<?php echo $rows['id']; ?>" <?php echo $selected; ?>>
                          <?php echo $rows['Name']; ?>
                        </option>
                      <?php } ?>
                    </select>

                  </div>
                </div>
                <div class="col-md-12">
                  <button name="update" type="submit" class="btn btn-success">Update</button>
                  <a href="<?php echo BASE_URL ?>books" class="btn btn-secondary">Back</a>
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
include_once(DIR_URL . "include/footer.php")

?>