<?php
	if($_GET['action'] == 'login'){
		//echo 'Login Block';
		//Receive data
		
		//1. Always filter the incoming data
		
		$email = filter_var($_GET['eml'], FILTER_SANITIZE_EMAIL);
		
		$password = md5(filter_var($_GET['pw'], FILTER_SANITIZE_STRING));
		
		//Message digest 5 is a one way hashing algorithm
		
		//1.DB Connection Open
		$con = mysqli_connect('localhost','root','','ajax_db') or die('Unable to connect');
		
		//2.Build the query
		$sql = "SELECT * FROM users_tbl WHERE email='$email' AND password='$password'";
		
		//3.Execute the query
		$result = mysqli_query($con,$sql);
		
		$nor = mysqli_num_rows($result);
		
		/* if($nor == 0) {
			echo 'invalid';
		}else{
			echo 'valid';
		}*/
		
		echo ($nor == 0) ?'invalid':'valid';
		
		//5.DB Connection Close
		mysqli_close($con);
		
	}
	if($_GET['action'] == 'registration'){
		echo 'Registration Block';
	}
	

?>