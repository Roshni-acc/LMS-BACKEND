<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./assets/css/style.css" />
    <title>Dashboard</title>
</head>
<script src="./assets/Js/518e5b18ce.js" crossorigin="anonymous"></script>
<body>
    <!--navbar start  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
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
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary btn-primary text-white" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
            </form>
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src= ".\assets\images\roshpic.jpg" class= "user-icon" />
                    Admin
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">My Profile </a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                  </ul>
                </li>
              </ul>
          </div>
        </div>
      </nav>
    <!-- navbar stop -->
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
                        <a href = "./add-book.html" class ="nav-link"><i class="fa-solid fa-plus me-2 "></i>Add New </a>
                      </li>
                      <li>
                        <a href = "./manage-book.html" class ="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All </a>
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

    <script src="./assets/Js/bundle.min.js"></script>
</body>
</html>