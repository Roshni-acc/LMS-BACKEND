 <!-- off canvas left side bar  -->
   
  
 <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
             <div class = "text-secondary small text-uppercase fw-bold">Core </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-gauge me-1"></i>Dashboard</a>
              </li>
              <li class="nav-item my-0">
                <hr/>
               </li>
           
               <li class="nav-item">
                <div class = "text-secondary small text-uppercase fw-bold">Inventory </div>
               </li>
            <li class="nav-item ">
                <a class="nav-link sidebar-link " data-bs-toggle="collapse" href="#booksmgmt" role="button" aria-expanded="false" aria-controls="booksmgmt">
                    <i class="fa-solid fa-book " me-1></i> Books Management
                    <span class ="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
                  </a>
                  <div class="collapse" id="booksmgmt">
                    <div>
                        <ul class="navbar-nav ps-3 ">
                      <li>
                        <a href = "<?php echo BASE_URL?>books/add.php" class ="nav-link"><i class="fa-solid fa-plus me-2 "></i>Add New </a>
                      </li>
                      <li>
                        <a href = "<?php echo BASE_URL?>books/" class ="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All </a>
                      </li>

                        </ul>
                     
                    </div>
                  </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link sidebar-link " data-bs-toggle="collapse" href="#studentmgmt" role="button" aria-expanded="false" aria-controls="studentmgmt">
                    <i class="fa-solid fa-users " me-1></i> Students
                    <span class ="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
                  </a>
                  <div class="collapse" id="studentmgmt">
                    <div>
                        <ul class="navbar-nav ps-3 ">
                      <li>
                        <a href = "./add-student.html" class ="nav-link"><i class="fa-solid fa-plus me-2 "></i>Add New </a>
                      </li>
                      <li>
                        <a href = "./manage-students.html" class ="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All </a>
                      </li>

                        </ul>
                     
                    </div>
                  </div>
            </li>


            <li class="nav-item my-0">
                <hr/>
               </li>
               <li class="nav-item">
                <div class = "text-secondary small text-uppercase fw-bold">Business </div>
               </li>
               <li class="nav-item ">
                <a class="nav-link sidebar-link " data-bs-toggle="collapse" href="#booksloanmg" role="button" aria-expanded="false" aria-controls="booksloanmg">
                    <i class="fa-solid fa-address-book me-2"></i> Books Loan
                    <span class ="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
                  </a>
                  <div class="collapse" id="booksloanmg">
                    <div>
                        <ul class="navbar-nav ps-3 ">
                      <li>
                        <a href = "./add-loan.html" class ="nav-link"><i class="fa-solid fa-plus me-2 "></i>Add New </a>
                      </li>
                      <li>
                        <a href = "./manage-loan.html" class ="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All </a>
                      </li>

                        </ul>
                     
                    </div>
                  </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link sidebar-link " data-bs-toggle="collapse" href="#studentmgmt2" role="button" aria-expanded="false" aria-controls="studentmgmt2">
                    <i class="fa-solid fa-money-bill me-2"></i> Subscription
                    <span class ="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
                  </a>
                  <div class="collapse" id="studentmgmt2">
                    <div>
                        <ul class="navbar-nav ps-3 ">
                      <li>
                        <a href = "#" class ="nav-link"><i class="fa-solid fa-plus me-2 "></i>Plans </a>
                      </li>
                      <li>
                        <a href = "#" class ="nav-link"><i class="fa-solid fa-list me-2"></i>Purchase History </a>
                      </li>

                        </ul>
                     
                    </div>
                  </div>
            </li>
            <li class="nav-item my-0">
                <hr/>
               </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i></i>Logout</a>
              </li>

          </ul>
    </div>
  </div>

    <!-- off canvas left side bar  -->