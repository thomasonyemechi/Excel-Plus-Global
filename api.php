<?php 
error_reporting(0);
include('includes/connection.php');



function drawTree($stage,$user){
	global $pro, $db;
	$stage = $_GET['stage']; $user = $_GET['user_id']; $string = '';

	$st = $stage;
	if($st==1){$color='danger';}
	elseif($st==2){$color='warning';}
	elseif($st==3){$color='primary';}
	elseif($st==4){$color='success';}
	else{$color='info';}

	$leg = $pro->stageLeg($user); $le = explode(',', $leg);

	$string = '<figure class="table-responsive"><ul class="tree"><li><span class="btn btn-'.$color.'"><a style="color:#fff" href="?user='.sqLx('user','sn',$user,'a1') .'">'.$le[0].'<br>'.userName2($le[0],'user').'</a></span><ul>';

	$e=1;
	while($e<=3){ 
		$f = $e++;  $m=$le[$f]??''; if($m!=''){
            $string .= '<li><a href="?user='.$m.'"><span class="btn btn-'.$color.'">'.$m.'<br>'.userName2($m,'user').'</span></a><ul>';
	        $c=1;
	        while($c<=3){ 
	        	$d = $c++; $x=3*$f+$d; $h=$le[$x]??''; if($h!=''){ 
	        		$string .= '<li><a href="?user='.$h.'"><span class="btn btn-'.$color.'">'.$h.'<br>'.userName2($h,'user').'</span></a><ul>';

		        	$a=1;
		        	while($a<=3){ 
		        		$b = $a++; $y=3*$x+$b; $g=$le[$y]??''; if($g!=''){
		        			$string .= '<li><a href="?user='.$g .'"><span class="btn btn-'.$color.'">'.$g.'<br>'.userName2($g,'user').'</span></a></li>';
		        		} 
		        	}

	        		$string .= '</ul></li>';
		        }
		    }

        	$string .= '</ul></li>';
        }
    }
    $string	.= '</ul></li></ul></figure>';
   return $string;
}


if(isset($_GET['user_tree'])){
	echo drawTree($_GET['stage'], $_GET['user_id']);
}

if(isset($_GET['user_info'])) {
	$user = $_GET['user_info']; $data = []; $transactions = [];

	$leg = $pro->stageLeg($user); $le = explode(',', $leg);
	$stage = userName2($user,'stage');
	if($pro->stageTeam($user)==39){$pro->promoteUser($user,$stage);}  

	$data['data'] = [
		'id' => $user,
		'name' => userName2($user),
		'username' => userName2($user,'user')
	];

	$id=userName2($user,'id');
   	$sql = $db->query("SELECT * FROM wallet WHERE id='$id' ORDER BY sn DESC LIMIT 100  "); 
    while($trn = mysqli_fetch_object($sql)) {
        $type = $trn->cos>0 ? 'Credit' : 'Debit';
        $transactions[] = [
        	'date' => date('d/m/y', $trn->ctime),
        	'amount' => $trn->cos,
        	'remark' => $trn->remark,
        	'user' => userName($trn->id).' ('.userName($trn->id,'user') .')',
        	'type' => $type,
        ];
    }


    $stages = [];


     $i = 1;
     while($i<=$stage){
     	$e=$i++;
     	$stages[] = $e;
	} 


	$data['stages'] = $stages;
    $data['transactions'] = $transactions;
    $data['f_st'] = drawTree($stages[0], $user) ?? '';

    echo json_encode($data);

}


if(isset($_GET['level_users'])) {
	$level = $_GET['level_users']; $data = [];
	$sql2 = $db->query("SELECT * FROM user WHERE stage='$level' ORDER BY sn "); 
	while($row = mysqli_fetch_object($sql2)) {
		$team = $pro->stageTeam($row->sn); 
		if($team==39){$pro->promoteUser($row->sn,$row->stage);}

		$data[] = [
			'sn' => $row->sn,
			'id' => $row->id,
			'name' => $row->firstname.' '.$row->lastname,
			'username' => $row->user,
			'stage' => $row->stage,
			'team' => $team,
			'gen' => $row->g
		];
	}
	echo json_encode($data);
}


?>