<?php
	include("config.php");
	session_start();
	$price = 0;
	if(isset($_POST['submit'])){//to run PHP script on submit
		if(!empty($_POST['check_list'])){
			// Loop to store and display values of individual checked checkbox.
			foreach($_POST['check_list'] as $selected){
				$q = "SELECT * FROM food WHERE fid = '$selected'";
				$r = $db->query($q);
				$row = $r->fetch_assoc();
				$price = $price+$row["price"];
				

			}
		}
		$orderid = "#".rand(1000000,9999999); 
		$email = $_SESSION['email'];
		$qr ="INSERT INTO ordering (email , orderid , bill ) VALUES('$email','$orderid','$price')";
    	$ru = $db->query($qr);
    	// echo "string";
    	header("location: menu.php");
	}

?>