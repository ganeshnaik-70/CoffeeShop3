<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$ino = $_POST['ino'];
$iname = $_POST['iname'];
$idesc = $_POST['idesc'];
$iprice = $_POST['iprice'];
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$availability = $_POST['availability'];
$popularity = $_POST['popularity'];
$itype = $_POST['itype'];
if (isset($_POST['updateItem'])) {
    if($itype=="Coffee"){
        if($iname!=""){
            $que1="UPDATE `coffeemenu` SET `item_name`='$iname' WHERE `item_no`='$ino'";
            mysqli_query($con, $que1);
        }
        if($idesc!=""){
            $que2="UPDATE `coffeemenu` SET `item_description`='$idesc' WHERE `item_no`='$ino'";
            mysqli_query($con, $que2);
        }
        if($iprice!=""){
            $que3="UPDATE `coffeemenu` SET `item_price`='$iprice' WHERE `item_no`='$ino'";
            mysqli_query($con, $que3);
        }
        if($filename!=""){
            $folder = "../img/menuItems/".$filename;
            $que4="UPDATE `coffeemenu` SET `item_image`='$filename' WHERE `item_no`='$ino'";
            mysqli_query($con, $que4);
            move_uploaded_file($tempname, $folder);
        }
        if($availability!=""){
            $que5="UPDATE `coffeemenu` SET `availability`='$availability' WHERE `item_no`='$ino'";
            mysqli_query($con, $que5);
        }
        if($popularity!=""){
            $que6="UPDATE `coffeemenu` SET `popularity`='$popularity' WHERE `item_no`='$ino'";
            mysqli_query($con, $que6);
        }
        header('location:updateItem.html');
    }

    elseif($itype=="Drinks"){
        if($iname!=""){
            $que1="UPDATE `drinksmenu` SET `item_name`='$iname' WHERE `item_no`='$ino'";
            mysqli_query($con, $que1);
        }
        if($idesc!=""){
            $que2="UPDATE `drinksmenu` SET `item_description`='$idesc' WHERE `item_no`='$ino'";
            mysqli_query($con, $que2);
        }
        if($iprice!=""){
            $que3="UPDATE `drinksmenu` SET `item_price`='$iprice' WHERE `item_no`='$ino'";
            mysqli_query($con, $que3);
        }
        if($filename!=""){
            $folder = "../img/menuItems/".$filename;
            $que4="UPDATE `drinksmenu` SET `item_image`='$filename' WHERE `item_no`='$ino'";
            mysqli_query($con, $que4);
            move_uploaded_file($tempname, $folder);
        }
        if($availability!=""){
            $que5="UPDATE `drinksmenu` SET `availability`='$availability' WHERE `item_no`='$ino'";
            mysqli_query($con, $que5);
        }
        if($popularity!=""){
            $que6="UPDATE `drinksmenu` SET `popularity`='$popularity' WHERE `item_no`='$ino'";
            mysqli_query($con, $que6);
        }
        header('location:updateItem.html');
    }
    elseif($itype=="Meals"){
        if($iname!=""){
            $que1="UPDATE `mealsmenu` SET `item_name`='$iname' WHERE `item_no`='$ino'";
            mysqli_query($con, $que1);
        }
        if($idesc!=""){
            $que2="UPDATE `mealsmenu` SET `item_description`='$idesc' WHERE `item_no`='$ino'";
            mysqli_query($con, $que2);
        }
        if($iprice!=""){
            $que3="UPDATE `mealsmenu` SET `item_price`='$iprice' WHERE `item_no`='$ino'";
            mysqli_query($con, $que3);
        }
        if($filename!=""){
            $folder = "../img/menuItems/".$filename;
            $que4="UPDATE `mealsmenu` SET `item_image`='$filename' WHERE `item_no`='$ino'";
            mysqli_query($con, $que4);
            move_uploaded_file($tempname, $folder);
        }
        if($availability!=""){
            $que5="UPDATE `mealsmenu` SET `availability`='$availability' WHERE `item_no`='$ino'";
            mysqli_query($con, $que5);
        }
        if($popularity!=""){
            $que6="UPDATE `mealsmenu` SET `popularity`='$popularity' WHERE `item_no`='$ino'";
            mysqli_query($con, $que6);
        }
        header('location:updateItem.html');
    }
}
if (isset($_POST['delete_item'])) {
    $ino = $_POST['hidden_ino'];
    $itype = $_POST['hidden_itype'];
    if($itype=="Coffee"){
        $que6="DELETE FROM `coffeemenu` WHERE `item_no`='$ino'";
        mysqli_query($con, $que6);
        header('location:updateCoffee.php');
    }
    elseif($itype=="Meals"){
        $que6="DELETE FROM `mealsmenu` WHERE `item_no`='$ino'";
        mysqli_query($con, $que6);
        header('location:updateMeals.php');
    }
    if($itype=="Drinks"){
        $que6="DELETE FROM `drinksmenu` WHERE `item_no`='$ino'";
        mysqli_query($con, $que6);
        header('location:updateDrinks.php');
    }
}

if (isset($_POST['addBarista'])) {
    $fname = $_POST['bfname'];
    $lname = $_POST['blname'];
    $password = $_POST['bpassword'];
    $email = $_POST['bemail'];
    $phone = $_POST['bphone'];
    $address = $_POST['baddress'];
    $city = $_POST['bcity'];
    $country = $_POST['bcountry'];
    $postal_code = $_POST['bcode'];
    $about = $_POST['babout'];
    $qued="INSERT INTO `baristas` (`fname`, `lname`, `password`, `email`, `phone`, `address`, `city`, `country`, `postal_code`, `about`) VALUES ('$fname','$lname','$password','$email','$phone','$address','$city','$country','$postal_code','$about')" ;
    mysqli_query($con, $qued);
    header('location:addBarista.html');
}
if (isset($_POST['addTable'])) {
    $tableno = $_POST['tableno'];
    $availability = $_POST['availability'];
    $location = $_POST['location'];
    $no_of_seat = $_POST['no_of_seat'];
    $quet="INSERT INTO `tables`(`table_no`, `no_of_seat`, `availability`, `table_type`) VALUES ('$tableno','$no_of_seat','$availability','$location')" ;
    mysqli_query($con, $quet);
    header('location:manageTables.php');
}
?>