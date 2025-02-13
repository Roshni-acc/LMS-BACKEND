<?php

// $base_url ="http://localhost/LMS_Backend/LMS-BACKEND/";
// $dir_url =$_SERVER['DOCUMENT_ROOT'] ."/LMS_Backend/LMS-BACKEND/";
// do not exit it will not reload the page 

include_once ( "../config/config.php");
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
        <h4 class="fw-bold text-uppercase ">Manage Books</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            All Books
          </div>
          <div class="card-body">
            <table class="table">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Book Name</th>
                    <th scope="col">Preparing for </th>
                    <th scope="col">Author Name</th>
                    <th scope="col">ISBN No.</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Indian Art And Culture </td>
                    <td>JNK Publisher </td>
                    <td>Jai Sharma</td>
                    <td>12334455</td>
                    <td><a href ="#" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href ="#" class="btn btn-danger btn-sm">Delete</a></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Indian Art And Culture </td>
                    <td>JNK Publisher </td>
                    <td>Jai Sharma</td>
                    <td>12334455</td>
                    <td><a href ="#" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href ="#" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Indian Art And Culture </td>
                    <td>JNK Publisher </td>
                    <td>Jai Sharma</td>
                    <td>12334455</td>
                    <td><a href ="#" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href ="#" class="btn btn-danger btn-sm">Delete</a></td>
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
 include_once (DIR_URL."include/footer.php")

?>