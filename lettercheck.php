<?php
	session_start();
	require 'db/connection.php';
	if (isset($_POST['save'])) {
		$subject = $_POST['subject'];
		$fromdept = $_SESSION['dept'];
		$todept = $_POST['todept'];
		if ($todept == "Null") {
			$todept = $_SESSION['dept'];
		}
		$body = $_POST['letter'];
		$reffno = $_SESSION['reffnumber'];
		$lettertype = $_POST['lettertype'];
		$sdate = date("Y-m-d");
		$lastserial = $_SESSION['lastnumber'];
		echo "<pre>";
		print_r($_POST);
		print_r($_SESSION);
		$quuery = "INSERT into details(subjectt, fromdept, todept, body, reffno, lettertype, sdate, lastserial) values('$subject', '$fromdept', '$todept', '$body', '$reffno', '$lettertype' ,'$sdate', '$lastserial')";
		$res = mysqli_query($conn, $quuery);
		if ($res) {
    $message = 'Letter Submitted';
			echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace(\"http://localhost/ncc/home.php\");
    </SCRIPT>";
    mysqli_close($conn);
		}
		else{
			echo "not success";
		}
	}
?>