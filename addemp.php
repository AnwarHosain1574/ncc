<?php
	session_start();
	require 'db/connection.php';

	$departmentname = $_SESSION['dept'];
	$querydept = "SELECT * FROM department";
	$res = mysqli_query($conn, $querydept);
	$dropdown = '';
	while ($row = mysqli_fetch_array($res)) {
		$deptshortname = $row["deptshortname"];
		$dropdown .= '<option value="'.$deptshortname.'">'.$row["departmentname"].'</option>';
	}

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

	</head>
	<body>

		<div class="container">
			<header class="header">
				<div class="row gutters">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
						<a href="home.php" class="logo">NCC Bank</a>
					</div>
				</div>
			</header>



		<div class="main-container">

				<div class="content-wrapper">
					<div class="row gutters">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- <form action="addempcheck.php" method="post"> -->
								<form action="addempcheck.php" method="post">
								<div class="card">
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">Employee Name</label>
											<input type="text" class="form-control" name="name" placeholder="Full Name" >
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">UserName</label>
											<input type="text" class="form-control" name="username" placeholder="UserName" >
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">Department</label>
											<select class="form-control action" name="deptname" id="deptname" required>
												<option>Select Department</option>
												<?php echo "$dropdown"; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">Power</label>
											<select class="form-control action" name="power" id="deptfrom">
												<option value="none">Select Power</option>
												<option value="admin">Admin</option>
												<option value="none">None</option>
											</select>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
										<div class="form-group">
											<label for="inputName">Password</label>
											<input type="password" class="form-control" name="password">
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