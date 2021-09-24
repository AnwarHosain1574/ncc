<?php
	session_start();
	require 'db/connection.php';
	$header = "NCC";//IT/";
	
	$sdate = date("Y-m-d");
	$middle = date("/ymd/");

	$departmentname = $_SESSION['dept'];
	$query = "SELECT lastserial from details where sdate = '$sdate' AND fromdept = '$departmentname'";
	$res = mysqli_query($conn, $query);
	$laststring = '';
	while ($row = mysqli_fetch_array($res)) {
			$laststring = $row[0];
	}
	if (empty($laststring)) {
		$laststring = 0;
	}

	$querydept = "SELECT * FROM department";
	$res = mysqli_query($conn, $querydept);
	$dropdown = '';
	while ($row = mysqli_fetch_array($res)) {
		$dept = $row["deptshortname"];
		$dropdown .= '<option value="'.$dept.'">'.$row["departmentname"].'</option>';
	}
	$querydept = "SELECT * FROM doctype";
	$res = mysqli_query($conn, $querydept);
	$lettertype = '';
	while ($row = mysqli_fetch_array($res)) {
		$dept = $row["doctype"];
		$lettertype .= '<option value="'.$dept.'">'.$dept.'</option>';
	}

	$laststring++;
	$_SESSION['lastnumber'] = $laststring;
	$reffnumber = $header.$departmentname.$middle.$laststring;
	$_SESSION['reffnumber'] = $reffnumber;

?>
<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />
		<title>NCC Bank</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/style.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $("select.lettertype").change(function(){
        var selecttype = $(this).children("option:selected").val();
        var left = 'Letter';
        if ($(this).children("option:selected").val() == left) {
        	$( "#deptto" ).css( "visibility", "visible" );
        	$( "#deptto" ).css( "display", "block" );
      	} else{
        	$( "#deptto" ).css( "visibility", "hidden" );
        	$( "#deptto" ).css( "display", "none" );      		
      	}
    });
});
</script>

	</head>
	<body>

		<div class="container">
			<header class="header">
				<div class="row gutters">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
						<a href="index.php" class="logo">NCC Bank</a>
					</div>
				</div>
			</header>



		<div class="main-container">
				<div class="page-title">

					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="daterange-container">
								<?php 

								$power = $_SESSION['power'];

								if ($power == 'admin') {
								?>
								<a href="addemp.php" class="btn btn-secondary btn-rounded">Add Employee</a><br>
								<?php }
								?>
							</div>
								<a href="logout.php" class="btn btn-info btn-rounded">Logout</a>
						</div>
					</div>

				</div>
				<div class="content-wrapper">
					<div class="row gutters">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<form action="lettercheck.php" method="post">
								<div class="card">
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label class="card-title">letter Type</label>
											<select class="form-control lettertype" name="lettertype" id="lettertype" required>
												<option>Select Document Type</option>
												<?php echo "$lettertype"; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label class="card-title">Subject</label>
											<input type="text" class="form-control" name="subject" placeholder="Name" required>
										</div>
									</div>
								</div>

								<div class="card-body deptto" id="deptto" style="visibility: hidden; display: none;">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label class="card-title">To</label>
											<select class="form-control" name="todept" required>
												<option value="Null">Select Department</option>
												<?php echo "$dropdown"; ?>
											</select>
										</div>
									</div>
								</div>

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Letter Body</div>
								</div>
								<div class="card-body">

									<div class="form-group">
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="letter" ></textarea>
									</div>
									
								</div>
							</div>
						</div>
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<input type="submit" class="btn btn-danger btn-rounded" name="save" value="Submit">
										</div>
									</div>
								</div>

								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">Reference Number: </label>
											<input class="btn-secondary btn-rounded" id="reff" style="padding-left: 5px" disabled type="text" name="fdate" value="<?php echo "$reffnumber"; ?>"/>
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="vendor/daterange/daterange.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>