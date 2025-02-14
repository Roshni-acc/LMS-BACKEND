<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 


include_once ( "../config/config.php");
include_once (DIR_URL.  "config/database.php");
include_once (DIR_URL.  "models/book.php");
// get books 
$books = getallBooks($conn);
if (!isset ($books->num_rows)){
  $_SESSION ['error'] = "Error:  " . $conn->error;
}

//  delete books 
if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $del = deleteBooks($conn,$_GET['id']);
    if($del){
      $_SESSION['success'] = "Book has been deleted successfully";
    }
    else {
      $_SESSION['error'] = "Something went wrong";
    }
    header ("LOCATION" . BASE_URL . "books");
    
     
}


//  status books 
if (isset($_GET['action']) && $_GET['action'] == 'status'){
  $update = updateBooksStatus($conn,$_GET['id'] ,  $_GET['status']);
  if($update){
    if ($_GET['status'] == 1 )
    $msg = "Books has been activated successfully ";
  else 
   $msg = "Books has been deactivated successfully ";
    $_SESSION['success'] = $msg;

  }
  else {
    $_SESSION['error'] = "Something went wrong";
  }
  header ("LOCATION" . BASE_URL . "books");
  
   
}
include_once (DIR_URL.  "include/header.php");
include_once (DIR_URL.  "include/topbar.php");
include_once (DIR_URL.  "include/sidebar.php");

?>


    
  
<!-- main dashboard starts  -->

<!-- main dashboard starts  -->

<main class="mt-5 pt-3 ">
  <div class="container-fluid">
    <div class="row dashboard-count">
      <div class="col-md-12">
        <?php include_once (DIR_URL.  "include/alerts.php"); ?>
        <h4 class="fw-bold text-uppercase ">Manage Books</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            All Books
          </div>
          <div class="card-body">
            <table id="example"  class="table">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Book Name</th>
                    <th scope="col">Publication year</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">ISBN No.</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created_At</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if ($books->num_rows>0){
                        $i=1;
                        while($rows=$books->fetch_assoc()){
                        ?>

                    
                  <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $rows['title']?></td>
                    <td><?php echo$rows['publication_year']?> </td>
                    <td><?php echo$rows['author']?></td>
                    <td><?php echo$rows['ISBN']?></td>
                    <td><?php echo $rows ['cat_name']?></td>
                    <td>
                      <?php 
                       if ($rows['status' ]== 1 )
                       echo '<span class = "badge text-bg-success">Active</span>';
                      else  echo '<span class = "badge text-bg-danger">Inactive</span>';
                      
                      ?>
                    
                    
                    </td>

                    <td><?php echo date ("d-m-Y  h:i  A", strtotime($rows ['created_at']))?></td>
                    <td><a href ="<?php echo BASE_URL ?>books/edit.php?id=<?php echo $rows ['id']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href ="<?php echo BASE_URL ?>books?action=delete&id=<?php echo $rows ['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    <?php if($rows ['status'] == 1  ) { ?>
                    <td><a href ="<?php echo BASE_URL ?>books?action=status&id=<?php echo $rows ['id']; ?>&status=0" class="btn btn-warning btn-sm">Deactive </a></td>
                    <?php } ?>

                    <?php if($rows ['status'] == 0  ) { ?>
                    <td><a href ="<?php echo BASE_URL ?>books?action=status&id=<?php echo $rows ['id']; ?>&status=1" class="btn btn-success btn-sm">Active </a></td>
                    <?php } ?>
                  </tr>
                  <?php }}
                  ?>
                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>Indian Art And Culture </td>
                    <td>JNK Publisher </td>
                    <td>Jai Sharma</td>
                    <td>12334455</td>
                    <td><a href ="#" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href ="#" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr> -->
                
                </tbody>
              </table>
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