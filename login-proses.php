<?php
include 'koneksi_database.php';
if (isset($_POST['login'])) {
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'");
	if (mysqli_num_rows($query) > 0) {
		$_SESSION['status'] = "login";
		$_SESSION['nama'] = $nama;
		$_SESSION['username'] = $username;
    	header("location:index.php");
	}else{
		$message = "Username atau Password Salah !.\\nCoba Login Kembali !.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}else{
	echo "404 NOT FOUND";
}
?>