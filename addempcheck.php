<?php
	session_start();
	require 'db/connection.php';
	if(isset($_POST["save"]))
{
		$name = $_POST['name'];
		$email = $_POST['username'];
		$deptname = $_POST['deptname'];
		$power = $_POST['power'];
		$password = $_POST['password'];

		$querydept = "INSERT into employee(empname, empusername, password, dept, power) values('$name','$email','$password','$deptname','$power')";
		mysqli_query($conn, $querydept);
    $message = 'Insertion Success';
    echo "$message";
		echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"http://localhost/ncc/addemp.php\");
    </SCRIPT>";
    mysqli_close();
}
?>