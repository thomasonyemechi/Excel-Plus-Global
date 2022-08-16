<?php
session_start(); ob_start();
require_once('includes/headerquery.php');
$signup = $_SESSION['signup']??0;

@$ref = (isset($_GET['ref'])) ? sqLx('user', 'user', $_GET['ref'], 'sn') : '';

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Signup</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
							<?php if(isset($report)){ $pro->Alert();} ?>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="signin.php">Sign in here</a>
										</p>
									</div>
									
									</div>
									<div class="form-body">
										<form method="post" class="row g-3">
											<?php if($signup==0){ ?>
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text" class="form-control" id="inputFirstName" placeholder="John" name="firstname" required>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="inputLastName" placeholder="Doe" name="lastname" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Gender</label>
												<select name="sex" class="form-control" id="inputEmailAddress"  required>
													<option value=""></option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Phone Number</label>
												<input type="number" name="phone" class="form-control" id="inputEmailAddress" placeholder="234 803 534 8734" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" required>
											</div>
											<div class="col-12">
												<label for="username" class="form-label">Username</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="funname" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent" required><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Referral Id</label>
												<input type="text" name="ref" class="form-control" id="inputSelectCountry" placeholder="2134" value="<?= $ref ?>">
													
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#">Terms</a> & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="StartSignup"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										<?php }else{ ?>
											<div class="col-12 "><center>
												<label for="inputSelectCountry" class="form-label">Activation Cost</label>
												<h3>50 USD (400 GHS)</h3></center>
											</div>
											
											<div class="col-12">
											    
											    	<label for="inputSelectCountry" class="form-label">Registration PIN</label>
												<input type="text" name="pin" class="form-control" id="inputSelectCountry" placeholder="Enter PIN" ><br>
											    
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="PayWithPin"><i class='bx bx-user'></i>Pay with PIN</button>
												</div>
											</div>
											         <center><h3>OR</h3></center>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="finishSignUp"><i class='bx bx-user'></i>Pay Securely with Flutterwave</button>
												</div>
											</div>
											
										<?php }  ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>