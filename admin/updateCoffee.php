<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$que="SELECT * FROM `coffeemenu`";
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
  <link href="../assets/demo/demo.css" rel="stylesheet"/> 
  <link href="../css/menuItem.css" type="text/css" rel="stylesheet">
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
          <li class="active">
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
          <li>
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
            <a class="navbar-brand" href="javascript:;">Update Coffee Menu</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="background-color:#815316;">
        <div class="row">
          <div class="col-md-8">
            <div class="card main" style="background-color:#815316;">
              <div class="container main mt-3" style="background-color:#86ff90;">
                <?php
                  while($rows = mysqli_fetch_assoc($result))
                  {
                ?>
                    <div class="menuItem" id="<?php echo $rows['item_no']; ?>">
                      <img class="border" src="../img/menuItems/<?php echo $rows['item_image']; ?>" alt="food image">
                      <p class="item-description"><?php echo $rows['item_description']; ?></p>
                      <h6><?php echo $rows['item_name']; ?></h6>
                      <h6 class="availability"><?php echo $rows['availability']; ?></h6>
                      <h6 class="price" style="display:inline-block;"><?php echo $rows['item_price']; ?>$</h6>
                      <h6 class="price" style="display:inline-block;"><?php echo $rows['popularity']; ?><i class="nc-icon nc-trophy"></i></h6>
                      <div class="buttons">
                          <a href="updateItem.html" name="order" class="btn btn-warning btn-sm">Update Item</a>
                          <form action="updateItem.php" method="POST">
                            <input type="text" name="hidden_ino" value="<?php echo $rows['item_no']; ?>" style="display:none;">
                            <input type="text" name="hidden_itype" value="<?php echo $rows['item_type']; ?>" style="display:none;">
                            <input type="submit" name="delete_item" class="btn btn-warning btn-sm" value="Delete Item">
                          </form>
                      </div>
                    </div>
                <?php
                  }
                ?>
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
  <script>
    $(document).ready(function() {
      demo.initGoogleMaps();
    });
  </script>
</body>

</html>