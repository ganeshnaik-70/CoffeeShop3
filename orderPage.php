<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$quet="SELECT * FROM `tables`";
$resultt = mysqli_query($con, $quet);
$cus_id="";
$cus_type="";
$que="SELECT * FROM `coffeemenu`";
$result = mysqli_query($con, $que);
if (isset($_POST['order'])) {
    $item_no = $_POST['item_no'];
    $dbs = $_POST['database'];
    $que="SELECT * FROM $dbs WHERE `item_no`='$item_no'";
    $result = mysqli_query($con, $que);
}
/*if (isset($_POST['check'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $quec="SELECT `cus_id` , `cus_type` FROM `customer` WHERE `fname`='$username' AND `password`='$password'";
    $resultc = mysqli_query($con, $quec);
    $rowsc = mysqli_fetch_assoc($resultc);
    $cus_id=$rowsc['cus_id'];
    $cus_type=$rowsc['cus_type'];
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Item</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--My css-->
    <link rel="stylesheet" type="text/css" href="css/orderPage.css">
</head>
<body>
    <div class="container mt-5 pt-3 pb-5">
        <h2>Order Items</h2><hr>
        <div class="content">
            <?php
                while($rows = mysqli_fetch_assoc($result))
                {
            ?>
            <div class="image">
                <img class="item-image" src="img/menuItems/<?php echo $rows['item_image']; ?>" alt="Coffee item">
            </div>
            <div class="details">
                <h3>Item Name: <?php echo $rows['item_name']; ?></h3><hr>
                <h5 class="availability"
                    <?php 
                    if($rows['availability']=='available'){
                        ?>style="color:rgb(99, 255, 67);"
                    <?php
                    }
                    else{
                    ?>style="color:red;"
                    <?php
                    }?>>Status: <?php echo $rows['availability']; ?></h5>
                <h5 id="price">price: <?php echo $rows['item_price']; ?> $</h5>
                <form action="payment.php" method="POST">
                    <h5>Quantity: <input type="number" name="quantity" class="" id="quantity" value="1" min="1" onkeyup="trackChange(this.value)"></h5>
                    <h5 id="total">Total: <?php echo $rows['item_price']; ?> $</h5>
                    <input style="display:none;" class="dropdown-item" type="text" name="totalamt" id="totalbox" value="<?php echo $rows['item_price']; ?>">
                    <div class="dropdown">
                        <h5 class="input-box my-0">Select Table:
                        <select class="input-box" name="table_no" id="type">
                            <?php
                            while($rowst = mysqli_fetch_assoc($resultt))
                            {
                                if($rowst['availability']=='Unoccupied'){
                            ?>
                                <option value="<?php echo $rowst['table_no'];?>"><?php echo $rowst['table_no'];?>-<?php echo $rowst['table_type'];?></option>
                            <?php
                                }
                            }
                            ?>
                        </select></h5>
                    </div>
                    <?php
                        if($rows['item_type']=='Coffee'){
                    ?>   
                        <h5>Select Your Pass</h5>
                        <select name="ctype" id="type" style="width: 350px;height:40px;">
                            <option value="VIP">VIP</option>
                            <option value="Regular">Regular</option>
                        </select>
                    <?php
                        }
                    ?>
                    <input style="display:none;" class="dropdown-item" type="text" name="item_no" value="<?php echo $rows['item_no']; ?>">
                    <input style="display:none;" class="dropdown-item" type="text" name="item_type" value="<?php echo $rows['item_type']; ?>">
                    <input type="submit" name="order" class="btn btn-success btn-sm" value="Order">
                </form>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction(index) {
            document.getElementById("myDropdown1").classList.remove('show');
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
        function trackChange(val){
            var b = parseInt(val)
            if(!isNaN(b)){
                var value=document.getElementById("price").innerHTML;
                console.log(value.slice(7,9));
                document.getElementById("total").innerHTML="Total: "+parseInt(value.slice(7,9))*b+" $";
                document.getElementById("totalbox").value=parseInt(value.slice(7,9))*b;
            }
        }
    </script>

    <!--Bootstrap and JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>