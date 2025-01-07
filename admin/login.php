<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);  // Hash password with MD5

		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username or incorrect password';
		}
		else{
			$row = $query->fetch_assoc();
			$_SESSION['admin'] = $row['id'];
		}
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>
