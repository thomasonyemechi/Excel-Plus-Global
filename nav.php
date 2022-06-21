<?php  
require_once('includes/headerquery.php');
if(isset($_SESSION['user_id']) AND sqL1('user','id',$uid)==1){}else{header('location: signin.php');}
?>
<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					 <!-- <img class="logo-icon" alt="logo icon">  -->
				</div>
				<div>
					<h4 class="logo-text"> EXCEL PLUS  </h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<?php if($uidx==1){ ?>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-command'></i>
						</div>
						<div class="menu-title">Admin Operations</div>
					</a>
					<ul>
						<li> <a href="overview.php"><i class="bx bx-right-arrow-alt"></i>Adminstrative Overview</a>
						</li>
						<li> <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchuser"><i class="bx bx-right-arrow-alt"></i>Search User</a>
						</li>
						<li> <a href="adminledger.php"><i class="bx bx-right-arrow-alt"></i>Transaction History</a>
						</li>
						<li> <a href="stageuser.php"><i class="bx bx-right-arrow-alt"></i>Stage Users</a>
						</li>
						<!-- <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Manage Registration PINs</a> -->
						</li>
						<li> <a href="adminwithdrawals.php"><i class="bx bx-right-arrow-alt"></i>Manage Withdrawals</a>
						</li>
						<li> <a href="transferfundsadmin.php"><i class="bx bx-right-arrow-alt"></i>Manage Transfers</a>
						</li>
						<li> <a href="manageincentive.php"><i class="bx bx-right-arrow-alt"></i>Manage Incentives</a>
						</li>
						
					<!-- 	<li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Manage Promotions</a>
						</li>
						
						<li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Manage Announcements</a> -->
						</li>
					</ul>
				</li>
			<?php } ?>
				<li>
					<a href="." class="">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				<li>
					<a href="geneology.php" class="">
						<div class="parent-icon"><i class='bx bx-map-pin'></i>
						</div>
						<div class="menu-title">Matrix Geneology</div>
					</a>
					
				</li>
				<li>
					<a href="automatedreg.php" class="">
						<div class="parent-icon"><i class='bx bx-briefcase-alt-2'></i>
						</div>
						<div class="menu-title">Automated Multiple Registrations</div>
					</a>
					
				</li> 
		<!-- 		<li>
					<a href="managepin.php" class="">
						<div class="parent-icon"><i class='bx bx-atom'></i>
						</div>
						<div class="menu-title">Manage PIN</div>
					</a>
					
				</li> -->
				<li>
					<a href="ledger.php" class="">
						<div class="parent-icon"><i class='bx bx-hourglass'></i>
						</div>
						<div class="menu-title">Transaction History</div>
					</a>
					
				</li>
				<li>
					<a href="transferfunds.php" class="">
						<div class="parent-icon"><i class='bx bx-gift'></i>
						</div>
						<div class="menu-title">Transfer Funds</div>
					</a>
					
				</li>
				<li>
					<a href="withdrawals.php" class="">
						<div class="parent-icon"><i class='bx bx-spa'></i>
						</div>
						<div class="menu-title">Cash Withdrawal</div>
					</a>
					
				</li>
				<li>
					<a href="incentive.php" class="">
						<div class="parent-icon"><i class='bx bx-gift'></i>
						</div>
						<div class="menu-title">User Incentives</div>
					</a>
					
				</li>
				<li>
					<a href="referrals.php" class="">
						<div class="parent-icon"><i class='bx bx-gift'></i>
						</div>
						<div class="menu-title">Referrals</div>
					</a>
					
				</li>
				<li>
					<a href="profile.php" class="">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">User Profile</div>
					</a>
					
				</li>
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
				
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="javascript:;">	<i class='bx bx-search'></i>
								</a>
							</li>
							
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											
										</div>
									</a>
									<div class="header-notifications-list">
										
									</div>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											
										</div>
									</a>
									<div class="header-message-list">
										
									</div>
									
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php if(is_null(userName($uid,'photo'))){ ?>
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"> <?php } else{ ?>
							<img src="uploads/<?php echo userName($uid,'photo') ?>" class="user-img" alt="user avatar"> <?php } ?>
							<div class="user-infom ps-3 text-dark">
								<p class="user-name mb-0"><b><?= userName($uid) ?></b></p>
								<p class="designattion mb-0"><?= $pro->stageTitle($stage) ?> Member</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span><b><?= userName($uid,'user') ?> [<?= userName($uid,'sn') ?>]</b></span></a>
							</li><li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="profile.php"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							
							
							
							<li><a class="dropdown-item" href="?logout=true"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

	<?php if(isset($report)){ $pro->Alert();} ?>	