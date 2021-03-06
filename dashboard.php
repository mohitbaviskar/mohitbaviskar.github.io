<?php
include_once ('root.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Shop Management System</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css" />
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css" />
    <!-- Nivo Lightbox -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/nivo-lightbox.css"
    />
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
    <!--fa fa icon-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#main-navbar"
              aria-controls="main-navbar"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="new-user.php">Create new user</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="purchases.php">Purchases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ingredients.php">Ingredients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="suppliers.php">Suppliers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="staff.php">Staff details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="page-scroll" href="dashboard.php">Dashboard</a>
          </li>
          <li>
            <a class="page-scroll" href="new-user.php">Create new user</a>
          </li>
          <li>
            <a class="page-scroll" href="transactions.php">Transactions</a>
          </li>
          <li>
            <a class="page-scroll" href="purchases.php">Purchases</a>
          </li>
          <li>
            <a class="page-scroll" href="orders.php">Orders</a>
          </li>
          <li>
            <a class="page-scroll" href="ingredients.php">Ingredients</a>
          </li>
          <li>
            <a class="page-scroll" href="suppliers.php">Suppliers</a>
          </li>
          <li>
            <a class="page-scroll" href="menu.php">Menu</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
      <!-- Navbar End -->
    </header>

    <section id="dashboard" class="section section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <br />
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">
                DASHBOARD
              </h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"  style="margin-top: 25px;"></div>
          <div class="col-12 col-md-4" style="margin-top: 25px;">
            <div class="price-block-wrapper wow fadeInLeft height box-bkclr2" data-wow-delay="0.2s">
              <div class="title">
                <h5>Ingredients Running out!</h5>
              </div>
              <div class="p-prar">
                <ul style="list-style: disc; color: #5c5c5c;">
                <?php
                  
                  // selecting the ingredients which are about to run out of stock 

                  $sql="SELECT i_name,i_quantity FROM ingredients WHERE i_quantity < 10";
                  
                  $result = mysqli_query($link,$sql);
                  while($row=mysqli_fetch_array($result)){
                    $etype=$row['i_name'];
                    $count=$row['i_quantity'];
                ?>
                  <li style="text-align: left"><?php echo $etype;?> == <?php echo $count;?></li>
                <?php
                  }
                ?>
                </ul>               
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-12 col-md-4" style="margin-top: 25px">
            <div
              class="price-block-wrapper wow fadeInLeft height box-bkclr"
              data-wow-delay="0.2s"
            >
              <div class="title">
                <h5>TOTAL EARNINGS FROM ORDERS</h5>
              </div>
              <div class="p-prar">
              <?php
                $c = 0;
                
                // selecting total amount of payments received through orders 
                
                $sql = "SELECT sum(o_amount) AS value_sum FROM orders";
                
                $result=mysqli_query($link,$sql);
                if($result = mysqli_query($link,$sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      $c = $row['value_sum'];
                    }
                  }
                }
              ?>
                <p><?php echo $c; ?></p>                
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-12 col-md-4" style="margin-top: 25px">
            <div
              class="price-block-wrapper wow fadeInLeft height box-bkclr"
              data-wow-delay="0.2s"
            >
              <div class="title">
                <h5>TOTAL EXPENDITURE FROM PURCHASES</h5>
              </div>
              <div class="p-prar">
              <?php
                $c = 0;
                
                // selecting total amount of bills from purchases 

                $sql = "SELECT sum(p_amount) AS value_sum FROM purchase";
                
                $result=mysqli_query($link,$sql);
                if($result = mysqli_query($link,$sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      $c = $row['value_sum'];
                    }
                  }
                }
              ?>
                <p><?php echo $c; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-12 col-md-4" style="margin-top: 25px">
            <div
              class="price-block-wrapper wow fadeInLeft height box-bkclr"
              data-wow-delay="0.2s"
            >
              <div class="title">
                <h5>TOTAL NUMBER OF TRANSACTIONS</h5>
              </div>
              <div class="p-prar">
                <!-- <p>Sample text</p> -->
                <?php
                $c = 0;
                
                // finding total no. of transactions carried out in shop
                
                $sql = "SELECT * FROM transaction";
                
                $result=mysqli_query($link,$sql);
                $c = mysqli_num_rows($result);
              ?>
                <p><?php echo $c; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-12 col-md-4" style="margin-top: 25px">
            <div
              class="price-block-wrapper wow fadeInLeft height box-bkclr"
              data-wow-delay="0.2s"
            >
              <div class="title">
                <h5>CURRENT NUMBER OF EMPLOYEES</h5>
              </div>
              <div class="p-prar">
                <!-- <ul style="list-style: disc; color: #5c5c5c">
                  <li style="text-align: left">Cooks:</li>
                  <li style="text-align: left">Waiters:</li>
                  <li style="text-align: left">Cashiers:</li>
                  <li style="text-align: left">Cleaners:</li>
                  <li style="text-align: left">Maintenance people:</li>
                </ul> -->
                <ul>
                <?php
                  
                  // selecting type of employees and their count

                  $sql="SELECT designation,count(designation) AS count_val FROM staff_details GROUP BY designation";
                  $result = mysqli_query($link,$sql);
                  while($row=mysqli_fetch_array($result)){
                    $etype=$row['designation'];
                    $count=$row['count_val'];
                ?>
                  <li style="text-align: left"><?php echo $etype;?> => <?php echo $count;?></li>
                <?php
                  }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/nivo-lightbox.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
