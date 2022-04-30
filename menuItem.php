<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$quet="SELECT * FROM `tables`";
$resultt = mysqli_query($con, $quet);
$resultt1 = mysqli_query($con, $quet);

if (isset($_POST['coffee_menu'])) {
    $dbs='coffeemenu';
    $que="SELECT * FROM `coffeemenu`";
    $result = mysqli_query($con, $que);
}
elseif (isset($_POST['meals_menu'])) {
    $dbs='mealsmenu';
    $que="SELECT * FROM `mealsmenu`";
    $result = mysqli_query($con, $que);
}
elseif (isset($_POST['drinks_menu'])) {
    $dbs='drinksmenu';
    $que="SELECT * FROM `drinksmenu`";
    $result = mysqli_query($con, $que);
}
if(isset($_POST['Regular'])){
    $dbs = $_POST['database'];
    if($dbs=='coffeemenu'){
        $que="SELECT * FROM `coffeemenu`";
        $result = mysqli_query($con, $que);
    }
    if($dbs=='mealsmenu'){
        $que="SELECT * FROM `mealsmenu`";
        $result = mysqli_query($con, $que);
    }
    if($dbs=='drinksmenu'){
        $que="SELECT * FROM `drinksmenu`";
        $result = mysqli_query($con, $que);
    }
}
if(isset($_POST['Most_popular'])){
    $dbs = $_POST['database'];
    $que="SELECT * FROM $dbs ORDER BY popularity DESC";
    $result = mysqli_query($con, $que);
}
if(isset($_POST['Price_increase'])){
    $dbs = $_POST['database'];
    $que="SELECT * FROM $dbs ORDER BY item_price DESC";
    $result = mysqli_query($con, $que);
}
if(isset($_POST['Price_decrease'])){
    $dbs = $_POST['database'];
    $que="SELECT * FROM $dbs ORDER BY item_price ASC";
    $result = mysqli_query($con, $que);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Item</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--My css-->
    <link rel="stylesheet" type="text/css" href="css/menuItem.css">
    <link href="admin/menuItem.css" type="text/css" rel="stylesheet">
</head>
<body style="background-color: rgb(31, 29, 29)">
    <div class="container mt-3 top-bar px-5">
        <div class="dropdown">
            <button onclick="myFunction(1)" class="dropbtn">Available Tables</button>
            <div id="myDropdown1" class="dropdown-content">
                <h6 style="background-color: rgb(255, 217, 46);">Unoccupied</h6><hr>
                <?php
                    while($rowst = mysqli_fetch_assoc($resultt))
                    {
                        if($rowst['availability']=='Unoccupied'){
                ?>
                            <h6><?php echo $rowst['table_no'];?>-<?php echo $rowst['table_type'];?></h6><hr>
                <?php
                        }
                    }
                ?>
                <h6 style="background-color: rgb(255, 217, 46);">Occupied</h6><hr>
                <?php
                    while($rowst = mysqli_fetch_assoc($resultt1))
                    {
                        if($rowst['availability']=='Occupied'){
                ?>
                            <h6><?php echo $rowst['table_no'];?>-<?php echo $rowst['table_type'];?></h6><hr>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button onclick="myFunction(2)" class="dropbtn fa fa-filter"> Filters Menu</button>
            <div id="myDropdown2" class="dropdown-content">
                <form action="menuItem.php" method="POST">
                    <input style="display: none;" class="dropdown-item" type="text" name="database" value="<?php echo (isset($dbs))?$dbs:'';?>">
                    <input class="dropdown-item" type="submit" name="Regular" value="Regular">
                    <input class="dropdown-item" type="submit" name="Most_popular" value="Most popular">
                    <input class="dropdown-item" type="submit" name="Price_increase" value="Price increase">
                    <input class="dropdown-item" type="submit" name="Price_decrease" value="Price decrease">
                </form>
            </div>
        </div>
    </div>
    <div class="container main mt-3">
        <?php
            $i=0;
            while($rows = mysqli_fetch_assoc($result))
            {
                if($i==0){
        ?>
            <h1 style="color:white;"><?php echo $rows['item_type']; ?> Menu</h1>
            <?php
                $i=$i+1;
                }
            ?>
            <div class="menuItem" id="<?php echo $rows['item_no']; ?>">
                <img class="border" src="img/menuItems/<?php echo $rows['item_image']; ?>" alt="food image">
                <p class="item-description"><?php echo $rows['item_description']; ?></p>
                <h4><?php echo $rows['item_name']; ?></h4>
                <h6 class="availability"><?php echo $rows['availability']; ?></h6>
                <h6 class="price" style="display:inline-block;"><?php echo $rows['item_price']; ?>$</h6>
                <h6 class="price" style="display:inline-block;"><?php echo $rows['popularity']; ?><i class="fa fa-trophy"></i></h6>
                <?php
                    if($rows['item_type']=='Drinks'){
                ?>
                    <h6 class="price" style="display:inline-block;"><?php echo $rows['age_limit']; ?>+</h6>
                <?php
                    }
                ?>
                <div class="buttons">
                    <form action="orderPage.php" method="POST">
                        <input style="display: none;" class="btn btn-warning btn-sm" type="text" name="item_no" value="<?php echo $rows['item_no']; ?>">
                        <input style="display: none;" class="btn btn-warning btn-sm" type="text" name="database" value="<?php echo (isset($dbs))?$dbs:'';?>">
                        <input class="btn btn-primary" type="submit" name="order" value="Order Item">
                    </form>
                </div>

            </div>
        <?php
            }
        ?>
    </div>

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction(index) {
            document.getElementById("myDropdown1").classList.remove('show');
            document.getElementById("myDropdown2").classList.remove('show');
            document.getElementById("myDropdown"+index).classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }

    </script>
    <!--Bootstrap and JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>