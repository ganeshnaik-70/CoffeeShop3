<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$que="SELECT * FROM `baristas`";
$result = mysqli_query($con, $que);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Page
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper " style="background-color:#815316;">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo" style="background-color:#777777;">
        <a href="#" class="simple-text logo-mini">
        </a>
        <a href="#" class="simple-text logo-normal">
        </a>
      </div>
      <div class="sidebar-wrapper" style="background-color:#777777;">
        <ul class="nav">
          <li>
            <a href="./addItem.html" style="background-color:#86ff90;">
              <i class="nc-icon nc-settings text-dark"></i>
              <p class="text-dark">Add New Item</p>
            </a>
          </li>
          <li>
            <a href="./updateCoffee.php" style="background-color:#86ff90;">
              <i class="nc-icon nc-settings text-dark"></i>
              <p class="text-dark">Coffee Menu Update</p>
            </a>
          </li>
          <li>
            <a href="./updateMeals.php" style="background-color:#86ff90;">
              <i class="nc-icon nc-settings text-dark"></i>
              <p class="text-dark">Meals Menu Update</p>
            </a>
          </li>
          <li>
            <a href="./updateDrinks.php" style="background-color:#86ff90;">
              <i class="nc-icon nc-settings text-dark"></i>
              <p class="text-dark">Drinks Menu Update</p>
            </a>
          </li>
          <li>
            <a href="./manageTables.php" style="background-color:#86ff90;">
              <i class="nc-icon nc-tile-56 text-dark"></i>
              <p class="text-dark">Manage Tables</p>
            </a>
          </li>
          <li>
            <a href="./addBarista.html" style="background-color:#86ff90;">
              <i class="nc-icon nc-badge text-dark"></i>
              <p class="text-dark">Add New Baristas</p>
            </a>
          </li>
          <li class="active">
            <a href="./viewDetails.php" style="background-color:#86ff90;">
              <i class="nc-icon nc-bell-55 text-dark"></i>
              <p class="text-dark">Baristas Details</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="background-color:#815316;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid col-md-8 ml-1" style="background-color:#86ff90;">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">View Batista Details</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="background-color:#815316;">
        <div class="row">
          <div class="col-md-8" style="background-color:#815316;">
            <div class="card card-upgrade" style="background-color:#86ff90;">
              <div class="card-body">
                <div class="table-responsive table-upgrade">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Postal code</th>
                        <th>About</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($rows = mysqli_fetch_assoc($result))
                      {
                    ?>
                        <tr>
                          <td><?php echo $rows['fname']; ?></td>
                          <td><?php echo $rows['lname']; ?></td>
                          <td><?php echo $rows['email']; ?></td>
                          <td><?php echo $rows['phone']; ?></td>
                          <td><?php echo $rows['address']; ?></td>
                          <td><?php echo $rows['city']; ?></td>
                          <td><?php echo $rows['country']; ?></td>
                          <td><?php echo $rows['postal_code']; ?></td>
                          <td><?php echo $rows['about']; ?></td>
                        </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>