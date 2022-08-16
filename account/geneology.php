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
	
	<title>Matrix Geneology</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		
			<?php include('nav.php') ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Matrix</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Geneology</li>
							</ol>
						</nav>
					</div>
				</div>
<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h5 class="mb-0">Geneology</h5>
						</div>
						<hr/>

  <?php     $user = $_GET['user']??$uidx; if($user<$uidx){$user=$uidx; $stage=userName2($user,'stage'); }

    ?>

<form method="post">
    <?php $i = 1; while($i<=$stage){$e=$i++;
    if($e==1){$color='danger';}elseif($e==2){$color='warning';}elseif($e==3){$color='primary';}elseif($e==4){$color='success';}else{$color='info';}
     ?>
        <button type="submit" class="btn btn-<?= $color ?>" name="StageSk" value="<?= $e ?>">Stage <?= $e ?></button>

    <?php } ?>
</form>                       
		
						                                 <?php $st = $_SESSION['stage']??$stage;  if($st==1){$color='danger';}elseif($st==2){$color='warning';}elseif($st==3){$color='primary';}elseif($st==4){$color='success';}else{$color='info';}
								                                 $color .= 'x';
                                 //echo $leg;count($le)-1 ?>
<figure class="table-responsive mt-3" > <ul class="tree">
    <li><span class="btn btn-<?= $color ?>"  style="line-height: 0.8"><a href="?user=<?= sqLx('user','sn',$user,'a1') ?>"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($user,'user') ?><br>[<?= $user ?>]</small></a></span>
        <ul><?php $s1=$db->query("SELECT * FROM user WHERE a1=$user AND stage>=$st"); while($r1 = mysqli_fetch_assoc($s1)){ $key1=$r1['sn'];  ?>
            <li><a href="?user=<?= $key1 ?>"><span class="btn btn-<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key1,'user') ?><br>[<?php echo $key1 ?>]</small></span></a>
                 <ul><?php  $s2=$db->query("SELECT * FROM user WHERE a1=$key1 AND stage>=$st"); while($r2 = mysqli_fetch_assoc($s2)){ $key2=$r2['sn'];  ?>
                    <li><a href="?user=<?= $key2 ?>"><span class="btn btn-<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key2,'user') ?><br>[<?php echo $key2; ?>]</small></span></a>
                       <?php  if($st>1){ ?>
                        <ul><?php  $s3=$db->query("SELECT * FROM user WHERE a1=$key2 AND stage>=$st"); while($r3 = mysqli_fetch_assoc($s3)){ $key3=$r3['sn'];  ?>
                            <li><a href="?user=<?= $key3 ?>"><span class="btn btn-<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key3,'user') ?><br>[<?php echo $key3 ?>]</small></span></a></li>
                        <?php } ?>
                        </ul>
                         <?php } ?>
                    </li>
                <?php  } ?>
                   
                </ul>
            </li>
                <?php  } ?>
        </ul>
    </li>
</ul>
</figure>
								
						
		
			
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