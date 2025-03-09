<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 


include_once ( "../config/config.php");
include_once (DIR_URL.  "config/database.php");
include_once ( "include/middleware.php");
include_once (DIR_URL.  "models/loan.php");
// get loans  
$loans = getloans($conn);
if (!isset ($loans->num_rows)){
  $_SESSION ['error'] = "Error:  " . $conn->error;
}

//  delete students 
if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $del = deleteloans($conn,$_GET['id']);
    if($del){
      $_SESSION['success'] = "book loan   has been deleted successfully";
    }
    else {
      $_SESSION['error'] = "Something went wrong";
    }
    header ("LOCATION: " . BASE_URL . "loans");
    
     
}


//  Status students 
if (isset($_GET['action']) && $_GET['action'] == 'status'){
  $update = updateLoanStatus($conn,$_GET['id'] ,  $_GET['status']);
  if($update){
    if ($_GET['status'] == 1 )
    $msg = "book has been returned  successfully ";
  else 
   $msg = "book has not been  successfully ";
    $_SESSION['success'] = $msg;

  }
  else {
    $_SESSION['error'] = "Something went wrong";
  }
  header("Location: " . BASE_URL . "loans");

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
        <h4 class="fw-bold text-uppercase ">Manage  Books loan</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            All students
          </div>
          <div class="card-body">
            <table id="example"  class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Name </th>
                    <th scope="col">Student Name </th>
                    <th scope="col">Loan date</th>
                    <th scope="col">Return date </th>
                    <th scope="col">Status</th>
                    <th scope="col">Created_At</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if ($loans ->num_rows>0){
                        $i=1;
                        while($rows=$loans ->fetch_assoc()){
                        ?>

                    
<tr>
    <th scope="row"><?php echo $i++; ?></th>
    <td><?php echo $rows['book_title']; ?></td>
    <td><?php echo $rows['student_name']; ?></td>
    <td><?php echo date("d-m-Y ", strtotime($rows['loan_date']))?></td>
    <td><?php echo date("d-m-Y ", strtotime($rows['return_date']))?></td>
    <td>
      <?php 
        echo ($rows['is_return'] == 1) 
          ? '<span class="badge text-bg-success">Returned</span>' 
          : '<span class="badge text-bg-warning">Active</span>';
      ?>
    </td>
         <td><?php echo date("d-m-Y h:i A", strtotime($rows['created_at'])); ?></td>

    <!-- Combine all buttons inside ONE <td> -->
    <td>
        <a href="<?php echo BASE_URL ?>loans/edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary btn-sm">Edit</a>

        <a onclick="return confirm('Are you sure you want to delete this student?')" 
           href="<?php echo BASE_URL ?>loans?action=delete&id=<?php echo $rows['id']; ?>" 
           class="btn btn-danger btn-sm">Delete</a>

       <?php if ($rows['is_return'] == 0) { ?>  
        <a href="<?php echo BASE_URL ?>loans?action=status&id=<?php echo $rows['id']; ?>&status=1" 
           class="btn btn-success btn-sm">Mark as Returned</a>
    <?php } else { ?>
        <a href="<?php echo BASE_URL ?>loans?action=status&id=<?php echo $rows['id']; ?>&status=0" 
           class="btn btn-warning btn-sm">Mark as Active</a>
    <?php } ?>
        
        <?php } }?>
    </td>
</tr>   
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
 include_once (DIR_URL."include/footer.php");
?>