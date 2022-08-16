<?php
session_start(); ob_start();
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
		<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
		<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
		<!-- loader-->
		<link href="assets/css/pace.min.css" rel="stylesheet" />
		<script src="assets/js/pace.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="assets/css/app.css" rel="stylesheet">
		<link href="assets/css/icons.css" rel="stylesheet">
		<!-- Theme Style CSS -->
		<link rel="stylesheet" href="assets/css/dark-theme.css" />
		<link rel="stylesheet" href="assets/css/semi-dark.css" />
		<link rel="stylesheet" href="assets/css/header-colors.css" />
		<title>User Profile</title>
	</head>

	<body>
		<!--wrapper-->
		<div class="wrapper">

			<?php include('nav.php') ?>
			<!--start page wrapper -->
			<div class="page-wrapper">
				<div class="page-content">
					<div class="page-breadcrumb d-none d-sm-flex mb-3">
						<div class="breadcrumb-title pe-3">Profile</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">User Profile</li>
								</ol>
							</nav>
						</div>

						<div class="ms-auto">
							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalPass">Change Password</button>
								<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Update Bank Account</a>
									<a class="dropdown-item" href="javascript:;" 
									data-bs-toggle="modal" data-bs-target="#myModal">Update Photograph</a>

									<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Update Profile Data</a>
								</div>
							</div>
						</div>
					</div>					



					<div class="row">
						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-column align-items-center text-center">

										<?php if(is_null(userName($uid,'photo'))){ ?>
											<img src="assets/images/avatars/avatar-2.png" alt="User" class="rounded-circle p-1 bg-primary" width="110"> <?php } else{ ?>
												<img src="uploads/<?php echo userName($uid,'photo') ?>" alt="User" class="rounded-circle p-1 bg-primary" width="110"> <?php } ?>

												<div class="mt-3">
													<h4><?= userName($uid) ?></h4>
													<h5 class="text-muted font-size-sm">[<?= userName($uid,"user") ?>]</h5>
													<p class="text-secondary mb-1"><?= $pro->stageTitle($stage) ?> Member</p>
													<p class="text-muted font-size-sm"><?= userName($uid,"address").", ".userName($uid,"country") ?></p>

													<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updatephoto">Update Photograph</button>
												</div>
											</div>

										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<form method="post">
										<div class="card">
											<div class="card-header">
												<h5>ACCOUNT DATA</h5>
											</div>
											<div class="card-body">
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Firstname</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input disabled type="text" class="form-control" value="<?= userName($uid,"firstname") ?>" />
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Lastname</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input disabled type="text" class="form-control" value="<?= userName($uid,"lastname") ?>" />
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Email</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input disabled type="text" class="form-control" value="<?= userName($uid,"email") ?>" />
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Phone Number</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input disabled type="text" class="form-control" value="<?= userName($uid,"phone") ?>" />
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Address</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input type="text" name="address" class="form-control" value="<?= userName($uid,"address") ?>" />
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-3">
														<h6 class="mb-0">Country</h6>
													</div>
													<div class="col-sm-9 text-secondary">
														<input name="country" type="text" class="form-control" value="<?= userName($uid,"country") ?>" />
													</div>
												</div>
											</div>
											<div class="card-footer">
												
												<div class="row">
													<div class="col-sm-3"></div>
													<div class="col-sm-9 text-secondary">
														<input type="submit" class="btn btn-primary px-4" name="UpdateAddress" value="Save Changes" />  
													</div>
												</div>
											</div>
										</div>

										




										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-header">
														<h5>LOCAL BANK ACCOUNT DETAILS</h5>
													</div>
													<div class="card-body">
														<div class="row mb-3">
															<div class="col-sm-3">
																<h6 class="mb-0">Account Name</h6>
															</div>
															<div class="col-sm-9 text-secondary">
																<input type="text" class="form-control" name="accname" value="<?= userName($uid,"accname") ?>" />
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-sm-3">
																<h6 class="mb-0">Bank Name</h6>
															</div>
															<div class="col-sm-9 text-secondary">
																<input type="text" class="form-control" name="bank" value="<?= userName($uid,"bank") ?>" />
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-sm-3">
																<h6 class="mb-0">Account Number</h6>
															</div>
															<div class="col-sm-9 text-secondary">
																<input type="text" class="form-control" name="accountno" value="<?= userName($uid,"accountno") ?>" />
															</div>
														</div>
													</div>
													<div class="card-footer">

														<div class="row">
															<div class="col-sm-3"></div>
															<div class="col-sm-9 text-secondary">
																<input type="submit" class="btn btn-primary px-4" name="UpdateBank" value="Save Changes" />
															</div>
														</div>
													</div>
												</div>

											</div>
										</div> 





										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-header">
														<h5>USDT WALLET DETAILS</h5>
													</div>
													<div class="card-body">
														<div class="row mb-3">
															<div class="col-sm-3">
																<h6 class="mb-0">USDT Wallet Address</h6>
															</div>
															<div class="col-sm-9 text-secondary">
																<input type="text" class="form-control" name="accname"  />
															</div>
														</div>
													</div>
													<div class="card-footer">

														<div class="row">
															<div class="col-sm-3"></div>
															<div class="col-sm-9 text-secondary">
																<input type="submit" class="btn btn-primary px-4" name="UpdateWalletAddress" value="Save Changes" />
															</div>
														</div>
													</div>
												</div>

											</div>
										</div> 


									</form>
										<form method="POST">
											<div class="row">
												<div class="col-sm-12">
													<div class="card">
														<div class="card-header">
															<h5>CHANGE PASSWORD</h5>
														</div>
														<div class="card-body">
															<div class="row mb-3">
																<div class="col-sm-3">
																	<h6 class="mb-0">Old Password</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																	<input type="text" class="form-control" name="pass" value="" />
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-sm-3">
																	<h6 class="mb-0">New Password</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																	<input type="text" class="form-control" name="pass1" value="" />
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-sm-3">
																	<h6 class="mb-0">Confirm Password</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																	<input type="text" class="form-control" name="pass2" value="" />
																</div>
															</div>
														</div>
														<div class="card-footer">

															<div class="row">
																<div class="col-sm-3"></div>
																<div class="col-sm-9 text-secondary">
																	<input type="submit" class="btn btn-primary px-4" name="UpdateUserPass" value="Change Password" />
																</div>
															</div>
														</div>
													</div>

												</div>
											</div> </form>
										</div>
									</div>
								</div>
							</div>
							<!--end page wrapper -->
							<?php include('foot.php') ?>

						</div>
						<!--end wrapper-->

						<!-- Modal -->	

						<form method="POST" enctype="multipart/form-data">
							<div class="modal" id="updatephoto">
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Modal Header -->
										<div class="modal-header">
											<h5 class="modal-title">Upload Picture</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<!-- Modal body -->
										<div class="modal-body">
											<center><img src="uploads/<?php echo userName($uid,'photo') ?>" width="200" alt="Profile Photo" ></center><br>
											<label>Upload Passport Size Photograph</label>
											<input type="file" name="photo" class="form-control center" required> 
										</div>
										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="submit" name="UpdateUserPicture" class="btn btn-primary">Upload Picture</button>
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<form method="POST" enctype="multipart/form-data">
							<div class="modal" id="myModalPass">
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Modal Header -->
										<div class="modal-header">
											<h5 class="modal-title">Change Account Password</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<!-- Modal body -->
										<div class="modal-body">
											<label>Old Password</label>
											<input type="password" name="pass" class="form-control"  required> 
											<label>New User Password</label>
											<input type="password" name="pass1" class="form-control"  required> 
											<label>Confirm New Password</label>
											<input type="password" name="pass2" class="form-control"  required> 
										</div>
										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="submit" name="UpdateUserPass" class="btn btn-primary">Change Password</button>
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</form>


						<form method="post">
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Withdraw Funds to Bank Account</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">

											<div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2"><div class="d-flex align-items-center"><div class="font-35 text-primary"><i class="bx bxs-message-square-x"></i></div><div class="ms-3"><h6 class="mb-0 text-primary">NOTICE</h6><div>You can withdraw funds after 48 hours of joining EPG | <?php $join = (time()-strtotime(userName($uid,'created')))/(60*60); echo ceil(48-$join) ?> Hours Left</div></div></div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>

										</div>
										<div class="modal-footer">
											<a href="" class="btn btn-secondary">Reset</a>
											<!-- <span id="reset"><button onclick="verifyUser(document.getElementById('rec').value)" type="button" class="btn btn-primary">Confirm Recipient</button></span> -->
										</div>
									</div>
								</div>
							</div>
						</form>

						<!-- Bootstrap JS -->
						<script src="assets/js/bootstrap.bundle.min.js"></script>
						<!--plugins-->
						<script src="assets/js/jquery.min.js"></script>
						<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
						<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
						<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
						<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
						<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
						<script src="assets/plugins/highcharts/js/highcharts.js"></script>
						<script src="assets/plugins/highcharts/js/exporting.js"></script>
						<script src="assets/plugins/highcharts/js/variable-pie.js"></script>
						<script src="assets/plugins/highcharts/js/export-data.js"></script>
						<script src="assets/plugins/highcharts/js/accessibility.js"></script>
						<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
						<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
						<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

						<script src="assets/js/index2.js"></script>
						<!--app JS-->
						<script src="assets/js/app.js"></script>
						<script>

						</script>
					</body>

					</html>