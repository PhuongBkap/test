<?php 
include 'header.php';
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$check = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	if(mysqli_num_rows($check) == 1){
		$_SESSION['user'] = mysqli_fetch_assoc($check);
		header('location: check-out.php');
	}
	else{
		//báo lỗi
		echo "Tài khoản mk ko đúng";
	}

}


 ?>