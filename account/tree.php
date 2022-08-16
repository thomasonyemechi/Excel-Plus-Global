<?php 
error_reporting(0);
include('includes/connection.php'); ?>

	<?php 


	$user = $_GET['user'];  $leg = $pro->stageLeg($user); $le = explode(',', $leg);
	$stage = userName2($user,'stage');    if($pro->stageTeam($user)==39){$pro->promoteUser($user,$stage);} 



	$st = $_GET['stage'] ?? $stage;  if($st==1){$color='danger';}elseif($st==2){$color='warning';}elseif($st==3){$color='primary';}elseif($st==4){$color='success';}else{$color='info';}
                                 //echo $leg;count($le)-1 ?>
                                 <figure class="table-responsive"> <ul class="tree">
                                 	<li><span class="btn btn-<?= $color ?>">
                                        <a style="color:#fff" href="javascript:;" class="showuser" data-sn=<?= $le[0] ?>>
                                            <?= $le[0] ?><br><?= userName2($le[0],'user') ?></a></span>
                                 		<ul><?php $e=1; while($e<=3){ $f = $e++;  $m=$le[$f]??''; if($m!=''){  ?>
                                 			<li><a style="color:#fff" href="javascript:;" class="showuser" data-sn=<?= $m ?> ><span class="btn btn-<?= $color ?>"><?php echo $m ?><br><?= userName2($m,'user') ?></span></a>
                                 				<ul><?php $c=1; while($c<=3){ $d = $c++; $x=3*$f+$d; $h=$le[$x]??''; if($h!=''){ ?>
                                 					<li><a style="color:#fff" href="javascript:;" class="showuser" data-sn=<?= $h ?> ><span class="btn btn-<?= $color ?>"><?php echo $h; ?><br><?= userName2($h,'user') ?></span></a>
                                 						<ul><?php $a=1; while($a<=3){ $b = $a++; $y=3*$x+$b; $g=$le[$y]??''; if($g!=''){ ?>
                                 							<li><a style="color:#fff" href="javascript:;" class="showuser" data-sn=<?= $g ?> ><span class="btn btn-<?= $color ?>"><?php echo $g ?><br><?= userName2($g,'user') ?></span></a></li>
                                 						<?php } } ?>
                                 					</ul>
                                 				</li>
                                 			<?php } } ?>
                                 			
                                 		</ul>
                                 	</li>
                                 <?php } } ?>
                             </ul>
                         </li>
                     </ul>
                 </figure>