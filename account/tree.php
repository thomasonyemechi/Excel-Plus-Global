<?php 
error_reporting(0);
include('includes/connection.php'); ?>
                 
                 
<?php     $user = $_GET['user'];  $stage=userName2($user,'stage'); 	$st = $_GET['stage'] ?? $stage; 

$st = $_GET['stage'] ?? $stage;  if($st==1){$color='danger';}elseif($st==2){$color='warning';}elseif($st==3){$color='primary';}elseif($st==4){$color='success';}else{$color='info';}
                                 //echo $leg;count($le)-1 ?>
                                 
<figure class="table-responsive mt-3" > <ul class="tree">
    <li><span class="btn btn--<?= $color ?>"  style="line-height: 0.8"><a href="?user=<?= sqLx('user','sn',$user,'a1') ?>"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($user,'user') ?><br>[<?= $user ?>]</small></a></span>
        <ul><?php $s1=$db->query("SELECT * FROM user WHERE a1=$user AND stage>=$st"); while($r1 = mysqli_fetch_assoc($s1)){ $key1=$r1['sn'];  ?>
            <li><a href="?user=<?= $key1 ?>"><span class="btn btn--<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key1,'user') ?><br>[<?php echo $key1 ?>]</small></span></a>
                 <ul><?php  $s2=$db->query("SELECT * FROM user WHERE a1=$key1 AND stage>=$st"); while($r2 = mysqli_fetch_assoc($s2)){ $key2=$r2['sn'];  ?>
                    <li><a href="?user=<?= $key2 ?>"><span class="btn btn--<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key2,'user') ?><br>[<?php echo $key2; ?>]</small></span></a>
                       <?php  if($st>1){ ?>
                        <ul><?php  $s3=$db->query("SELECT * FROM user WHERE a1=$key2 AND stage>=$st"); while($r3 = mysqli_fetch_assoc($s3)){ $key3=$r3['sn'];  ?>
                            <li><a href="?user=<?= $key3 ?>"><span class="btn btn--<?= $color ?>" style="line-height: 0.8"><small><img src="uploads/u<?= $st ?>.png"><br><?= userName2($key3,'user') ?><br>[<?php echo $key3 ?>]</small></span></a></li>
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