<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$order_no = $_POST['order_no'];
$totalamt = $_POST['totalamt'];
$mode = $_POST['mode'];
$quantity = $_POST['quantity'];
$table_no = $_POST['table_no'];
$que="INSERT INTO `payments`(`order_no`, `amount`, `payment_mode`, `Payment_status`) VALUES ('$order_no','$totalamt','$mode','pending')";

if (isset($_POST['submitpay'])) {
	$result = mysqli_query($con, $que);
	header('location:../index.html');
}

?>