<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

if (isset($_POST['login'])) {
    $name = $_POST['logname'];
    $password = $_POST['logpass'];
    $date_time = date("Y-m-d h:i:sa");
    $que="INSERT INTO `login`(`name`, `time`) VALUES ('$name','$date_time')";

    $sql1="SELECT `fname`, `password` FROM `baristas` WHERE fname='$name' and password='$password'";
    $result3 = mysqli_query($con, $sql1);
    $rowsb = mysqli_fetch_assoc($result3);

    $sql="SELECT fname, password FROM `customer` WHERE fname='$name' and password='$password'";
    $result2 = mysqli_query($con, $sql);
    $rowsc = mysqli_fetch_assoc($result2);

    if($name == 'admin' and $password == 'ad123'){
		$result = mysqli_query($con, $que);
		header('location:../admin/addItem.html');
	}
	elseif($rowsb!=null) {
		$i=0;
		while($i==0)
		{
			$usern = $rowsb['fname'];
			$passd = $rowsb['password'];
			$i= $i+1;
		}
		if ($usern==$name and $passd==$password) {
			$result = mysqli_query($con, $que);
			header("location:../barista/orderTable.php");
		}
		else{
			?>
			<script>
				alert("Invalid username or password1");
			</script>
			<?php
		}
	}
	elseif($rowsc) {
		$i=0;
		while($i==0)
		{

			$usern = $rowsc['fname'];
			$passd = $rowsc['password'];
			$i= $i+1;
		}

		if ($usern==$name and $passd==$password) {
			$result = mysqli_query($con, $que);
			header("location:../index.html");
		}
		else{
			?>
			<script>
				alert("Invalid username or password");
			</script>
			<?php
		}
	}
	else{
		?>
		<script>
			alert("Invalid username or password");
		</script>
		<?php
	}
}
if (isset($_POST['signup'])) {
    echo "hello";
    $fname = $_POST['cfname'];
    $lname = $_POST['clname'];
    $email = $_POST['cemail'];
    $phone = $_POST['cphone'];
    $password = $_POST['cpassword'];
    $cus_type = $_POST['ctype'];
    $date_time = date("Y-m-d h:i:sa");
    $que1="INSERT INTO `customer`(`fname`, `lname`, `password`, `email`, `phone`, `cus_type`, `date_time`) VALUES ('$fname','$lname','$password','$email','$phone','$cus_type','$date_time')";
	$result = mysqli_query($con, $que1);
	header('location:../index.html');
}

?>