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
		<title>Stage Users</title>

		<style type="text/css">
			.cs {
				border: solid 3px green
			}
		</style>
	</head>

	<body>
		<!--wrapper-->
		<div class="wrapper">
			
			<?php include('nav.php');
			if($uidx!=1){header('location: ./'); } ?>
			<!--start page wrapper -->
			<div class="page-wrapper">
				<div class="page-content">
					
				<div class="row">
					
		
					<?php $i=1; while($i<=6){$e=$i++;  ?>
						<div class="col">
							<a href="javascript:;" class="fetch_users" data-sn="<?= $e; ?>" style="color: #000;" ><div class="card radius-10 bg-light">
								<div class="card-body" >
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-dark"><b>STAGE <?php echo $e ?> USERS</b></p>
											<h4 class="text-success my-1"><?php echo number_format(sqL1('user','stage',$e)) ?></h4>
										</div>
										<div class="text-dark ms-auto font-35"><i class='bx bx-user-pin'></i> </div>
									</div>
								</div>
							</div></a>
						</div>
					<?php } ?>
				</div>

				
			
			<div class="card user_body">
				<div class="card-body">
					<div class="card-title">
						<h5 class="mb-0">Stage Users</h5>
					</div>
					<hr/>

					<div class="table-responsive mt-3">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Username</th>
									<th>UserId</th>
									<th>Stage</th> 
									<th>Stage Team</th>
									<th>Gen</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
		</div>

		<div class="card user_info">
			<div class="card-body">
				<div class="card-title">
					<h5 class="mb-0">Recent Transactions </h5>
				</div>
				<hr/>

				<div class="table-responsive mt-3">
					<div class="btns">
						
					</div>

					<div class="fig mb-0">
						
					</div>

					 <form method="post" class="d-flex justify-content-end mb-2 mt-0">
                     	<input type="hidden" name="fid">
                     	<button type="submit" class="btn btn-primary" name="SearchUser">User Dashboard</button>
                     </form>

					<table id="example" class="table table-bordered table-striped">
		                 	<thead>
		                 		<tr>
		                 			<th>S/N</th>
		                 			<th>Date</th>
		                 			<th>Amount</th>
		                 			<th>Type</th>
		                 			<th>Remark</th>
		                 			<th>User</th>   
		                 		</tr>
		                 	</thead>
		                 	<tbody>
		                 	</tbody>
		                </table>
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

     <script type="text/javascript">
     	$(function() {
     		function fectUserTree(sn, st)
     		{
     			$.ajax({
     				method: 'get', 
     				url: `tree?&user=${sn}&stage=${st}`
     			}).done(function(res) {
     				console.log(res)
     				$('.fig').html(res)
     			}).fail(function(res) {
     				console.log(res);
     			})
     		}


     		$('body').on('click', '.fetch_users', function() {
     			sn = $(this).data('sn');
     			$.ajax({
     				method: 'get', 
     				url: 'api.php?level_users='+sn,
     				beforeSend:() => {
     					$('.radius-10').removeClass('cs')
     					$(this).find('.radius-10').addClass('cs')
     				}
     			}).done(function(res) {
     				res = JSON.parse(res);
     				card = $('.user_body')
     				tbody = $(card).find('tbody');
     				table = $(card).find('table');

     				card.find('h5').html(`Stage ${sn} Users`)
     				tbody.html('');
     				res.map((user, index) => {
     					tbody.append(`
     						<tr>
     							<td>${index+1}</td>
     							<td><a href="javascript:;" class="showuser" data-sn="${user.sn}">${user.name} </a></td>
     							<td>${user.username}</td> 
     							<td>${user.id}</td>
     							<td>${user.stage}</td>
     							<td>${user.team}</td>
     							<td>${user.gen}</td>
     						</tr>
     					`)
     				})
     			}).fail(function(res) {
     				alert('An error occured while fetching your data, pls try again');
     			})
     		})


     		$('body').on('click', '.showuser', function() {
     			sn = $(this).data('sn');
     			$.ajax({
     				method: 'get',
     				url: 'api.php?user_info='+sn
     			}).done(function(res) {
     				$('input[name="fid"]').val(sn);
     				res = JSON.parse(res)
     				card = $('.user_info')
     				$(card).find('h5').html(`${res.data.name} (${res.data.username}) Transactions`);

     				tbody = $(card).find('tbody');
     				tbody.html('')

     				res.transactions.map((trn, index) => {
     					tbody.append(`
     						<tr>
     							<td>${index}</td>
     							<td>${trn.date}</td>
     							<td>${trn.amount}</td>
     							<td>${trn.type}</td>
     							<td>${trn.remark}</td>
     							<td>${trn.user}</td>
     						</tr>
     					`)
     				})



     				document.querySelector('.user_info').scrollIntoView({
					  behavior: 'smooth'
					});



     				bstring = '';


     				res.stages.map(st => {

     					if(st==1){color='danger';}
						else if(st==2){color='warning';}
						else if(st==3){color='primary';}
						else if(st==4){color='success';}
						else{color='info';}
     					bstring += `<button type="submit" class="btn me-2 fetchTree btn-${color}" data-stage='${st}' data-sn='${sn}' >Stage ${st}</button>`
     				})

     				$('.btns').html(bstring);

     				fectUserTree(sn, res.stages[0]);

     			}).fail(function(res) {
     				console.log(res);
     			})
     		})


     		$('body').on('click', '.fetchTree', function() {
     			st = $(this).data('stage');
     			sn = $(this).data('sn');
     			fectUserTree(sn, st)
     		})

     	})
     </script>
 </body>

 </html>