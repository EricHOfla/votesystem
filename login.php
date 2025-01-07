<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = md5($_POST['password']);  // Hash password with MD5

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter' AND password = '$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID or incorrect password';
		}
		else{
			$row = $query->fetch_assoc();
			$_SESSION['voter'] = $row['id'];
		}
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: index.php');

?>
