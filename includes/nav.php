                <?php $pro->check_login(); 
                if(isset($_SESSION['report'])){ 
                        echo '<div class="alert alert-success alert-dismissible" style="position:fixed; top:10px; right:10px; z-index:100000">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-check"></i>  &nbsp;&nbsp;<b>' . $_SESSION['report'] . '</b>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>';
                            unset($_SESSION['report']); }
                    elseif(isset($report)){ $pro->Alert();}
                    ?>


             
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                                <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="#" class="nav-link">TOPUP</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto mr-3">
                            <li class="nav-item dropdown">
                                <a class="#" data-toggle="dropdown" href="#">
                                    <img src="<?php if(empty($row['photo'])){?> dist/img/user.png <?php }else{?>uploads/<?php echo $row['photo'] ?> <?php } ?>" alt="Pics" class="brand-image" style="opacity: .8; width: 40px;"><b><?php echo userName($uid) ?></b>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                  <a href="profile.php" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i> Profile
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a href="profile.php" class="dropdown-item">
                                    <i class="fas fa-lock mr-2"></i> Change Password
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a href="logout.php" class="dropdown-item">
                                    <i class="nav-icon fa fa-power-off text-info"></i>
                                    Logout
                                  </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container Navigation -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                    <a href="#" class="brand-link">
                       <!--  <img src="asets/img/smilelogo.png" alt="BrandLogo" class="brand-image img-circle elevation-3"
                                 style="opacity: .8"> -->
                        <span class="brand-text"><b>BLUEHAVEN APARTMENTS</b></span>
                    </a>

                 <!-- Sidebar -->
                    <div class="sidebar">
                            <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" 
                                    role=" menu" data-accordion="false">
                                       <?php if($pro->adminLevel()==TRUE) { ?>

                                 <!---Admin Operations --->
                                <li class="nav-item has-treeview menu-open">
                                    <a href="#" class="nav-link ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Admin Operations
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="overview.php" class="nav-link <?php echo 
                                                $page_name =='overview'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>System Overview</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="admin-wallet-transaction.php" class="nav-link <?php echo 
                                                $page_name =='wallet'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Transaction History</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="manage-users.php" class="nav-link <?php echo 
                                                $page_name =='alluser'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Search users</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="userteams.php" class="nav-link <?php echo 
                                                $page_name =='alluser'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage users Matrix</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="funduserwallet.php" class="nav-link <?php echo 
                                                $page_name =='funduserwallet'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fund User Wallet</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="manage-withdrawals.php" class="nav-link <?php echo $page_name =='cashwith'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage withdrawals</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="manage-deductions.php" class="nav-link <?php echo $page_name =='cashwith2'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage Deduction</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="systemsetup.php" class="nav-link <?php echo 
                                        $page_name =='package'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>System Setup</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="accountsummary.php" class="nav-link <?php echo 
                                        $page_name =='summary'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Account Summary</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="manage-walletfunding.php" class="nav-link <?php echo $page_name =='wallet1'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage wallet funding</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sendemails.php" class="nav-link <?php echo $page_name =='sendall'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Send Email To All</p>
                                            </a>
                                        </li>
                                      
                                        <!-- <li class="nav-item">
                                            <a href="clientpayouts.php" class="nav-link <?php echo $page_name =='clientpay'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Clients Incentive Payouts</p>
                                            </a>
                                        </li> 
                                        <li class="nav-item">
                                            <a href="user-stages.php" class="nav-link <?php echo 
                                                $page_name =='user'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>View user stages</p>
                                            </a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a href="admin-chats.php" class="nav-link <?php echo 
                                                $page_name =='chat'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Chats & Messages </p> <div class="badge badge-danger"> <?php echo $pro->UnreadMsg() ?></div>
                                            </a>
                                        </li>
                                    </ul></li>
                                     <?php }   ?>





















                                        
                                    <li class="nav-item has-treeview menu-open">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Account Operations
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                            <a href="dashboard.php" class="nav-link <?php echo $page_name =='dash'?'active': '' ?>">
                                                <i class="nav-icon fas fa-th"></i>
                                                <p>Dashboard</p>
                                            </a>
                                    </li> 

                                            <li class="nav-item">
                                                <a href="fundwallet.php" 
                                                class="nav-link <?php echo $page_name =='fundwallet'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Fund Wallet</p>
                                                </a>
                                            </li>
                                    <li class="nav-item">
                                            <a href="profile.php" class="nav-link <?php echo 
                                            $page_name =='prof'? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-user"></i>
                                                <p>Personal Profile</p>
                                            </a>
                                    </li>
                                    <li class="nav-item">
                                            <a href="myteam.php" class="nav-link <?php echo 
                                            $page_name =='myteam' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>My Team</p>
                                            </a>
                                    </li> 

                                            <li class="nav-item">
                                                <a href="wallet-transactions.php" 
                                                class="nav-link <?php echo $page_name == 'wal' ? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Wallet Transactions</p>
                                                </a>
                                            </li>
                                            
                                         <!--    <li class="nav-item">
                                            <a href="https:// Blueheaven.com/register.php?ref=<?php echo userName($uid, 'user') ?>" 
                                            class="nav-link <?php echo $page_name =='member'? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Register New Member</p>
                                            </a>
                                        </li> 
                                            
                                            <li class="nav-item">
                                                <a href="membership-plan.php" 
                                                class="nav-link <?php echo $page_name =='members'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Membership Packages</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="referralbonus.php"
                                                class="nav-link <?php echo $page_name =='refer'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Referral Bonus</p>
                                                </a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a href="cashwithdrawal.php" 
                                                class="nav-link <?php echo $page_name =='cash'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Cash Withdrawal</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="fundtransfer.php" 
                                                class="nav-link <?php echo $page_name =='fund'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Fund Transfer</p>
                                                </a>
                                            </li>
                                          <!--   <li class="nav-item">
                                                <a href="checktransaction.php" 
                                                class="nav-link <?php echo $page_name =='check'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Check Transaction</p>
                                                </a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a href="support.php" class="nav-link <?php echo $page_name =='sup'? 'active' : '' ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Message Admin</p>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                                <a href="?logout=logout" class="nav-link active">
                                                    <i class="nav-icon fa fa-power-off text-info"></i>
                                                    <p>Logout</p>
                                                </a>
                                            </li>

                                </ul>
                            </nav>
                        </div>
                    </aside>
           

