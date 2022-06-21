<?php
session_start(); ob_start();  
require_once('includes/headerquery.php');
if(!isset($_SESSION['user_id'])){header('location: signin.php');}


if(isset($_GET['verify'])){
	$user = $_GET['verify'];
if(sqL1('user','sn',$user)==1){  
echo '<label>Verified Recipent</label>
<input type="text" class="form-control" value="'.userName2($user).' ['.userName2($user,'user').']" disabled >
<br>
<label>Amount (USD)</label>
<input type="hidden" name="user" id="vuser" value="'.$user.'">
<input type="number" id="amt" class="form-control" name="amount" min="2" max="500" required >';

}else{
	echo 0;
}

}


if(isset($_GET['sendcode'])){
	$user = $_GET['sendcode'];	$amt = $_GET['amt'];
	$_SESSION['t_user']=$user;
	$_SESSION['t_amt']=$amt;
	$_SESSION['t_code']=$pro->win_hash(6);

	echo $_SESSION['t_code'];

$pro->sendAuthCode($_SESSION['t_code']);

echo '<label>RECIPIENT: </label> '.userName2($user).'<hr>
<label>AMOUNT: </label> $'.number_format($amt,2).'<hr>

<input type="hidden" name="user" value="'.$user.'">
<input type="hidden" name="amt" value="'.$amt.'">
<label>Authentication Code </label>
<input type="number" id="code" class="form-control" name="code" required >
Check your registered E-mail for Authentication Code';

}



?>