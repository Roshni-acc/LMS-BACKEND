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

<main class="mt-1 pt-3 ">
  <div class="container-fluid">
    <div class="row dashboard-count">
      <div class="col-md-12">
        <h4 class="fw-bold text-uppercase ">Add Book</h4>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Fill the form
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ISBN Number of Book</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pulisher Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
             
                 <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                 </div>
              
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Category/Course</label>
                    <select class="form-control">
                      <option value ="">Please select</option>
                      <option value ="">GATE</option>
                      <option value ="">SSC</option>
                      <option value ="">UPSC</option>
                      <option value ="">JEE</option>
                      <option value ="">NEET</option>
                      <option value ="">JEE Advanced</option>
                      <option value ="">WBJEE</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success">Publish</button>
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