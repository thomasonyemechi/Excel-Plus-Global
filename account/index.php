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
	<title>Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		
			<?php include('nav.php') ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			
			  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
			  	<div class="col">
						<div class="card radius-10 bg-primary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Team</p>
										<h4 class="my-1 text-white"><?= number_format($pro->userTeam($uidx)) ?></h4>
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
										<p class="mb-0 text-white">Total Income</p>
										<h4 class="my-1 text-white"><?= money($pro->userIncome($uid)) ?></h4>
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
										<p class="mb-0 text-white">Total Debit</p>
										<h4 class="my-1 text-white"><?= money(abs($pro->userDebit($uid))) ?></h4>
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
										<p class="mb-0 text-dark">Account Balance</p>
										<h4 class="text-dark my-1"><?= money($pro->wallet($uid)) ?></h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class='bx bx-cart-alt'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				
			  </div><!--end row-->
			  

	

			   <div class="row">
				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">New Referrals</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
						</div>
							<div class="customers-list p-2 mb-3">
								<?php
                                          $i=1;
                                          $sql = $db->query("SELECT * FROM user WHERE sponsor='$uidx' ORDER BY sn DESC LIMIT 20 "); 
                                          while($row = $sql->fetch_assoc()) { ?>
					
							<div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
								<div class="">
									<div class="widgets-icons bg-light-secondary text-danger ms-auto"><i class='bx bxs-group' ></i>
										</div>
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14"><?= userName($row['id']) ?></h6>
									<p class="mb-0 font-13 text-secondary"><?= userName($row['id'],'email') ?></p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	
									
									<a href="geneology.php?user=<?= $row['sn'] ?>" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							
						
					<?php } ?></div>
					</div>
				 </div>
				


				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100 overflow-hidden">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Account Statistics</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
						</div>

						<div class="store-metrics p-3 mb-3">
							
                            <div class="card mt-0 radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Referral Bonus</p>
											<h4 class="mb-0">$<?= number_format($pro->wallet($uid,11),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='bx bxs-shopping-bag' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Matrix Bonus</p>
											<h4 class="mb-0">$<?= number_format($pro->wallet($uid,12),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stepout Bonus</p>
											<h4 class="mb-0">$<?= number_format($pro->wallet($uid,13),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Incentive Bonus</p>
											<h4 class="mb-0">$<?= number_format($pro->wallet($uid,14),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Earnings</p>
											<h4 class="mb-0">$<?= number_format($pro->walletRange($uid,11,14),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">PIN Purchase</p>
											<h4 class="mb-0">$<?= number_format(abs($pro->wallet($uid,3)),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Fund Transfered</p>
											<h4 class="mb-0">$<?= number_format(abs($pro->wallet($uid,2)),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Fund Received</p>
											<h4 class="mb-0">$<?= number_format($pro->wallet($uid,20),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none mb-0">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Cash Withdrawn</p>
											<h4 class="mb-0">$<?= number_format(abs($pro->wallet($uid,1)+$pro->wallet($uid,4)),2) ?></h4>
										</div>
										<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account' ></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				 </div>
				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100 overflow-hidden">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Account Information</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
						</div>

						<div class="product-list p-3 mb-3">
							
                            <div class="card mt-0 radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stage Title</p>
											<h4 class="mb-0"><?= $pro->stageTitle($stage) ?></h4>
										</div>
										<div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='bx bxs-shopping-bag' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stage</p>
											<h4 class="mb-0">Stage <?= $stage ?></h4>
										</div>
										<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stage Level</p>
											<h4 class="mb-0">Level <?php $level = userName($uid,'level'); echo $pro->stageLevel($level) ?></h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stage Team</p>
											<h4 class="mb-0"><?php $team = $pro->stageTeam($uidx); echo $team ?></h4>
										</div>
										<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Stage Progress</p>
											<h4 class="mb-0"><?php $max = $stage>1 ? 14 : 6;   echo number_format(100*$team/$max,2) ?>%</h4>
										</div>
										<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none mb-0">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Direct Referrals</p>
											<h4 class="mb-0"><?php echo number_format(userName($uid,"sp")) ?></h4>
										</div>
										<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account' ></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				 </div>
</div><!--end row-->
				
				
<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5 class="mb-0">REFERRAL LINK</h5>
						</div>
						<hr/>
						https://excelplusglobal.com/account/signup?ref=<?= userName($uid,"user") ?>
						<span style="float:right"> | USER ID: <b><?= $uidx ?></b></span><span style="float:right">REFERRAL ID: <b><?= $uidx ?></b>	|  </span>
</div>
</div>						


<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5 class="mb-0">Recent Transactions</h5>
						</div>
						<hr/>

                               <div class="table-responsive mt-3">
								  <table id="example" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                          <th>S/N</th>
                                         
                                          <th>Date</th>
                                          <th>Amount</th>
                                      
                                          <th>Type</th>
                                          <th>Remark</th>
                                         <th>Status</th> 
                                         <th>Reference</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php
                                          $i=1;
                                          $sql = $db->query("SELECT * FROM wallet WHERE id='$uid' ORDER BY sn DESC LIMIT 200 "); 
                                          while($row = $sql->fetch_assoc()) { $e = $i++;
                                          $type = $row['cos']>0 ? 'Credit' : 'Debit';
                                      ?>
                                        <tr>
                                          <td><?php echo $e; ?></td>
                                          
                                       
                                          <td><?php echo date('d/m/y', $row['ctime']); ?></td>
                                          <td>$<?php echo number_format(abs($row['cos']),2) ?></td>
                                     
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