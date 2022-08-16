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
		<title>Manage Payout</title>
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
						<div class="breadcrumb-title pe-3">Admin</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Manage Payout</li>
								</ol>
							</nav>
						</div>
					</div>					


					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">All Payout</h5>

							</div>
							<hr/>

							<div class="table-responsive mt-3">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>S/N</th>

											<th>Level</th>
											<th>Statge</th>
											<th>Amount</th>
											<th>Matrix</th>
											<th>Stepout</th>
											<th>Incentive</th>
											<th>Item</th>
											<th>Title</th>
											<th></th>

										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$sql = $db->query("SELECT * FROM levelbonus "); 
										while($row = $sql->fetch_assoc()) { $e = $i++;
											?>
											<tr>
												<td><?php echo $e; ?></td>


												<td><?php echo $row['level']; ?> </td>
												<td><?php echo $row['stage']; ?> </td>
												<td><?php echo $row['amount']; ?> </td>
												<td><?php echo $row['matrix']; ?> </td>
												<td><?php echo $row['stepout']; ?> </td>
												<td><?php echo $row['incentive']; ?> </td>
												<td><?php echo $row['item']; ?> </td>
												<td><?php echo $row['title']; ?> </td>
												<td> <button class="btn btn-primary btn-sm editincentive" data-data='<?=  json_encode($row) ?>'>Edit</button> </td>
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

				<!-- Modal -->	
				<form method="post">
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">

										<div class="row">
											<div class="col-6">
												<label>Level</label>
												<input type="number" name="level" class="form-control" disabled>
												<input type="hidden" name="sn">
											</div>
											<div class="col-6">
												<label>Stage</label>
												<input type="number" name="stage" class="form-control" disabled>
											</div>



											<div class="col-4">
												<label>Amount</label>
												<input type="number" name="amount" class="form-control">
											</div>


												<div class="col-4">
												<label>Matrix Bonus</label>
												<input type="number" name="matrix" class="form-control">
											</div>
											<div class="col-4">
												<label>Stepout Bonus</label>
												<input type="number" name="stepout" class="form-control">
											</div>


													<div class="col-6">
												<label>Incentive</label>
												<input type="number" name="incentive" class="form-control">
											</div>
											<div class="col-6">
												<label>Item</label>
												<input type="text" name="item" class="form-control">
											</div>


													<div class="col-12">
												<label>Title</label>
												<input type="text" name="title" class="form-control">
											</div>


										</div>

								</div>
								<div class="modal-footer">
									<a href="" class="btn btn-secondary">Reset</a>
									<span id="reset"><button name="updateIncentive"  type="submit" class="btn btn-primary">Update</button></span>
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


				$('body').on('click', '.editincentive', function() {
					data = $(this).data('data')
					modal = $('#exampleModal');



					modal.modal('show');

					$(modal).find('input[name="level"]').val(data.level)
					$(modal).find('input[name="stage"]').val(data.stage)
					$(modal).find('input[name="matrix"]').val(data.matrix)
					$(modal).find('input[name="stepout"]').val(data.stepout)
					$(modal).find('input[name="incentive"]').val(data.incentive)
					$(modal).find('input[name="item"]').val(data.item)
					$(modal).find('input[name="title"]').val(data.title)
					$(modal).find('input[name="sn"]').val(data.sn)
					$(modal).find('input[name="amount"]').val(data.amount)
					console.log(data);
				})
			</script>
			<script src="assets/js/index2.js"></script>
			<!--app JS-->
			<script src="assets/js/app.js"></script>

		</body>

</html>