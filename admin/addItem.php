<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$iname = $_POST['iname'];
$idesc = $_POST['idesc'];
$iprice = $_POST['iprice'];
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$availability = $_POST['availability'];
$popularity = $_POST['popularity'];
$itype = $_POST['itype'];
$age_limit = $_POST['age_limit'];
if($itype=="Coffee"){
    $que="INSERT INTO `coffeemenu`(`item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`) VALUES ('$iname','$idesc','$filename','$availability','$iprice','$popularity','$itype')";
}
elseif($itype=="Meals"){
    $que="INSERT INTO `mealsmenu`(`item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`) VALUES ('$iname','$idesc','$filename','$availability','$iprice','$popularity','$itype')";
}
elseif($itype=="Drinks"){
    $que="INSERT INTO `drinksmenu`(`item_name`, `item_description`, `item_image`, `availability`, `item_price`, `popularity`, `item_type`, `age_limit`) VALUES ('$iname','$idesc','$filename','$availability','$iprice','$popularity','$itype','$age_limit')";
}

if (isset($_POST['addItem'])) {

    $folder = "../img/menuItems/".$filename;
	// Get all the submitted data from the form
	mysqli_query($con, $que);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder))  {
		header('location:addItem.html');
	}
}
?>