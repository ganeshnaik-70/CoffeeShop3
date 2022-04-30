<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$item_no = $_POST['item_no'];
$item_type = $_POST['item_type'];
$quantity = $_POST['quantity'];
$table_no = $_POST['table_no'];
$totalamt = $_POST['totalamt'];
$que="INSERT INTO `orders`(`item_no`, `item_type`, `quantity`, `total`, `table_no`,`status`) VALUES ('$item_no','$item_type','$quantity','$totalamt','$table_no','pending')";
$quet="UPDATE `tables` SET `availability`='Occupied' WHERE `table_no`='$table_no'";
$que_tno="SELECT `order_no` FROM `orders` WHERE `table_no`='$table_no'";
if (isset($_POST['order'])) {
	$result = mysqli_query($con, $que);
	$resultt = mysqli_query($con, $quet);
  $order_nos = mysqli_query($con, $que_tno);
  $rows = mysqli_fetch_assoc($order_nos);
  $order_no=$rows['order_no'];
}



?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  width: 70%;
  margin: auto;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  margin-top: 20px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
@media (max-width: 800px) {
  .container{
      width: 90%;
      margin: auto;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="php/takePayment.php">
        <input style="display:none;" type="text" id="order_no" name="order_no" value="<?php echo (isset($order_no))?$order_no:'';?>">
        <input style="display:none;" type="text" id="totalamt" name="totalamt" value="<?php echo (isset($totalamt))?$totalamt:'';?>">
        <div class="row">
          <div class="col-50">
            <h3>Select the mode of Payment</h3>
            <label for="name"><i class="fa fa-user"></i> Payment Mode</label>
            <select class="input-box" name="mode" id="type">
              <option value="cash">Cash</option>
              <option value="card">Card</option>
            </select>
            
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Month" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="yyyy" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="xxx" required>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="submitpay" value="Pay" class="btn">
      </form>
    </div>
  </div>
</div>

</body>
</html>
