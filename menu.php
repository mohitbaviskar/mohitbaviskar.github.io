<?php
include_once ('root.php');
if(isset($_POST['insert'])){
  $dname=$_POST['dishname'];
  
  // selecting the dish whose details are to be updated

  $sql1="SELECT d_name FROM MENU WHERE d_name='$dname'";
  
  $result = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result) == 1){
    $dprice=$_POST['price'];
    
    // updating details of selected dish
    
    $sql2="UPDATE MENU SET d_price='$dprice' WHERE d_name='$dname'";
    
    $result1 = mysqli_query($link,$sql2);
  }
  else{
    $dprice=$_POST['price'];
    $dtype=$_POST['type'];
    $ddesc=$_POST['description'];
    
    // adding new dish

    $sql3="INSERT INTO MENU VALUES ('$dname', '$ddesc', '$dtype', '$dprice')";
    
    $result2 = mysqli_query($link,$sql3);
  }
}
?>


<?php
if(isset($_POST['delete'])){
  $dname=$_POST['Name'];
  
  // selecting the dish to be deleted 

  $sql1="SELECT d_name FROM MENU WHERE d_name='$dname'";
  
  $result = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result) == 1){
    
    // deleting the selected dish 
    
    $sql2="DELETE FROM MENU WHERE d_name='$dname'";
    
    $result1 = mysqli_query($link,$sql2);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <title>Shop Management System</title>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
        <!-- Nivo Lightbox -->
        <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css">
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <!--fa fa icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <li class="nav-item">
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
              <li class="nav-item active">
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
    <br /><br />
    <section class="section-padding">
        <div class="container">
            <div class="section-title-header text-center">
                <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">
                  Menu
                </h1>
            </div></br>
            <h1 style="font-size: 30px; text-align: center;">Enter new dish/Update old dish</h1>
            <form id='insert-form' action="" method="POST">
            <div class="row">
              <div class="col-2 col-md-1">
                <p style="font-size: 15px; padding-top: 13px;">Dish name:</p>
              </div>
              <div class="col-4 col-md-2" style="padding-top: 10px;">
                <input type="text" class="form-control" name="dishname"/>
              </div>
              <div class="col-2 col-md-1">
                <p style="font-size: 15px; padding-top: 13px;">Description:</p>
              </div>
              <div class="col-4 col-md-2" style="padding-top: 10px;">
                <input type="text" class="form-control" name="description"/>
              </div>
              <div class="col-1.5">
                <p style="font-size: 15px; padding-top: 13px;">Type:</p>
              </div>
              <div class="col-4 col-md-2" style="padding-top: 10px;">
                <input type="text" class="form-control" name="type"/>
              </div>
              <div class="col-1.5">
                <p style="font-size: 15px; padding-top: 13px;">Price:</p>
              </div>
              <div class="col-4 col-md-2" style="padding-top: 10px;">
                <input type="text" class="form-control" name="price"/>
              </div>
              <div class="col-4 col-md-5"></div>
              <div class="col-2 col-md-1" style="padding-left:25px">
                <button name="insert" type="submit" id="add" class="btn btn-common btn-nv-sty">
                  Add/Update
                </button>
              </div>
            </div>
            </form>
            <div class="container-fluid br-line"></div><br />
        </div>
        <h1 style="font-size: 30px; text-align: center;">Delete a dish from the Menu</h1>
        <div class="container">
        <form id='delete-form' action="" method="POST">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-4 col-md-2">
                    <p style="font-size: 15px; padding-top: 13px;">Dish name:</p>
                  </div>
                <div class="col-4 col-md-3" style="padding-top: 10px;">
                    <input type="text" class="form-control" name="Name"/>
                </div>
                <div class="col-1 col-md-1"></div>
                <div class="col-1 col-md-1">
                    <button name="delete" type="submit" id="delete" class="btn btn-common btn-nv-sty">
                        Delete
                      </button>
                </div>
            </div>
            </form>
            <div class="container-fluid br-line"></div><br />
        </div>
        <h1 style="font-size: 30px; text-align: center;">List of all dishes</h1><br />
        <div class="container">
          <table style="width: 100%;" id="menu" class="styled-table">
            <?php
                
                // selecting the details of dishes
                
                $sql2 = "SELECT * FROM menu";
                
                if($result = mysqli_query($link,$sql2)){
                    if(mysqli_num_rows($result) > 0){
            ?>
            <thead>
            <tr>
              <th>Dish name</th>
              <th>Description</th>
              <th>Type</th>
              <th>Price</th>
            </tr>
            </thead>
            <?php
                      while($row = mysqli_fetch_array($result)){
                        $dname = $row['d_name'];
                        $ddesc = $row['d_description'];
                        $dtype = $row['d_type'];
                        $dprice = $row['d_price'];
            ?>
            <tr>
              <td><?php echo $dname; ?></td>
              <td><?php echo $ddesc; ?></td>
              <td><?php echo $dtype; ?></td>
              <td><?php echo $dprice; ?></td>
            </tr>
            <?php
                        }
                    }
                }
            ?>
          </table>
          <div class="container-fluid br-line"></div>
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