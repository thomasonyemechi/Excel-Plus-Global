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
		<title>General Ledger</title>
	</head>

	<body>
		<!--wrapper-->
		<div class="wrapper">

			<?php include('nav.php');
			if($uidx!=1){header('location: ./'); } ?>
			<!--start page wrapper -->
			<div class="page-wrapper">
				<div class="page-content">
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Wallet</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Transaction Ledger</li>
								</ol>
							</nav>
						</div>
					</div>					


					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">General Ledger</h5>

							</div>
							<hr/>

							<div class="table-responsive mt-3">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>S/N</th>

											<th>Date</th>
											<th>Amount</th>

											<th>Type</th>

											<th>Remark</th>
											<th>Status</th>
											<th>User</th> 
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$sql = $db->query("SELECT * FROM wallet ORDER BY sn DESC LIMIT 400 "); 
										while($row = $sql->fetch_assoc()) { $e = $i++;
											$type = $row['cos']>0 ? 'Credit' : 'Debit';
											?>
											<tr>
												<td><?php echo $e; ?></td>


												<td><?php echo date('d/m/y', $row['ctime']); ?></td>
												<td>$<?php echo number_format(abs($row['cos']),2) ?></td>

												<td><?php echo $type; ?></td>
												<td><?php echo $row['remark']; ?> </td>
												<td><?php echo $pro->walletStatus($row['status']); ?> </td>

												<td><?php  echo userName($row['id']) ?> (<?php  echo userName($row['id'],'user') ?>)</td></tr>
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

				<!-- Modal -->	
				<form method="post">
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Transfer Funds to Another User</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">

									<span id="veri">
										<label>Recipient ID</label>
										<input type="number" id="rec" name="rec" class="form-control">
									</span>

								</div>
								<div class="modal-footer">
									<a href="" class="btn btn-secondary">Reset</a>
									<span id="reset"><button onclick="verifyUser(document.getElementById('rec').value)" type="button" class="btn btn-primary">Confirm Recipient</button></span>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>


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
			<script>
				$(document).ready(function() {
					$('#example').DataTable();
				} );

				function verifyUser(v){
					$.ajax({
						type: 'get',
						url : 'control.php?verify='+v,
					}).done(function(data){
						if(data==0){ $('#veri').html('<div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2"><div class="d-flex align-items-center"><div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i></div><div class="ms-3"><h6 class="mb-0 text-danger">Error</h6><div>You have entered an invalid Recipient ID. Reset and try again</div></div></div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); 
						$('#reset').html(''); 	 }
						else{ $('#veri').html(data);   $('#reset').html('<button type="submit" name="FundTransfer" class="btn btn-primary">Transfer Funds Recipient</button>'); }
					}) 
				}
			</script>
			<script src="assets/js/index2.js"></script>
			<!--app JS-->
			<script src="assets/js/app.js"></script>

		</body>

</html>