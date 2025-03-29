<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// DIR_URL =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "config/config.php");
include_once ( "config/database.php");  // contant variables are defined here 
include_once ( "include/middleware.php");
include_once ( "config/config.php");

// session_destroy();



include_once (DIR_URL.  "config/database.php");
include_once (DIR_URL.  "models/dashboard.php");
include_once (DIR_URL.  "include/header.php");
include_once (DIR_URL.  "include/sidebar.php");




$counts = getCounts($conn);
$tabs = getTabData($conn);



?>

<!--navbar start  -->
<style>
  .navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #343a40; /* Ensure background color remains */
}

  </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
        <div class="container-fluid">
            <!-- offcanvas trigger start -->
              <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
              </button>
               <!-- offcanvas trigger stop -->
          <a class="navbar-brand text-uppercase fw-bold text-uppercase me-auto" href="#">Roshni's Library</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto " role="search">
                <div class="input-group my-3 mg-lg-0 ">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2"  onkeyup="searchFunction()" >
                    <button class="btn btn-outline-secondary btn-primary text-white" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
            </form>
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">

                <?php if ($_SESSION['user']['profile_pic']) { ?>
                                            <img src="
                                                    <?php echo BASE_URL . 'assets/uploads/' . $_SESSION['user']['profile_pic'] ?>" class="user-icon" />
                                        <?php } else { ?>
                                            <img src="
                                                    <?php echo BASE_URL . 'assets/images/roshpic.jpg' ?>" class="user-icon" />
                                        <?php } ?>
                    <?php echo $_SESSION['user']['name']?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="<?php echo BASE_URL?>my-profile.php">My Profile </a></li>
                  <li><a class="dropdown-item" href="<?php echo BASE_URL?>my-profile.php">Change Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL?>logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
          </div>
        </div>
      </nav>
    <!-- navbar stop -->

    
  
<!-- main dashboard starts  -->

<main class="mt-1 pt-3 ">
  <div class="container-fluid">
    <div class="row dashboard-count">
      <div class="col-md-12">
        <h4 class="fw-bold text-uppercase ">Dashboard</h4>
        <p>Statistics of the system</p>
      </div>
      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Books</h5>
            <h1><?php echo $counts['total_books']?></h1>
            <a href="<?php echo BASE_URL?>books" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Students</h5>
            <h1><?php echo $counts['total_students']?></h1>
            <a href="<?php echo BASE_URL?>students" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Revenue</h5>
            <h1>&#8377; <?php echo number_format($counts['total_amount']) ?></h1>
            <a href="<?php echo BASE_URL?>subscription" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Books Loan</h5>
            <h1><?php echo $counts['total_loans']?></h1>
            <a href="<?php echo BASE_URL?>loans" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>


    </div>

<!-- tabs  -->
 <div class="row mt-5 dashboard-tabs">
  <div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">New Students</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Recent Loans</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Recent Subscription</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <table class="table" >
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone_no. </th>
            <th scope="col">Registered On</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
           foreach($tabs['students'] as $st){
               
          ?>
          <tr>
            <th scope="row"><?php echo $i++?></th>
            <td><?php echo $st['Name']?></td>
            <td><?php echo $st['phone_no']?></td>
            <td><?php echo date("d-m-Y H:i A" ,  strtotime($st['created_at']))?></td>
            <td>
      <?php 
        if ($st['Status'] == 1) 
               echo '<span class="badge text-bg-success">Active</span>' ;
          else echo '<span class="badge text-bg-danger">Inactive</span>';
      ?>
    </td>
          </tr>
        <?php
           }
           ?>
        </tbody>
      </table>
    </div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">  <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Book Name</th>
            <th scope="col">Student Name </th>
            <th scope="col">Loan Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Status</th>
          </tr>
         
        </thead>
        <tbody>
        <?php
          $i = 1;
           foreach($tabs['loans'] as $l){
               
          ?>
          <tr>
            <th scope="row"><?php echo $i++?></th>
            <td><?php echo $l['book_title']?></td>
            <td><?php echo $l['student_name']?></td>
            <td><?php echo date ("d-m-Y" , strtotime($l['loan_date'])) ?></td>
            <td><?php echo date ("d-m-Y" , strtotime($l['return_date'])) ?></td>
            <td>
      <?php 
        echo ($l['is_return'] == 1) 
          ? '<span class="badge text-bg-success">Returned</span>' 
          : '<span class="badge text-bg-warning">Active</span>';
      ?>
    </td>
            
          </tr>
        
          <?php 
          }
          ?>
        </tbody>
      </table></div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">  <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Plan Name</th>
            <th scope="col">Amount </th>
            <th scope="col">Start Date </th>
            <th scope="col">End  Date </th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $i = 1;
           foreach($tabs['subscription'] as $s){
               
          ?>
          <tr>
            <th scope="row"><?php echo $i++?></th>
            <td><?php echo $s['student_name']?></td>
            <td><?php echo $s['plan_name']?></td>
            <td><?php echo $s['amount']?></td>
            
                    <td><?php echo date("d-m-y" , strtotime( $s['start_date']))?></td>
                    <td><?php echo date("d-m-y" , strtotime( $s['end_date']))?></td>
                    <td>
                        <?php
                         $today = date("Y-m-d");
                         if($s['end_date'] >= $today)
                         echo ' <span  class="badge text-bg-success">Active</span>';
                        else
                        echo ' <span  class="badge text-bg-danger">Expire</span>'; 
                        ?>
                    </td>
            
          </tr>
          
          <?php 
          }
          ?>
        </tbody>
      </table></div>
    
    </div>

  </div>
 </div>


  </div>


</main>
<!-- main dashboard stops -->


<?php
 include_once (DIR_URL."include/footer.php")

?>

<script>
    function searchFunction() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let items = document.querySelectorAll("#searchResults li");

    items.forEach(item => {
        let text = item.textContent.toLowerCase();
        item.style.display = text.includes(input) ? "" : "none";
    });
}
</script>