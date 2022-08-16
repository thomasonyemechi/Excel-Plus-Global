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
		<title>Funds Withdrawals</title>
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
									<li class="breadcrumb-item active" aria-current="page">Manage Funds Withdrawals </li>
								</ol>
							</nav>
						</div>
					</div>					


					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Pending Withdrawals Request</h5>

							</div>
							<hr/>

							<div class="table-responsive mt-3">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>S/N</th>
											
											<th>Date</th>
											<th>Amount</th>
											<th>Charges</th>
											<th>User</th>
											<th>Bank Details</th>
											<th>Status</th> 
											
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$sql = $db->query("SELECT * FROM wallet WHERE type=1 AND status<2 ORDER BY sn DESC LIMIT 200 "); 
										while($row = $sql->fetch_assoc()) { $e = $i++;
											$type = $row['cos']>0 ? 'Credit' : 'Debit';
											?>
											<tr>
												<td><?php echo $e; ?></td>
												
												
												<td><?php echo date('d/m/y', $row['ctime']); ?></td>
												<td>$<?php echo number_format(abs($row['cos']),2) ?></td>
												<td>$<?php echo '2.50'; ?></td>
												<td><?php echo userName($row['id']); ?> (<?php echo userName($row['id'],'user'); ?>)</td>
												<td><?php echo userName($row['id'],'bank').', '.userName($row['id'],'accountno').', '.userName($row['id'],'accname'); ?> </td>
												<td><?php echo $pro->walletStatus($row['status']); ?></td> 
												
												<td><form method="post"><button value="<?= $row['opt'] ?>" name="ApproveWithdrawal" type="submit" class="btn btn-primary btn-sm">Pay</button><button value="<?= $row['opt'] ?>" name="ReserseWithdrawal" type="submit" class="btn btn-warning btn-sm">Reverse</button></form></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div><!--end row-->
					</div>

					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Complete Withdrawal Ledger</h5>

							</div>
							<hr/>

							<div class="table-responsive mt-3">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>S/N</th>
											
											<th>Date</th>
											<th>Amount</th>
											<th>Charges</th>
											<th>Type</th>
											<th>Remark</th>
											<th>Status</th> 
											<th>Reference</th> 
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$sql = $db->query("SELECT * FROM wallet WHERE type=1 AND status=2 ORDER BY sn DESC LIMIT 200 "); 
										while($row = $sql->fetch_assoc()) { $e = $i++;
											$type = $row['cos']>0 ? 'Credit' : 'Debit';
											?>
											<tr>
												<td><?php echo $e; ?></td>
												
												
												<td><?php echo date('d/m/y', $row['ctime']); ?></td>
												<td>$<?php echo number_format(abs($row['cos']),2) ?></td>
												<td>$<?php echo '2.50'; ?></td>
												<td><?php echo $type; ?></td>
												<td><?php echo $row['remark']; ?> </td>
												<td><?php echo $pro->walletStatus($row['status']); ?></td> 
												<td><?php  echo $row['trno'] ?></td></tr>
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
									<h5 class="modal-title" id="exampleModalLabel">Withdraw Funds to Bank Account</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									
									ACCOUNT BALANCE: <?php $bal = $pro->wallet($uid); $total = $bal-2.5;  ?> $<?= number_format($bal,2) ?><br><br>

									<label>Amount to Withdraw (USD)</label>
									<input type="number" id="amount"  name="amount" min="5" max="<?= floor($total) ?>" class="form-control" required placeholder="100" onkeyup="pro(this.value)">
									<span class="text-danger" id="er"></span>
									
								</div>
								<div class="modal-footer" >
									<a href="" class="btn btn-secondary">Reset</a>
									<span id="veri"><button type="button" class="btn btn-primary" onclick="proc()">Withdraw Funds </button></span>
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
				<script>
					$(document).ready(function() {
						$('#example').DataTable();
					} );

					function proc(){
						$('#exampleModal').modal('show');
					}

				</script>
				<script src="assets/js/index2.js"></script>
				<!--app JS-->
				<script src="assets/js/app.js"></script>
				<script>

				</script>
			</body>

			</html>