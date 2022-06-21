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
		<link href="treestyle.css" rel="stylesheet">
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
		<title>Overview</title>
	</head>

	<body>
		<!--wrapper-->
		<div class="wrapper">
			
			<?php include('nav.php');
			if($uidx!=1){header('location: ./'); } ?>
			<!--start page wrapper -->
			<div class="page-wrapper">
				<div class="page-content">
					
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-primary bg-gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Total Users</p>
											<h4 class="my-1 text-white"><?= number_format(sqL('user')) ?></h4>
										</div>
										<div class="text-white ms-auto font-35"><i class='bx bx-user-pin'></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-success bg-gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Total Revenue</p>
											<h4 class="my-1 text-white">$<?php $r = sqL('user')*7.5; echo number_format($r,2) ?></h4>
										</div>
										<div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-danger bg-gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Referral Payout</p>
											<h4 class="my-1 text-white">$<?php $a = $pro->walletadmin(11); echo number_format($a,2) ?> <small class="text-success"><?php echo number_format(100*$a/$r,2) ?>%</small></h4>
										</div>
										<div class="text-white ms-auto font-35"><i class='bx bx-comment-detail'></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-warning bg-gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-dark">Matrix Payout</p>
											<h4 class="text-dark my-1">$<?php $b = $pro->walletadmin(12); echo number_format($b,2) ?>  <small class="text-success"><?php echo number_format(100*$b/$r,2) ?>%</small></h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-warning">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-dark">Incentive Payout</p>
											<h4 class="text-dark my-1">$<?php $c = $pro->walletadmin(13)+$pro->walletadmin(14); echo number_format($c,2) ?>  <small class="text-success"><?php echo number_format(100*$c/$r,2) ?>%</small></h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card radius-10 bg-danger">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-light">Balance</p>
											<h4 class="text-light my-1">$<?php $payout = $a+$b+$c; $d = $r-$payout; echo number_format($d,2) ?>  <small class="text-success"><?php echo number_format(100*$d/$r,2) ?>%</small></h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card radius-10 bg-primary">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-light">Payout Remark</p>
											<h4 class="text-light my-1"><?php echo number_format(100*$payout/$r) ?>%  </h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card radius-10 bg-success">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-light">Available PINs</p>
											<h4 class="text-light my-1"><?php echo number_format(sqL('pin')) ?>  
											<small class="text-dark"><?php echo number_format(sqL1('pin','status',0)) ?> Active</small> </h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card radius-10 bg-danger">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-light">Pending Withdrawals</p>
											<h4 class="text-light my-1">$<?php echo number_format(abs($pro->pendingWithd()),2) ?> | <?= $pro->pendingWithd(1) ?> </h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-success">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-light">Withdrawal Charges</p>
											<h4 class="text-light my-1">$<?php echo number_format(sqL1('wallet','type',4)*2.5,2) ?>  
										</h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-secondary">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-light">Multiple Reg. Charges</p>
										<h4 class="text-light my-1">$<?php echo number_format(abs($pro->walletadmin(5)),2) ?>  
									</h4>
								</div>
								<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				
			</div>



					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Recent Transactions</h5>

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
										$sql = $db->query("SELECT * FROM wallet ORDER BY sn DESC LIMIT 200 "); 
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
			
		  
		</div>

	
             </div>
         </div>
         <!--end page wrapper -->
         <?php include('foot.php') ?>

     </div>
     <!--end wrapper-->
     
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
     </script>
     <script src="assets/js/index2.js"></script>
     <!--app JS-->
     <script src="assets/js/app.js"></script>
     <script>
     	new PerfectScrollbar('.customers-list');
     	new PerfectScrollbar('.store-metrics');
     	new PerfectScrollbar('.product-list');
     </script>
 </body>

 </html>