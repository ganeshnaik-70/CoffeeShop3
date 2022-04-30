<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$name = $_POST['mname'];
$email = $_POST['memail'];
$phone = $_POST['mphone'];
$message = $_POST['message'];
$que="INSERT INTO `messages`(`name`, `email`, `phone`, `message`) VALUES ('$name','$email','$phone','$message')";

if (isset($_POST['sendMsg'])) {
	$result = mysqli_query($con, $que);
	header('location:../index.html');
}

?>