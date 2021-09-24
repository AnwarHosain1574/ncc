<?php
	session_start();
	require 'db/connection.php';
	if(isset($_POST["submit"]))
{
		$email = $_POST['username'];
		$password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE empusername='$email' and password='$password'";
		$result = mysqli_query($conn, $sql);
		
		$count = mysqli_num_rows($result);
		
		if ($count==1) {
			
			while ($user = mysqli_fetch_assoc($result)) {
					$_SESSION['username'] = $user['empusername'];
					$_SESSION['password'] = $user['password'];
					$_SESSION['dept'] = $user['dept'];
					$_SESSION['power'] = $user['power'];
			}
			header("location: home.php");
		}
		//If the username or password is wrong, you will receive this message below.
		else {
			header("location: index.php");
		}

}
?>