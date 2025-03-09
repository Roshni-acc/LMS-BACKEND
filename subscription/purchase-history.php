<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once ( "include/middleware.php");
include_once(DIR_URL . "models/subscription.php");

// Create Subscription functionality 
if (isset($_POST['submit'])) {

    //Create 
    
        $res = createsubs($conn, $_POST);
        if (isset($res['success'])) {
            $_SESSION['success'] = "subscription  has been created successfully";
            header("LOCATION: " . BASE_URL . "subscription/purchase-history.php");
            exit;
        } else {
            $_SESSION['error'] = $res['error'];
            header("LOCATION: " . BASE_URL . "subscription/purchase-history.php");
            exit;
        }
    } 


## getPurchaseHistory
$from =  " ";
if(isset($_GET['from'])){
    $from = $_GET['from'];
}
$to = " ";
if(isset($_GET['to'])){
    $from = $_GET['to'];
}


$history = getPurchaseHistory($conn , $from , $to);
if (!isset($history->num_rows)) {
    $_SESSION['error'] = "Error: " . $conn->error;
}





include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");


?>
<!--Main content start-->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <!--Cards-->
        <div class="row dashboard-counts">
            <div class="col-md-12">
                <?php include_once(DIR_URL . "include/alerts.php"); ?>
                <h4 class="fw-bold text-uppercase">Purchase History
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
                                                        Create Subscription
                                                                                                </button>
                </h4>
            </div>

            <div class="col-md-12">
        <div class="card">
          <div class="card-header">
           Purchase History
          </div>

          <div class="card-body">
          <form method ="get">
            <table class="table" id ="example">
                <div class = "row mb-3">
                    <div class = "col-md-12">
                <h3 class = "fw-bold text-uppercase">SEARCH</h3>
                 </div>
                  <!-- Flexbox for horizontal alignment -->
                      
                  
                      <div class="col-md-3">
                        <label for="fromDate" class="form-label">From</label>
                        <input type="date" class="form-control" id="fromDate"  name="from" value="<?php echo $from ?>">
                      </div>
                  
                      <div class="col-md-3">
                        <label for="toDate" class="form-label">To</label>
                        <input type="date" class="form-control" id="toDate" name="to" value="<?php echo $to ?>">
                      </div >
                        <div class="col-md-3">
                      <button type = "submit" name="search" class = "btn btn-primary btn-sm" style="margin-top:35px"> Search</button>
                        </div>
                  </div>
                 </form>
                    </div>
                  </div>
                  
                  

                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>

                  </tr>
                </thead>
                <tbody>

                <?php
                    
                    if ($history->num_rows>0){
                        $i=1;
                        while($rows=$history ->fetch_assoc()){
                        ?>

                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $rows['student_name']?></td>
                    <td>
                    <span  class="badge text-bg-info me-1 "> <?php echo $rows['plan_name']?></span>
                        <i class = "fa-solid fa-indian-rupee-sign"></i>
                        <?php  echo $rows['amount']?>
                    </td>
                    <td><?php echo date("d-m-y" , strtotime( $rows['start_date']))?></td>
                    <td><?php echo date("d-m-y" , strtotime( $rows['end_date']))?></td>
                    <td>
                        <?php
                         $today = date("Y-m-d");
                         if($rows['end_date'] >= $today)
                         echo ' <span  class="badge text-bg-success">Active</span>';
                        else
                        echo ' <span  class="badge text-bg-danger">Expire</span>'; 
                        ?>
                        
                       
                    </td>
                  </tr>
                  <?php
                  }}
                  ?>
                  
                  
                 
                </tbody>
              </table>
          </div>
        </div>
      </div>
        </div>
    </div>
</main>
<!--Main content end-->

<!-- // modal conntent -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Subscription</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method ="post" action="<?php echo BASE_URL?>subscription/purchase-history.php" >
            <div class="row">  
                      <div class="col-md-12">
                        <div class="mb-3">
                          <label for="book" class="form-label" name = "book_id">Select PLans</label>
                          <?php
                     $cats = getActivePlans($conn);
                    ?>
                    <select name = "plan_id" class="form-control" required>
                      <option value ="">Please select Plans </option>
                      <?php while ($row = $cats->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                 <?php } ?>


                    </select>
                        </div>
                      </div>
                  
                      <div class="col-md-12">
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

<?php include_once(DIR_URL . "include/footer.php") ?>