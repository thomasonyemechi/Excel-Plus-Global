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
	<title>Automated Registration</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		<?php include('nav.php') ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">REGISTRATION</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page" style="color:#0727d7">Automated Registration</li>
							</ol>
						</nav>
					</div>
				</div>					


				<div class="card">
					<div class="card-body">
						<div class="card-title"><div class="ms-auto" style="float: right;">


							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa2">REGISTER ACCOUNTS</button>
							</div>
						</div>
						<h5 class="mb-0">Automated Registrations</h5>

					</div>
					<hr/>

					<div class="table-responsive mt-3">
						<table id="example" class="table table-bordered table-striped table-sm">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Username</th>
									<th>ID</th>
									<th>Name</th>
									<th>Stage</th>
									<th>Stage Team</th>
									<th>PIN</th>
									<th>Date</th>

								</tr>
							</thead>
							<tbody>
								<?php $i=1; 
								$sql = $db->query("SELECT * FROM user WHERE sponsor='$uidx' ORDER BY sn DESC limit 100 "); 
								while($row = $sql->fetch_assoc()){ $e = $i++;

									?>
									<tr>
										<td><?php echo $e ?></td>
										<td><a href="geneology?user=<?= $row['sn'] ?>"><?php echo $row['user']; ?></a></td>
										<td><?php echo $row['sn']; ?></td>

										<td><?php echo userName($row['id']) ; ?></td> 

										<td><?php echo $pro->stageTitle($row['stage']) ; ?></td>
										<td><?php echo $pro->stageTeam($row['sn']) ; ?></td>
										<td><?php echo $row['pin'] ; ?></td>
										<td><?php echo date("d-M-Y H:i",strtotime($row['created'])) ?></td>
									</tr>
								<?php } ?>
							</tbody>

						</table>
					</div>
				</div><!--end row-->

			</div>
		</div>
		<!--end page wrapper -->
		<?php include('foot.php') ?>

	</div>
	<!--end wrapper-->

	<!-- Modal -->	<form method="post">
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Buy Registration PINs</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">


						ACCOUNT BALANCE: $<?= number_format($pro->wallet($uid),2) ?><br><br>

						<span id="veri">
							<label>Number of PINs</label>
						</span>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="buyEpins">BUY PIN</button>
					</div>
				</div>
			</div>
		</div>
	</form>



	<!-- Modal -->	<form method="post" id="formD">
		<div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Register Multiple Accounts</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<p>Automated Multiple Registrations allows you to register up to 1,000 new accounts with just a single click</p>


						ACCOUNT BALANCE: $<?= number_format($pro->wallet($uid),2) ?><hr>


						<label>Number of Accounts</label>

						<input type="number" name="no" class="form-control" placeholder="Number of accounts to register">
						<div id="spin"></div>
					</div>
					<div class="modal-footer">
						<button type="submit"class="btn btn-primary" name="AddNewUsersAuto" >REGISTER ACCOUNTS</button>
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

	<script type="text/javascript">

		const form = document.getElementById('formD');
		form.addEventListener('submit', (event) => {
			showSpin();
		})

		function showSpin() {

			$('#spin').html('<center><div class="spinner-border text-primary p-5 m-2" style="" role="status"> <span class="visually-hidden">Loading...</span></div><br><span id="tstatus"> Processing Request...</span></center>');

		}
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>

	<script src="assets/js/index2.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>

	</script>
</body>

</html>