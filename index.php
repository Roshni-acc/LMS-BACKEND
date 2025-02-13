<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// DIR_URL =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "config/config.php");
include_once ( "config/database.php");  // contant variables are defined here 
include_once (DIR_URL.  "include/header.php");
include_once (DIR_URL.  "include/topbar.php");
include_once (DIR_URL.  "include/sidebar.php");

?>



    
  
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
            <h1>130</h1>
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Students</h5>
            <h1>1200</h1>
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Revenue</h5>
            <h1>1,30,000</h1>
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" ;>
          <div class="card-body text-center">
            <h5 class="card-title text-uppercase ">Total Books Loan</h5>
            <h1>168</h1>
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">View More</a>
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
        <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Preparing for </th>
            <th scope="col">Registered On</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>MArk</td>
            <td>UPSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
            
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
        </tbody>
      </table></div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">  <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Book Name</th>
            <th scope="col">Loan date </th>
            <th scope="col">Due Date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>MArk</td>
            <td>UPSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
            
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
        </tbody>
      </table></div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">  <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Amount </th>
            <th scope="col">Start Date </th>
            <th scope="col">End  Date </th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>MArk</td>
            <td>UPSC</td>
            <td>10-01-25 12:30 PM</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
            
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>SSC</td>
            <td>10-01-25 12:30 PM</td>
            <td>10-01-25 12:30 PM</td>
            <td><span class="badge text-bg-success">Success</span></td>
          </tr>
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