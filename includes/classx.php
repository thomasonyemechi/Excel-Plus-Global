<?php 
//ini_set('display_errors','off');

if(!isset($_COOKIE['agent'])){
	$agent = substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', 16)), 0, 16);
setcookie('agent', $agent, time() + (86400 * 730), "/"); // 86400 = 1 day
}


if(isset($_SESSION['user_id'])){
	$userkey = $_SESSION['user_id'];
}

class Profile
{
	/* Class constructor */
	function __construct()
	{
		global $report, $count;
		if(array_key_exists('StartSignup', $_POST)) { $this->StartSignup(); }
		if(array_key_exists('PayWithPin', $_POST)) { $this->PayWithPin(); }
		if(array_key_exists('InitialSignup', $_POST)) { $this->signupUserIni(); }
		elseif(array_key_exists('LoginUsers', $_POST)) { $this->LoginUsers(); }
		elseif(array_key_exists('SearchUser', $_POST)) { $this->SearchUser(); }
		elseif(array_key_exists('Logout', $_POST)) { $this->Logout(); }
		elseif (isset($_GET['logout'])){  $this->Logout(); }
		elseif (array_key_exists('buyEpins', $_POST)) { $this->buyEpins(); }
		elseif(array_key_exists('ForgotPassword', $_POST)) { $this->ForgotPassword(); }
		elseif(array_key_exists('UpdateBank', $_POST)) { $this->UpdateBank(); }
		elseif(array_key_exists('UpdateAddress', $_POST)) { $this->UpdateAddress(); }
		elseif(array_key_exists('UpdateUserData', $_POST)) { $this->UpdateUserData(); }


		elseif(array_key_exists('PassReset', $_POST)) { $this->PassReset(); }
		elseif(array_key_exists('UpdateAdminInfo', $_POST)) { $this->UpdateAdminInfo(); }
		elseif(array_key_exists('UpdateUserDetails', $_POST)) { $this->UpdateUserDetails(); }
		elseif(array_key_exists('UpdateUser', $_POST)) { $this->UpdateUser(); }
		elseif(array_key_exists('ChangePassword', $_POST)) { $this->ChangePassword(); }
		elseif(array_key_exists('UpdateUserPass', $_POST)) { $this->UpdateUserPass(); }
		elseif(array_key_exists('EditProfile', $_POST)) { $this->EditProfile(); }
		elseif(array_key_exists('EditUser', $_POST)) { $this->EditUser(); }
		elseif(array_key_exists('UpdatePicture', $_POST)) { $this->UpdatePicture(); }
		elseif(array_key_exists('UpdateUserPicture', $_POST)) { $this->UpdateUserPicture(); }
		elseif(array_key_exists('VerifySponsor', $_POST)) { $this->VerifySponsor(); }
		elseif(array_key_exists('VerifyUser', $_POST)) { $this->VerifyUser(); }
		elseif (array_key_exists('ApprovePackage', $_POST)){ $this->ApprovePackage(); } 
		elseif (array_key_exists('UpdateSetup', $_POST)){$this->UpdateSetup(); }
		elseif(array_key_exists('FundPackage', $_POST)) { $this->FundPackage(); }
		elseif (array_key_exists('FundWallet', $_POST)) { $this->FundWallet();} 
		elseif (array_key_exists('FundWallet2', $_POST)) { $this->FundWallet2();} 
		elseif (array_key_exists('FundWithdrawal', $_POST)) { $this->FundWithdrawal();} 
		elseif (array_key_exists('FundTransfer', $_POST)) { $this->FundTransfer();} 
		elseif (array_key_exists('ApproveFundOrder', $_POST)) { $this->ApproveFundOrder();}
		elseif (array_key_exists('ApproveWithdrawal', $_POST)) { $this->ApproveWithdrawal();}
		elseif (array_key_exists('ReserseWithdrawal', $_POST)) { $this->ReserseWithdrawal();}
		elseif (array_key_exists('DeductFund', $_POST)) { $this->DeductFund();}
		elseif (array_key_exists('SupportTicket', $_POST)) { $this->SupportTicket(); }
		elseif (array_key_exists('SupportTicket2', $_POST)) { $this->SupportTicket2(); }
		elseif(array_key_exists('GetOtp', $_POST)){ $this->GetOtp(); }
		elseif(array_key_exists('SendEnquiry', $_POST)){ $this->SendEnquiry(); }
		elseif(array_key_exists('sendToAllEmail', $_POST)){ $this->sendToAllEmail(); }
		elseif(array_key_exists('requestPayout', $_POST)){ $this->requestPayout(); }
		elseif(array_key_exists('payClient', $_POST)){ $this->payClient(); }
		elseif (array_key_exists('PayProFee', $_POST)){ $this->PayProFee(); }
		elseif(array_key_exists('rechargeFee', $_POST)){ $this->rechargeFee(); }
		elseif(array_key_exists('clientSupport', $_POST)){ $this->clientSupport(); }
		elseif(array_key_exists('Deactivate', $_POST)){ $this->Deactivate(); }


		elseif(array_key_exists('StageSk', $_POST)){ $this->StageSk(); }
		elseif(array_key_exists('RegisterMultiple', $_POST)){ $this->RegisterMultiple(); }
		elseif (isset($_GET['reference'])){ $this->processPay($_GET['reference']); }

			//multiple registration
		elseif (array_key_exists('AddNewUsersAuto', $_POST)) { $this->AddNewUsersAuto($_POST['no']); }
		
		
		return; 
	}
	// wallet remarks and types 
	function walletRemark($code)
	{
		$r = '';

		//Debits all types
		if ($code == 1) { $r = 'Fund Withdrawal'; } 
		elseif ($code == 2) { $r = 'Fund Transfer'; } 
		elseif ($code == 3) { $r = 'PIN Purchase'; 	} 
		elseif ($code == 4) { $r = 'Withdrawal Charges';  } 
		elseif ($code == 5) { $r = 'Auto Registration Charges'; 	} 
		elseif ($code == 6) {
			$r = '';
		} elseif ($code == 7) {
			$r = '';
		} elseif ($code == 8) {
			$r = '';
		} elseif ($code == 9) {
			$r = '';
		} elseif ($code == 10) {
			$r = '';
		}
		//Credit of all types 
		elseif ($code == 11) { $r = 'Referral Bonus'; } 
		elseif ($code == 12) { $r = 'Matrix Bonus';   } 
		elseif ($code == 13) { $r = 'Stepout Bonus';  } 
		elseif ($code == 14) { $r = 'Level Incentive'; 	} 
		elseif ($code == 15) { $r = 'Promotional Bonus'; } 
		elseif ($code == 16) {
			$r = '';
		} elseif ($code == 17) {
			$r = '';
		} elseif ($code == 18) {
			$r = '';
		} elseif ($code == 19) {
			$r = 'Fund Deposit';
		} elseif ($code == 20) {
			$r = 'Funds Received';
		}

		//Staff Credit   
		return $r;
	}


	function AddNewUsersAuto($no){
		global $db, $report, $count;
		$uid = $this->Uid();
		$uidx = userName($uid,'sn');
		$stage = userName($uid,'stage');
		$sponsor = userName($uid,'user');
		
		$pinall = sqL2('pin','rep',$uid,'status',0);
		$cost = $no*0.1; 
		$balance = $this->wallet($uid);
		if($pinall<$no){$report='Insufficient PINs.'; $count=1; return;}
		if($balance<$cost){$report='Insufficient balance to pay service charge of $'.number_format($cost,2); $count=1; return;}
//debit cost
		$this->processWallet($uid,$cost,5,$stage,'Auto Registration Charges',$no);

		$i=1;
		while($i<=$no){ $e=$i++;
			$pickuser = $this->pickUser($sponsor);
			if($this->pickPin($uid,2)==1){$pickpin = $this->pickPin($uid);
				$this->RegisterAuto($sponsor, $pickpin, $pickuser);
			}else{$report = 'Operation incomplete! '.($e-1).' new accounts registered'; return; }
		}

		$report = 'Operation Complete and '.$no.' new accounts registered';
		return;
	}



	function pickUser($username){
		global $db;
		$sql = $db->query("SELECT * FROM user WHERE user LIKE '%$username%' ") or die(mysqli_error());
		$num = mysqli_num_rows($sql);
		return $username.'x'.$num;
	}

	function pickPin($uid,$opt=1){
		global $db;
		$sql = $db->query("SELECT * FROM pin WHERE rep = '$uid' AND status=0 ORDER BY rand() LIMIT 1 ") or die(mysqli_error());
		$row = mysqli_fetch_assoc($sql);
		return $opt==1 ? $row['pin'] : mysqli_num_rows($sql);
	}





	function buyEpins()
	{
		global $report, $count;
		$pin = $_POST['pin'];
		$amt = $pin * REGFEE;
		$uid = $this->Uid();
		$stage = userName($uid,'stage');
		$bal = $this->wallet($uid);
		

		if($amt > $bal){
			$report = "You have insufficient Balance";
			$count = 1;
		}
		else{
			$this->processWallet($uid,$amt,3,$stage,'PIN Purchase',$uid);
			$this->sellEpins($uid,$pin, 'Wallet Pay');
			$report = 'You have Successfully Purchased '. $pin.' PINs';
		} 
		return;
	}

	function SearchUser(){
		global $report, $count;
		$ref = $_POST['fid'];
		if(sqL1('user','user',$ref)==1){ $_SESSION['fid']=sqLx('user','user',$ref,'id'); header('location: searchuser.php'); }
		elseif(sqL1('user','sn',$ref)==1){ $_SESSION['fid']=sqLx('user','sn',$ref,'id');  header('location: searchuser.php'); }
		else{$report = 'You have entered an invalid username/user ID '.$ref; $count=1; }
		return;
	}
	function sellEpins($uid,$qty)
	{
		global $db;
		$i = 1;
		while ($i <= $qty) {
			$e = $i++;
			$pin = $this->win_hash(11);
			$db->query("INSERT INTO pin (pin,rep) VALUES('$pin','$uid')");
		}
		return;
	}

	
	function win_hash($length)
	{
		return substr(str_shuffle(str_repeat('123456789', $length)), 0, $length);
	}
	
	function FundWallet()
	{
		global $db, $report;
		$ctime = time();
		$amount = sanitize($_POST['amount']);
		$date = sanitize($_POST['date']);
		$ref = sanitize($_POST['ref']);
		//photo
		$image_name = $_FILES['photo']['name'];
		$image_loc = $_FILES['photo']['tmp_name'];
		$image_type = $_FILES['photo']['type'];
		$image_size = $_FILES['photo']['size'];
		$ext = explode('.', $image_name);
		$end = strtolower(end($ext));
		if (checkExtension($end)) {
			if (checkSize($image_size)) {
				$new_name = 'px'.time() . '.' . $end;
				
				
				
				$id = $this->Uid();
				$trno = $this->win_hash(12);
				$sql = $db->query("INSERT INTO walletorder (id,trno,amount,date,ref,ctime,photo) VALUES ('$id','$trno','$amount','$date','$ref','$ctime','$new_name') ");  
				move_uploaded_file($image_loc, 'uploads/' . $new_name);
				if($sql){
					$report = 'Fund wallet order submitted';
				}
				return;

			} 
			
		//

			
		}
		# forgotpassword 
	}

	function FundWallet2()
	{
		global $db, $report;
		$ctime = time();
		$amount = sanitize($_POST['amount']);
		$date = sanitize($_POST['date']);
		$ref = sanitize($_POST['ref']).', posted by '.$id = userName($this->Uid(),'user');		
		
		$id = $_SESSION['fid'];
		$trno = $this->win_hash(12);
		$sql = $db->query("INSERT INTO walletorder (id,trno,amount,date,ref,ctime) VALUES ('$id','$trno','$amount','$date','$ref','$ctime') ");  

		if($sql){  $report = 'Fund wallet order submitted';  }
		return;

	} 

	
	function ForgotPassword()
	{
		global $db,$report,$count;
		$user = strtolower(trim(sanitize($_POST['username'])));
		$email = strtolower(trim(sanitize($_POST['email'])));
		$sql=$db->query("SELECT * FROM user WHERE email='$email' AND user='$user'" );
		$row=mysqli_fetch_array($sql);
		$reset_order = $this->win_hash(6);
		$_SESSION['reset'] = $reset_order;
		$find = mysqli_num_rows($sql);
		$ctime = time();
		if($find==0){
			$report='You entere invalid email/username combination.'; 
			$count=1;
		}
		elseif($find==1){
			$sql=$db->query("UPDATE user SET code='$reset_order' WHERE user = '$user' " )or die('Could not initiate password reset');
	    //$report = 'Success! Password reset authentication code have been sent to your email '.$reset_order;
			$message = 'We received a request for change of your password for the following EPG account:<br>
			Name:  '.userName($row['id']).'<br>
			Username:  '.userName($row['id'],'user').'<br><br>
			Use the code below as your authentication code:<br>
			<h2>'.$reset_order.'</h2>
			Do not share this code with any one. EPG will never ask you for your authentication codes.<br><br>
			If you did not initiate this request, kindly ignore the message and report immediately to EPG technical support.<br><br>
			
			Best Regards<br>
			EPG Technical Support<br>
			'.BUSINESS_NAME;

			$subject=BUSINESS_NAME.' Password Recovery';
			$this->emailer($email,$message,$subject);
			$report='A message containing your authentication code have been sent to your email. Use it to complete the operation';
			header('location: reset-password.php');
		}else{
			$report='Password reset request failed'; 
			$count=1; }
			return;
		}


		
		function sendAuthCode($x)
		{
			global $db,$report,$count;
			$id = $this->Uid();
			$amount = $_SESSION['t_amt']??'';
			$user = $_SESSION['t_user']??'';


			$message = 'We received a request for fund transfer with the following transaction detals:<br>
			Sender:  '.userName($id).' ['.userName($id,'user').']<br>
			Recipient:  '.userName2($user).' ['.userName2($user,'user').']<br>
			Amount:  USD'.number_format($amount,2).'<br><br>
			Use the code below as your authentication code:<br>
			<h2>'.$x.'</h2>
			Do not share this code with any one. EPG will never ask you for your authentication codes.<br><br>
			If you did not initiate this request, kindly ignore the message and report immediately to EPG technical support.<br><br>
			
			Best Regards<br>
			EPG Technical Support<br>
			'.BUSINESS_NAME;

			$subject=BUSINESS_NAME.' Transaction Authentication';
			$email = userName($id,'email');
			$this->emailer($email,$message,$subject);
		   // $report='A message containing your authentication code have been sent to your email. Use it to complete the operation';
			return;
		}



		function PassReset(){
			global $db,$report,$count;
			$pwd1 = $_POST['password'];
			$pwd2 = $_POST['password2'];
			$reset_order = $this->win_hash(8);
			$code = $_POST['request_id'];
		if($pwd1==$pwd2){//
			if(sqL1('user', 'code', $code)==1){
				
				$pass = password_hash($pwd1, PASSWORD_BCRYPT);
				$db->query("UPDATE user SET pass='$pass', code='$reset_order' WHERE code = '$code' "); 

				$report = 'Password Successfully Updated! Proceed to login with new password';
			}else{
				$report = 'Incorrect/expired authentication code. Re-try or Request a new code'; 
				$count=1;
			}

		}else{$report='Confirm Password does not match, Try Again'; $count = 1; }
		unset($_SESSION['reset']);
		return;
	}

	function GetOtp()
	{
		global $db,$report,$count;
		$id = $this->Uid();

		$reset = rand(100000,999999);
		$reset_order = sha1($reset);
		$valid = time()+60*18;
		$sql=$db->query("UPDATE user SET code='$reset_order',validity='$valid' WHERE id = '$id' ")or die('Could not initiate authentication');
		$message='You have requested for an authentication code to process a transaction.<br> Your One Time Password is: '.$reset. '<br> Note that the OTP is only valid till '.date('d/m/Y  h:iA', $valid) ;
		$subject=' EPG One Time Password';
		$email = $this->userName4('email');
		$this->emailer($email,$message,$subject);
		$report='We have sent you an e-mail containing your One Time Password. <br>Use the password to authenticate this transaction ';   
		return;
	} 
	function SendEnquiry(){
		global $report;
		
		$name = sanitize($_POST['name']);
		$email = sanitize($_POST['email']);
		$phone = $_POST['phone'];
		$message = sanitize($_POST['message']);
		
		$subject = 'This is an enquiry from'." ". $phone;
		$headers = 'From: '.$name . "\r\n";
		$headers .= 'Reply-To: '.$email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$destination='admin@excelplusglobal.com';
		$send = mail($destination, $subject, $message, $headers);

		$report = "Your message is sent successfully, We will get back to you. ";

		return;

	}
	function verifyOtp($col= ''){
		global $db;
		
		$id = $this->Uid();
		$query = $db->query("SELECT * FROM  user WHERE id = '$id'") or die(mysqli_error());
		$result = mysqli_fetch_array($query);
		if(!empty($result)){
			return $result[$col];
		}else{
			return FALSE;
		}
	} 
	function getSponsor($sponsor)
	{
		global $db;
		$query = $db->query("SELECT * FROM user WHERE sn = '$sponsor'") or die(mysqli_error());
		$result = mysqli_fetch_array($query);
		return $result['firstname']." ". $result['lastname']." "."user ".$result['user']; 
	}  
	

	function FundWithdrawal()
	{
		global $db, $report, $count;
		$ctime = time();
		$amount = $_POST['amount'];
		$charge = 2.5; 
		$total = $amount+$charge; 
		
		$uid = $this->Uid();
		$balance = $this->wallet($uid);
		$stage = userName($uid,'stage');
		$sql = $db->query("SELECT * FROM wallet WHERE id='$uid' AND type=1 AND status<2 ");
		if(mysqli_num_rows($sql)>0){
			$report= "You have pending withdrawal request. ";
			$count=1; 
		}
		elseif($balance < $total){
			$report= "You have insufficient balance. Enter a smaller amount and try again";
			$count=1; 
		}
		elseif($amount<5 OR $amount>1000){
			$report = "You have entered an invalid amount. Acceptable range is 5.00 USDT to 1000 USDT ";
			$count = 1;
		}
		
		else{ $ref = $this->win_hash(12);
			$this->processWallet($uid,$amount,1,$stage,'Fund Withrawal',$ref);
			$this->processWallet($uid,$charge,4,$stage,'Withdrawal Charges ',$ref);
			$db->query("UPDATE wallet SET status=0 WHERE opt='$ref' ");
			$report = 'You have Successfully placed withdrawal request for $'.number_format($amount).'. Your request will be processed and delivered to you within 24 hours';
		}
		return;
	}


	

	function FundTransfer()
	{
		global $db, $report, $count;
		$ctime = time();
		$amount = $_SESSION['t_amt']??'';
		$user = $_SESSION['t_user']??'';
		$coded = $_SESSION['t_code']??'';
		$code = $_POST['code'];
		$rec = userName2($user,'id');
		
		$id = $this->Uid();
		$balance = $this->wallet($id);
		if($coded!=$code OR $amount=='' OR $user=='' OR $coded==''){
			$report= "You have entered an invalid/expired Authentication Code. Re-start the transfer process";
			$count=1;	
		}
		elseif($id==$rec){
			$report= "You cannot transfer funds to yourself";
			$count=1;
		}
		elseif($balance < $amount){
			$report= "You have insufficient balance. Fund your wallet and try again";
			$count=1;
		}
		elseif($amount<2 OR $amount>500){
			$report = "You have entered an invalid amount. Minimum amount is USD2.00";
			$count = 1;
		}
		
		else{
			$this->processWallet($id,$amount,2,'','Fund transfered to '.userName($rec),$rec);
			$this->processWallet($rec,$amount,20,'','Fund received from '.userName($id),$id);
			$report = 'Successfully transfered $'.number_format($amount).' to '.userName($rec);
		}
		return;
	}


	function ApproveFundOrder()
	{
		global $db,$report, $count;
		$userKey = $_POST['ApproveFundOrder'];

		$trno = $_GET['transaction'];
		$amt2 = sanitize($_POST['amt']);
		$amount = sanitize($_POST['amount']);
		$pass = sanitize($_POST['password']);
		$password = $this->userName4('pass');
		$paymentdate = time();
		$remark = "Wallet Funding by Admin";
		$type = 20; //fund by admin.
		$status = 9;
				   #amount2 = is the amount the admin credit into the acount...
		if(!is_numeric($amount)){
			$report="Enter a valid amount";
			$count = 1;
		}
		elseif($amount != $amt2 ){
			$report = "Incorrect amount entered";
			$count = 1;
		}
		elseif(password_verify($pass, $password) && empty($report)){
			$this->processWallet($userKey,$amount,$type,'',$remark,'');
			$db->query("UPDATE walletorder SET approvedate='$paymentdate', amount2='$amount', status='$status' WHERE trno='$trno' ");
			$report = "Wallet Funding successful";
		}else{
			$report = "Authentication failed. try again";
			$count = 1;
		}
		return;
	}
	function ApproveWithdrawal()
	{
		global $db,$report, $count;

		$ref = $_POST['ApproveWithdrawal'];
		$st = sqLx('wallet','opt',$ref,'status')+1;
		if($st<3){
			$db->query("UPDATE wallet SET status='$st' WHERE opt='$ref' ");
			$report = $st==1 ? 'Operation successful, Click pay again to complete' : 'Operation successful';
		}
		return;
	}
	function ReserseWithdrawal()
	{
		global $db,$report, $count;
		$ref = $_POST['ReserseWithdrawal'];

		$db->query("DELETE FROM wallet WHERE opt='$ref' ");
		$report = 'Operation successful';

		return;
	}
	
	function DeductFund()
	{
		global $db,$report, $count;

		$userKey = $_POST['DeductFund'];
		
		$pass = $_POST['password'];
		$paymentdate = time();
		$password = $this->userName4('pass');
		$remark = 'Debit by Admin';
		$type = 1;
		$status = 9;

		$amount = $_POST['amount'];
		
		#should be able to send the money directly to the users account..
		
		if(password_verify($pass, $password)){

			$this->processWallet($userKey,$amount,$type,'',$remark);
			$report = 'successfully deducted NGN'.number_format($amount).' from '.userName($userKey);
		}
		
		else {
			$report = "Authentication failed. try again";
			$count = 1;
		}
		return;
	}
	// dispalys the wallet status messages...
	function walletStatus($status)
	{
		
		if($status==0){$r='<font color="red">Awaiting</font>'; }
		elseif($status==1){$r='<font color="#036">Processing...</font>'; }
		elseif($status==2){$r='<font color="green">Complete</font>'; }
		
		else{$r='<font color="red">Error</font>';}
		return $r;
	}

	function Deactivate(){
		global $db, $report; 
		$fid = $_POST['fid'];
		$status = $_POST['Deactivate'];

		$db->query("UPDATE user SET status='$status' WHERE id='$fid'"); 
		$report = 'Operation successful';
		return;
	}


	function idToPackNo($id)
	{
		global $db;
        	$userpack = $this->sqLz('user','id', $id,'package'); // error log...
        	if(empty($userpack)){
        		return 0;
        	}else{
        		return $this->sqLz('package','keyy', $userpack,'packno'); 
        	}
        }
        function processpoint($spid2, $points, $user1)
        {
        	global $db, $report;
        	$ctime = time();
        	$points=abs($points);
        	$sql = $db->query("INSERT INTO pvalue (id, points, reference, ctime) VALUES('$spid2', '$points', 
        		'$user1', '$ctime')");
        	return ;
        }

        function payClient(){
        	global $db, $report, $count;
        	$id = $_POST['clientid'];
        	$payval = $_POST['payClient'];
        	$ctime = time();
		//update the payorder table 
        	$payout = $db->query("UPDATE payoutorder SET paidstatus='$payval', ctime='$ctime' WHERE id='$id'");
		//$db->query("UPDATE pvalue SET points=0 WHERE id='$id'");
        	$report = 'Client Paid Successfully';

        }
        function requestPayout(){
        	global $db, $report, $count;
        	$uid = $this->Uid(); $ps=0;
        	$totalpv = $this->pvpicker($uid, 'points');
        	if($totalpv>=500){
        		if($totalpv>=71000){$rem = 'NGN3,000,000 Car Fund'; $pv=50000;}
        		elseif($totalpv>=21000){$rem = 'NGN500,000 Expense Paid Trip'; $pv=10000;}
        		elseif($totalpv>=11000){$rem = 'NGN200,000 Educational Support Fund'; $pv=6000;}
        		elseif($totalpv>=5000){$rem = 'NGN100,000 Laptop Fund'; $pv=3000;}
        		elseif($totalpv>=2000){$rem = 'NGN50,000 Phone Bonus'; $pv=1500; }
        		elseif($totalpv>=500){$rem = 'NGN20,000 Cash Incentive'; $pv=500; }
        		
        		$ps = $this->payBonus($rem,$pv);
        	}
        	if($ps==1){$report = 'You have successfully placed order for '.$rem;}
        	else{$report = 'You are currently not yet qualified for an incentive ';}
        	return;
        }

        function payBonus($rem,$pv){
        	global $db, $report, $count;
        	$res = 0;
        	$uid = $this->Uid();
        	$sql = $db->query("SELECT * FROM payoutorder WHERE id ='$uid' AND totalpt = '$pv' ");
        	if(mysqli_num_rows($sql)==0){
        		$db->query("INSERT INTO payoutorder (id,totalpt,remark) VALUES ('$uid','$pv','$rem') "); $res=1;
        	}
        	return $res;
        }
        function idToAccDetails($id, $col){
        	global $db, $report, $count;
        	$sql = $db->query("SELECT * FROM user WHERE id='$id'");
        	$accdetails = $sql->fetch_assoc();
        	return $accdetails[$col];

        }
        function idToName($id, $col='firstname'){
        	global $db; 
        	$sql = $db->query("SELECT * FROM user WHERE id ='$id'");
        	$res = $sql->fetch_assoc();
        	$result = ($col == 'firstname') ? $res['firstname'].' '.$res['lastname'] : $res[$col];
        	return $result;
        }

        function keyToId($sn, $col = 'id')
        {
        	global $db;
        	$que = $db->query("SELECT * FROM user WHERE sn = '$sn' ") or die(mysqli_error());
        	$ro = mysqli_fetch_array($que);
        	return $ro[$col];
        }
        function payoutsum(){
        	global $db; 
        	$id = $this->Uid();
        	$sql= $db->query("SELECT SUM(points) AS pointsum FROM pvalue WHERE id='$id'");
        	$row = $sql->fetch_assoc();
		//print_r(json_encode($row)); exit;
        	$pointsum  = ($row['pointsum']) ? $row['pointsum'] : 0 ;
        	$name = $this->idToName($id);
        	$db->query("UPDATE payoutorder SET name = '$name', totalpt='$pointsum' WHERE id='$id'") or die(mysqli_error());
        }
	//USED ONCE FOR AUTO UPDATE..
// 	function updatePay(){
// 		global $db; 
// 		$sql = $db->query("SELECT * FROM user");
// 		while($row = $sql->fetch_assoc()){
// 			$id = $row['id'];
// 			$db->query("INSERT INTO payoutorder (id) VALUES('$id')");
// 		}

// 	}
        function pvpicker($id, $col){
        	global $db; 
        	$sql = $db->query("SELECT SUM(points) AS points_sum FROM pvalue WHERE id = '$id'");
        	$row = $sql->fetch_assoc();
        	$point = $row['points_sum'];
        	$val = ($col=='')? "": $point;

        	return abs($val);
        }
        function sqLx($table,$col1,$val1,$col)
        {
        	global $db;
        	$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' " )or die(mysqli_error());	
        	$row = mysqli_fetch_assoc($sql); 
        	return $row[$col];
        }
        function sqLz($table,$col1,$val1,$col='')
        {
        	global $db;
        	$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' " )or die(mysqli_error());	
        	$row = mysqli_fetch_assoc($sql); 
        	$val = ($col=='')? "": $row[$col];
        	return $val;
        }
        function adminLevel(){
        	$adminacess = $this->userName4('sn');
        	if($adminacess == 1){return TRUE; }
        	else{return FALSE; }
        }
        function usersLevel(){
        	$useraccess = $this->userName4('sn');
        	if($useraccess != 1){return TRUE; }
        	else{return FALSE; }
        }
        
        function userName($id,$col=''){
        	global $db;

        	$sql = $db->query("SELECT * FROM user WHERE id='$id'");
        	$row = $sql->fetch_assoc();
        	$val = ($col=='')?$row['firstname'].' '.$row['lastname']:$row[$col];
        	return $val;
        }
        function userName4($col = '')
        {
        	global $db, $userkey;

        	$que = $db->query("select * FROM user WHERE id = '$userkey' ") or die(mysqli_error());
        	$ro = mysqli_fetch_array($que);
        	if (!empty($col)) {
        		return $ro[$col];
        	} else {
        		return htmlspecialchars($ro['firstname'] . ' ' . $ro['lastname']);
        	}
        }
        function stageTitle($stage){
        	$res='Basic';
        	if($stage==1){$res='Saphire';}elseif($stage==2){$res='Ruby';}elseif($stage==3){$res='Diamond';}elseif($stage==4){$res='Ambassador';}elseif($stage==5){$res='Prime Ambassador';}
        	return $res;
        }
        function stageLevel($level){
        	$res=0;
        	if($level==1){$res=1;}elseif($level==2){$res=0;}elseif($level==3){$res=1;}elseif($level==4){$res=2;}elseif($level==5){$res=0;}elseif($level==6){$res=1;}elseif($level==7){$res=2;}elseif($level==8){$res=0;}elseif($level==9){$res=1;}elseif($level==10){$res=2;}elseif($level==11){$res=0;}
        	return $res;
        }
        function dataPercent($col=''){
        	global $db;
        	$sql = $db->query("SELECT * FROM compensation ");
        	$result = $sql->fetch_assoc();
        	$value = (!empty($result[$col]));
        	$no = $result['No'];
        	$val = ($no >= 1)? $value ."%" : $value;
        	return $val;
        // if($no >=1 ){ return $value . "%" ; }
        // else{return $value; }
        }
        function userName5($userKey,$col='')
        {
        	global $db;
	   # insert the user_id when invoking the function...
        	$que = $db->query("SELECT * FROM user WHERE id = '$userKey' ") or die(mysqli_error());
        	$ro = mysqli_fetch_array($que);
        	if (!empty($col)) {
        		return $ro[$col];
        	} else {
        		return htmlspecialchars($ro['firstname'] . ' ' . $ro['lastname']);
        	}
        }


        function processWallet($id,$amt,$type,$stage,$remark,$opt='')
        {
        	global $db;
        	$agent = $_COOKIE['agent']??'';
        	if(sqL1('user','sn',$id)==1){$id = userName2($id,'id'); }
        	$ctime = time();
        	$sin = $this->wallet($id);
		$amt = ($type>10) ? $amt : '-'.$amt; //as cos
		$tan = $sin+$amt;
		$trno = $this->win_hash(12);
		
		$identity = $this->Uid();
		if($type<5){$id=$identity;}
		if($amt == 0){}else{
			$sql = $db->query("INSERT INTO wallet (id,trno,sin,cos,tan,type,status,stage,remark,ctime,rep,opt,agent) VALUES ('$id','$trno','$sin','$amt','$tan','$type',2,'$stage','$remark','$ctime','$identity','$opt','$agent') ");
		} 
		return;
	}



	function logAgent(){
		global $db,$report,$count;
		$uid = $this->Uid();
		$agent = $_COOKIE['agent']??'';
		$n = sqL2('agent','id',$uid,'agent',$agent);
		$ctime = time();
	if($agent==''){$this->Logout(); /*report device not recognized*/ }
	if($n==0){
		$db->query("INSERT INTO agent (id,ctime,agent) VALUES ('$uid','$ctime','$agent') ");
	}else{
		$freq = sqLx2('agent','id',$uid,'agent',$agent,'freq')+1;
		$db->query("UPDATE agent SET freq='$freq',ctime='$ctime' WHERE agent='$agent' ");
	}
	return;
}

function authorizeDevice(){

}

function logActivity(){
	//log page,activity,device on every page load and action
}
function updateWalletBal(){
	global $db;
	$sql = $db->query("SELECT * FROM user ");
	while ($row = mysqli_fetch_assoc($sql)) {
		$id=$row['id'];
		$db->query("INSERT INTO walletbal (id) VALUES ('$id')");
	}
	return;
}
function walletdebit($id)
{
	global $db;
	$amt = 0;
	$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type<=10 ");
	$row = mysqli_fetch_assoc($sql);
	$amt = $row['value_sum'];
	
	return abs($amt);
}

function walletadmin($sn)
{
	global $db;
	$amt = 0;
	$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE type= '$sn' ");
	$row = mysqli_fetch_assoc($sql);
	$amt = $row['value_sum'];
	return $amt;
}
	  //wallet credit...
function walletcredit($id)
{
	global $db;
	$amt = 0;
	$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type>=6 ");
	$row = mysqli_fetch_assoc($sql);
	$amt = $row['value_sum'];
	
	return abs($amt);
}
     //wallet credit...
function levelPayout()
{
	global $db;
	$amt = 0;
	$sql = $db->query("SELECT SUM(amount) AS value_sum FROM award ");
	$row = mysqli_fetch_assoc($sql);
	$amt = $row['value_sum'];
	
	return abs($amt);
}

function walletbal($id,$sin,$amt,$tan)
{
	global $db;
	$sql = $db->query("UPDATE walletbal SET sin='$sin', cos='$amt', tan='$tan' WHERE id='$id'");   
	return;
}
	//Wallet....
function wallet($id,$opt=0)
{
	global $db;
	if(strlen($id)<6){return 0; }else{
		$amt = 0;
		$sql = ($opt==0) ? $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' ") : $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type='$opt' ");
		$row = mysqli_fetch_assoc($sql);
		$amt = $row['value_sum'];
		
		return $amt;
	}
}


function pendingWithd($opt=0)
{
	global $db;

	$sql =  $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE type = 1 AND status<2 ");
	$sql2 =  $db->query("SELECT * FROM wallet WHERE type = 1 AND status<2 ");
	$no = mysqli_num_rows($sql2);
	$row = mysqli_fetch_assoc($sql);
	$amt = $row['value_sum'];
	
	return $opt==0 ? $amt : $no;

}

function userIncome($id)
{
	global $db;
	if(strlen($id)<6){return 0; }else{
		$amt = 0;
		$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND cos>1");
		$row = mysqli_fetch_assoc($sql);
		$amt = $row['value_sum'];
		return $amt;
	}
}


function userDebit($id)
{
	global $db;
	if(strlen($id)<6){return 0; }else{
		$amt = 0;
		$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND cos<1");
		$row = mysqli_fetch_assoc($sql);
		$amt = $row['value_sum'];
		return $amt;
	}
}
function cash($id)
	{//tr
		global $db;
		$amt = 0;
		$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type BETWEEN 11 AND 14 ");
		$row = mysqli_fetch_assoc($sql);
		$amt = $row['value_sum'];
		
		return $amt;
	}

	function walletRange($id,$x,$y)
	{
		global $db;
		$sql = $db->query("SELECT SUM(cos) AS value_sum FROM wallet WHERE id = '$id' AND type BETWEEN $x AND $y ");
		$row = mysqli_fetch_assoc($sql);
		$amt = $row['value_sum'];
		
		return $amt;
	}
	
	function UnreadMsg()
	{
		global $db;
		$no=0;
		$sql = $db->query("SELECT * FROM user ");
		while($row = mysqli_fetch_assoc($sql)){ $id=$row['id'];
		if($this->userUnreadMsg($id)>0){ $no += 1; }
	}
	return $no;
}
function userUnreadMsg($id)
{
	global $db;

	$sql = $db->query("SELECT * FROM msg WHERE senderid='$id' AND active<2");
	$no = $sql->num_rows;
	return $no;
}  
function msgStatus($sn,$col='active')
{
	global $db;
	$que = $db->query("SELECT * FROM msg WHERE sn = '$sn' ") or die(mysqli_error());
	$ro = mysqli_fetch_array($que);
	return $ro[$col];
}
function userExist($username)
{
	global $db, $report, $count;
	$sql = $db->query("SELECT * FROM user WHERE user = '$username' ") or die(mysqli_error());
	$num = mysqli_num_rows($sql);
	if ($num == 0) {
		$res = FALSE;
	} else {
		$res = TRUE;
	}
	return $res;
}
function userIdExist($id)
{
	global $db, $report, $count;
	$sql = $db->query("SELECT * FROM user WHERE id = '$id' ") or die(mysqli_error());
	$num = mysqli_num_rows($sql);
	if ($num == 0) {
		$res = FALSE;
	} else {
		$res = TRUE;
	}
	return $res;
}


function uidToSn($uid)
{
	global $db;
    	$usersn = $this->sqLz('user', 'id', $uid, 'sn'); //returns the sn 
    	if(empty($usersn)){
    		return FASLE; 
    	}else{
    		return $usersn;  //returns the sn number 
    	}
    }
    function snToID($usersn)
    {
    	global $db;
    	$userid = $this->sqLz('user', 'sn', $usersn, 'id');
    	$id = $this->Uid();
    	$currentuser = ($userid == $id) ? TRUE : FASLE;
    	return $currentuser;
    }
    function idToUser($id, $col = 'user')
    {
    	global $db;
    	$que = $db->query("SELECT * FROM user WHERE id = '$id' ") or die(mysqli_error());
    	$ro = mysqli_fetch_array($que);
    	return $ro[$col];
    }
    function userToId($user, $col='id')
    {
    	global $db;
    	$que = $db->query("SELECT * FROM user WHERE user = '$user' ") or die(mysqli_error());
    	$ro = mysqli_fetch_array($que);
    	return $ro[$col];
    }
    function SupportTicket()
	{//CTIME
		global $db, $report;
		$msg = addslashes(sanitize($_POST['msg']));
		$ctime = time();
		$id = $this->Uid();
		$msg = $db->query("INSERT INTO msg (senderid,receiverid,msg,ctime)
			VALUES('$id','1','$msg','$ctime')") or die(mysqli_error());
		$report = 'Message sent Successfully, You will get a response soon';
		return;
	} 
	function SupportTicket2()
	{
		global $db,$report;
		$id=$this->userToId($_GET['user']);
		$msg = addslashes(sanitize($_POST['msg']));
		$ctime = time();
		$msg = $db->query("INSERT INTO msg (senderid,receiverid,msg,ctime)
			VALUES('1','$id','$msg','$ctime')") or die(mysqli_error());
		$report = 'Message sent Successfully';
		return;
	} 
	function check_login(){
		if(!isset($_SESSION['user_id'])){
			header('location: login.php'); 
			exit;
		}
		return;
	}
	function EditProfile(){
		global $db;
		$_SESSION['sn'] = $_POST['EditProfile']; 
		return; 
	}
	function EditUser(){
		global $db;
		$_SESSION['fid'] = $_POST['EditUser'];
		header("location: userprofile.php");
		return;
	}

	function VerifySponsor()
	{
		global $db, $report, $count;
		$sponsor = $_POST['username']??'';
		$username = $_SESSION['username']??'';
		//i don't have a sponsor
		$nosponsor = $_POST['nosponsor']??'';
		if(empty($nosponsor) && empty($sponsor)){
			header('location: sponsor.php');
			$report = 'Enter Sponsor or tick I dont have sponsor'; $count=1;
		}

		if($sponsor == $username){
			$report = "You can't Sponsor yourself";
			$count = 1;
		}
		elseif($sponsor != $username && $sponsor != ''){
			$sql = $db->query("SELECT * FROM user WHERE user='$sponsor' LIMIT 1");
			$result = $sql->fetch_assoc();
			
			if($sql->num_rows == 1 AND !is_null($result['package'])){
				$sponsorid = $result['sn'];
				$query = $db->query("UPDATE user SET sponsor = '$sponsorid' WHERE user= '$username'");
				$_SESSION['report1'] = "Congratulation!! Sponsor Verified. Please Login";
				header('location: login.php');
			}else{
				$report  = "Invalid Sponsorid";
				$count = 1;
			}
		}
		elseif($nosponsor == 'nosponsor'){
			$sqlquery = $db->query("UPDATE user SET sponsor = 1 WHERE user='$username'");
			$_SESSION['report1'] = "Congratulation!! Sponsor Verified. Please Login";
			header('location: login.php');
		}
		return ;
	}
	
	function VerifyUser()
	{
		global $db, $report, $count;
		$rec = $_POST['rec']??'';
		if(sqL1('user','user',$rec)==1){
			$rec = sqLx('user','user',$rec,'id');
			if($rec==$this->Uid()){
				$report = 'Invalid Username. Try again';	$count=1;
			}else{
				$_SESSION['rec'] = $rec;
				$report = 'Username successfully verified';
			}
		}
		else{
			$report = 'Invalid Username. Try again';	$count=1;
		}
		return ;
	}
	
	function RegisterMultiple(){
		$no = $_POST['no'];
		$sp = $_POST['sp'];
		$i=1; 
		while($i<=$no){ $e=$i++;
			$this->signupUserIni($sp);	
		}
		return;
	}


	function StartSignup(){
		global $report, $count;
		$_SESSION['firstname'] = sanitize($_POST['firstname']);
		$_SESSION['lastname'] = sanitize($_POST['lastname']);
		$_SESSION['email'] = sanitize($_POST['email']);
		$_SESSION['phone'] = sanitize($_POST['phone']);
		$_SESSION['sex'] = sanitize($_POST['sex']);
		$_SESSION['ref'] = sanitize($_POST['ref']);
		$_SESSION['password'] = sanitize($_POST['password']);
		$_SESSION['username'] = sanitize($_POST['username']) ; 
		if(sqL1('user','sn',$_SESSION['ref'])==0){ $_SESSION['ref']=1; }

		if(sqL1('user','user',$_SESSION['username'])==1){ $report = 'This username already exist, try another one '; $count=1; }
		elseif(strlen($_SESSION['password'])<6){$report = 'Password too short. Password must not be less than 6 characters'; $count=1; }
		else{
			$_SESSION['signup']=1;
		}
		return;
	}

	function PayWithPin(){
		global $report, $count;
		$pin= 26632; //$_POST['pin'];
		// if(sqL2('pin','pin',$pin,'status',0)==0){ $report = 'You have entered an used/invalid PIN, try another one '; $count=1; }
		// else{
			$this->signupUserIni($pin);
		// }
		return;
	}


	function signupUserIni($pin)
	{
		global $db, $report, $count;

		$firstname = $_SESSION['firstname'];
		$lastname =$_SESSION['lastname'];
		$email = $_SESSION['email'];
		$phone = $_SESSION['phone'];
		$user = $_SESSION['username'];
		$password  = $_SESSION['password'];
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$sex  = $_SESSION['sex'];
		$sponsor  = $_SESSION['ref'];


		$upline = $this->findUpline($sponsor);
		$que = $db->query("SELECT * FROM user WHERE sn = '$upline' ") or die(mysqli_error());
		$ro = mysqli_fetch_array($que);
		$a1 = $ro['sn'];
		$a2 = $ro['a1'];
		$a3 = $ro['a2'];
		$a4 = $ro['a3'];
		$a5 = $ro['a4'];
		$a6 = $ro['a5'];
		$a7 = $ro['a6'];
		$a8 = $ro['a7'];
		$g = $ro['g']+1;
//$firstname = getName(); 
		$id = $this->win_hashs(8);
		$sql = $db->query("INSERT INTO user(id,firstname,lastname,email,phone,sex,user,pass,sponsor,a1,a2,a3,a4,a5,a6,a7,a8,g,pin)
			VALUES('$id','$firstname','$lastname','$email','$phone','$sex','$user','$pass','$sponsor','$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$g', '$pin')") or die('Cannot Connect to Server'); 
		unset($_SESSION['signup']);
		$active = sqL1('user','a1',$upline);
		$sp = sqL1('user','sponsor',$sponsor);
		$ctime = time();
		$level = $active==2 ? 1 : 0 ;
		$db->query("UPDATE user SET active='$active',level='$level' WHERE sn='$upline' "); 
		$db->query("UPDATE user SET sp='$sp' WHERE sn='$sponsor' "); 
		//$db->query("UPDATE pin SET status=1,id='$id',used='$ctime' WHERE pin='$pin' "); 

		$level = userName2($sponsor,'level');
		$this->processWallet($sponsor,1.3,11,$level,'Referral Bonus',$id);


		$up2 = sqLx('user','sn',$upline,'a1'); $up2id = userName($up2,'id');
		$active2 = sqL1('user','a2',$up2);
		if($active2==4){$db->query("UPDATE user SET level=2,stage=2 WHERE sn='$up2' ");
		$stage = userName2($up2,'stage');
		$this->processWallet($up2,3,13,$stage,'Stage 1 Stepout Bonus',$id);
		$team = $this->stageTeam($up2);//
		if($team>0){$pbonus = $team*3; $this->processWallet($up2,$pbonus,12,$stage,'Stage 2 Matrix Bonus',$id);  }
		$i=1; $sn = $up2; 
		while($i<=6){ $e=$i++;  $type=12;
			$sn = sqLx('user','sn',$sn,'a1'); if($sn>0){ 
				$snstage = sqLx('user','sn',$sn,'stage'); $level = userName2($sn,'stage');
				if($snstage==2 AND sqL2('wallet','id',$sn,'type',$type)<14){$this->processWallet($sn,3,$type,$level,'Stage 2 Matrix Bonus',$up2id);  }
			}
		}
		$this->updateLevel($upline);
	}
	$this->emailerAllNew($email,$firstname);

	$report = 'Registration Successful. Placed directly under '.userName2($upline,'user');	
	return;
}





function RegisterAuto($sponsor, $pin, $user)
{
	global $db, $report, $count;

	$sql = $db->query("SELECT * FROM user WHERE user = '$sponsor' ") or die(mysqli_error());
	$row = mysqli_fetch_array($sql);

	$firstname = $row['firstname'];
	$lastname = $row['lastname'];

	$phone = $row['phone'];
	$email = $row['email'];

	$sex = $row['sex'];
	$state = $row['state'];
	$address = $row['state'];
	$country = $row['country'];
	$pass = $row['pass'];

	
	$sponsor = sqLx('user','user',$sponsor,'sn');


	$upline = $this->findUpline($sponsor);
	$que = $db->query("SELECT * FROM user WHERE sn = '$upline' ") or die(mysqli_error());
	$ro = mysqli_fetch_array($que);
	$a1 = $ro['sn'];
	$a2 = $ro['a1'];
	$a3 = $ro['a2'];
	$a4 = $ro['a3'];
	$a5 = $ro['a4'];
	$a6 = $ro['a5'];
	$a7 = $ro['a6'];
	$a8 = $ro['a7'];
	$g = $ro['g']+1;

	$id = $this->win_hashs(9);
	$sql = $db->query("INSERT INTO user(id,firstname,lastname,email,phone,sex,address,state,country,user,pass,sponsor,a1,a2,a3,a4,a5,a6,a7,a8,g,pin,a)
		VALUES('$id','$firstname','$lastname','$email','$phone','$sex','$address','$state','$country','$user','$pass','$sponsor','$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$g', '$pin','$sponsor')") or die('Cannot Connect to Server'); 
	unset($_SESSION['signup']);
	$active = sqL1('user','a1',$upline);
	$sp = sqL1('user','sponsor',$sponsor);
	$ctime = time();
	$level = $active==3 ? 1 : 0 ;
	$db->query("UPDATE user SET active='$active',level='$level' WHERE sn='$upline' "); 
	$db->query("UPDATE user SET sp='$sp' WHERE sn='$sponsor' "); 
	$db->query("UPDATE pin SET status=1,id='$id',used='$ctime' WHERE pin='$pin' "); 

	$level = userName2($sponsor,'level');
	$this->processWallet($sponsor,1.3,11,$level,'Referral Bonus',$id);


	$up2 = sqLx('user','sn',$upline,'a1'); $up2id = userName($up2,'id');
	$active2 = sqL1('user','a2',$up2);
	if($active2==9){$db->query("UPDATE user SET level=2,stage=2 WHERE sn='$up2' ");
	$stage = userName2($up2,'stage');
	$this->processWallet($up2,3,13,$stage,'Stage 1 Stepout Bonus',$id);
	$team = $this->stageTeam($up2);
	if($team>0){$pbonus = $team*3; $this->processWallet($up2,$pbonus,12,$stage,'Stage 2 Matrix Bonus',$id);  }
	$i=1; $sn = $up2; 
	while($i<=6){ $e=$i++;  $type=12;
		$sn = sqLx('user','sn',$sn,'a1'); if($sn>0){ 
			$snstage = sqLx('user','sn',$sn,'stage'); $level = userName2($sn,'stage');
			if($snstage==2 AND sqL2('wallet','id',$sn,'type',$type)<39){$this->processWallet($sn,3,$type,$level,'Stage 2 Matrix Bonus',$up2id);  }
		}
	}
	$this->updateLevel($upline);
}
//$this->emailerAllNew($email,$firstname);

	// $report = 'Registration Successful. Placed directly under '.userName2($upline,'user');	
return;
}





function RegisterAutox($sponsor, $pin, $username)
{
	global $db, $report, $count;
        //$username = $this->userAlt($user);
	$sponsorkey = $this->userToKey($sponsor);
	$sql = $db->query("SELECT * FROM user WHERE user = '$sponsor' ") or die(mysqli_error());
	$row = mysqli_fetch_array($sql);

	$firstname = $row['firstname'];
	$lastname = $row['lastname'];

	$phone = $row['phone'];
	$email = $row['email'];
	
        //$username = $this->getNewUser($sponsor);//['username'];
	$gender = $row['sex'];
	$state = $row['state'];
	$country = $row['country'];
	$pwd = $row['pass'];
        // $password2 = $_SESSION['password2'];
        // $pwd = password_hash($password, PASSWORD_BCRYPT);
        // $pin = $_SESSION['pin'];
	$upline = $this->findUpline($sponsor);
	$que = $db->query("SELECT * FROM user WHERE sn = '$upline' ") or die(mysqli_error());
	$ro = mysqli_fetch_array($que);
	$a1 = $ro['sn'];
	$a2 = $ro['a1'];
	$a3 = $ro['a2'];
	$a4 = $ro['a3'];
	$a5 = $ro['a4'];
	$a6 = $ro['a5'];
	$a7 = $ro['a6'];
	$a8 = $ro['a7'];
	$a9 = $ro['a8'];
	$a10 = $ro['a9'];
	$a11 = $ro['a10'];
	$a12 = $ro['a11'];
	$a13 = $ro['a12'];
	$a14 = $ro['a13'];
	$a15 = $ro['a14'];
	$a16 = $ro['a15'];
	$a17 = $ro['a16'];
	$a18 = $ro['a17'];
	$a19 = $ro['a18'];
	$a20 = $ro['a19'];
	$a21 = $ro['a20'];
	$a22 = $ro['a21'];
	$a23 = $ro['a22'];
	$a24 = $ro['a23'];
	$a25 = $ro['a24'];
	$a26 = $ro['a25'];
	$a27 = $ro['a26'];
	$a28 = $ro['a27'];
	$a29 = $ro['a28'];
	$a30 = $ro['a29'];
	$g = $ro['g']+1;
	$mm = date('Ym');


	$id = $this->win_hashs(8);
//indicate auto reg
	$reg = $db->query("INSERT INTO user (id,sponsor,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13,a14,a15,a16,a17,a18,a19,a20,a21,a22,a23,a24,a25,a26,a27,a28,a29,a30,firstname,lastname,phone,email,sex,state,country,user,pass,pin,mm,g,a)
		VALUES('$id','$sponsorkey','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$firstname','$lastname','$phone','$email','$gender','$state',',$country','$username','$pwd','$pin','$mm','$g',1)") or die('Cannot Connect to Server');

	$used = date('Y-m-d H:i');
	$sql = $db->query("UPDATE pin SET status = 1, id = '$username', used = '$used' WHERE pin = '$pin' ");  

	$nd = $this->active($upline);
	$db->query("UPDATE user SET active='$nd' WHERE sn = '$upline' ");

	$sp = sqL1('user','sponsor',$sponsorkey);
	$db->query("UPDATE user SET sp='$sp' WHERE sn = '$sponsorkey' ");
	
	if($this->level1($a1)==1){ $this->levelUpdate($this->idToKey($id)); }
	
//$this->emailer($email);
	return;
}







function updateLevel($sn){
	global $db;
	$key = $sn;  
	$i=1;
	while($i<5){ $e=$i++; 
		$sn = sqLx('user','sn',$sn,'a1');
		$stage = sqLx('user','sn',$sn,'stage');
		if($sn>0 AND $stage>1){
			$this->promoteUser($sn,$stage);

		}else{return; }
	}
	return;
}

function promoteUser($sn,$stage){
	global $db;
	$ulevel = sqLx('user','sn',$sn,'level');
	$base = $this->stageToEven($stage);  
	$team = $this->stageTeam($sn);
	$level = $ulevel;
	if($team==14){$level=$base+3; $stage=$stage+1;}elseif($team>11){$level=$base+2;}elseif($team>2){$level=$base+1;}

	if($level>$ulevel){$db->query("UPDATE user SET level='$level',stage='$stage' WHERE sn='$sn' "); 
	$id = userName2($sn,'id');
	if($level==6){$this->processWallet($sn,25,14,$stage,'Food Voucher',$id); }
	if($level==7){$this->processWallet($sn,125,14,$stage,'Smart Phone Incentive',$id); $this->processWallet($sn,25,14,$stage,'Food Voucher',$id); $this->processWallet($sn,250,14,$stage,'Laptop Incentive',$id); }
	if($level==9){$this->processWallet($sn,125,14,$stage,'Welfare Fund',$id); }
	if($level==10){$this->processWallet($sn,1250,14,$stage,'International Trip',$id); }
	if($level==5 OR $level==8 OR $level==11){ $this->payStageBonuses($sn,$stage); }
}

}




function payStageBonuses($sn,$stage){
	//user bonus = incentive + stepout bonuses
	$ssn = $sn; $userbonus3=0;
	if($stage==3){$userbonus=13.75; $userbonus2= 7.5; $upbonus = 15; }elseif($stage==4){$userbonus = 6250; $userbonus2 = 125; $userbonus3 = 125; $upbonus = 175; }elseif($stage==5){$userbonus = 12500; $upbonus = 1000; }
	$id = userName2($sn,'id'); 
	$level = userName2($sn,'level');  $stt = $stage-1;
	$this->processWallet($sn,$userbonus,13,$stt,'Stage '.$stt.' Stepout Bonus',$id);
	$this->processWallet($sn,$userbonus2,13,$stt,'Stage '.$stt.' Stepout Bonus',$id);
	if($userbonus3>0){$this->processWallet($sn,$userbonus3,13,$stt,'Stage '.$stt.' Stepout Bonus',$id); }
	$team = $this->stageTeam($sn);
	if($team>0){$pbonus = $team*$upbonus; $this->processWallet($sn,$pbonus,12,$stage,'Stage '.$stage.' Matrix Bonus',$id);  }
	$i=1;  $lim = $stage==3 ? 4 : 3;
	while($i<=$lim){$e=$i++; 
		$sn = sqLx('user','sn',$sn,'a1'); $level = userName2($sn,'level');  $snstage = sqLx('user','sn',$sn,'stage'); 
		if($sn>0 AND $snstage==$stage){$this->processWallet($sn,$upbonus,12,$snstage,'Stage '.$stage.' Matrix Bonus',$id);  }
	}

	return;
}


function userTeam($sn){
	global $db;
	$sql = $db->query("SELECT * FROM user WHERE a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn' OR a5='$sn' OR a6='$sn' "); 
	return mysqli_num_rows($sql);
}

function stageTeam($sn){
	global $db;
	$stage = sqLx('user','sn',$sn,'stage');
	if($stage==1){$sql = $db->query("SELECT * FROM user WHERE a1='$sn' OR a2='$sn' "); }elseif($stage==2){$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn' OR a5='$sn' OR a6='$sn') AND stage>='$stage' LIMIT 14 "); }elseif($stage==3){$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn') AND stage>='$stage' LIMIT 14 "); }else{$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn') AND stage>='$stage' LIMIT 14 "); }
	return mysqli_num_rows($sql);
}

function stageLeg($sn){
	global $db;
	$stage = sqLx('user','sn',$sn,'stage');
	if(isset($_SESSION['stage'])){ if($_SESSION['stage']<$stage){$stage = $_SESSION['stage']; }  }
	$leg = $sn.',';
	if($stage==1){$sql = $db->query("SELECT * FROM user WHERE a1='$sn' OR a2='$sn' "); }elseif($stage==2){$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn' OR a5='$sn' OR a6='$sn') AND stage>='$stage' LIMIT 14 "); }elseif($stage==3){$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn') AND stage>='$stage' LIMIT 14 "); }else{$sql = $db->query("SELECT * FROM user WHERE (a1='$sn' OR a2='$sn' OR a3='$sn') AND stage>='$stage' LIMIT 14 "); }

	while($row = mysqli_fetch_assoc($sql)){$leg .= $row['sn'].','; }
	return $leg; 
}


function gFirst(){
	global $db;
	$x='';
	$i=1; while($i<12){ $e=$i++;
		$sql = $db->query("SELECT * FROM user WHERE g='$e' ORDER BY sn ASC LIMIT 1 ");
		$row = mysqli_fetch_assoc($sql);
		$x .= $row['sn'].', ';
	}
	return $x; 
}

function StageSk(){
	$_SESSION['stage'] = $_POST['StageSk'];
}

function stageToEven($stage){

	if($stage==7){$bl=17;}
	elseif($stage==6){$bl=14;} 
	elseif($stage==5){$bl=11;}
	elseif($stage==4){$bl=8;}
	elseif($stage==3){$bl=5;}
	elseif($stage==2){$bl=2;}
	elseif($stage==1){$bl=0;}
	else{$bl=0;}
	return $bl; 
}





function findUpline($sn){
	global $db;
	$sql = $db->query("SELECT * FROM user WHERE (sn='$sn' OR a1='$sn' OR a2='$sn' OR a3='$sn' OR a4='$sn' OR a5='$sn' OR a6='$sn' OR a7='$sn' OR a8='$sn') AND active<2 ORDER BY g ASC,sn ASC LIMIT 1 ");
	$row = mysqli_fetch_assoc($sql);
	return $row['sn'];
}


function uplineId($id){
	if($id==''){$sponsorid=''; }else{
		$key =  $this->sqLx('user','id',$id,'sponsor');
		$sponsorid = $key>0 ? $this->sqLx('user','sn',$key,'id') : ''; }
		return $sponsorid;
	}
	
	
	
	
	
	function LoginUsersApp()
	{
		global $db, $report, $count;
		$username = strtolower(sanitize($_POST['username']));
		$password = $_POST['password'];

		$sql = $db->query("SELECT * FROM user WHERE user='$username' ");
		if (mysqli_num_rows($sql) == 1) {
			$row = mysqli_fetch_array($sql);
			$status = $row['status'];
			$adminuser = $row['sn'];
			$checksp = $row['id'];
			if (password_verify($password, $row['pass'])) {
				if ($status == 1 && $adminuser != 1) {
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['report'] = "Welcome to your dashboard";
					//setcookie('username', $username, time() + (86400 * 3), "/");
					header('location: ../dashboard.php');
					$query = $db->query("SELECT * FROM user WHERE id='$checksp'");
					$result = $query->fetch_assoc();
					if($result['sponsor'] == 0 && $adminuser != 1){
						$_SESSION['username'] = $result['user'];
						header('location: sponsor.php');
					}
				}elseif($status == 1 && $adminuser == 1){
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['report'] = "Welcome to your dashboard";
					//setcookie('username', $username, time() + (86400 * 3), "/");
					header('location: ../admin-dashboard.php');   
				}
				else {
					$report = 'Your user account has been deactivated, 
					contact the system administrator ';
					$count = 1;
				}
			}else {
				$report = 'Invalid Login details, Try again.';
				$count = 1;
			}
		} 
		
		else {
			$report = 'Invalid Login details, Try again';
			$count = 1;
		}
		
		return;
	}
	
	

	function updateUplines($sn){
		global $db;
		$key=$sn;
		$i=1;
		while($i<=8){ $e=$i++;    $a = 'a'.$e;
		$sn = $this->sqLz('user','sn', $sn,'a1');
		if($sn==0){return; }
		$db->query("UPDATE user SET $a='$sn' WHERE sn='$key' ");
	}
	return;
}	



function updateSponsors(){
	global $db;

	$i=1;
	$sql = $db->query("SELECT * FROM user ");
	while($row = mysqli_fetch_array($sql)){ $sn = $row['sn']; $sp = sqL1('user','sponsor',$sn);  
	$db->query("UPDATE user SET sp='$sp' WHERE sn='$sn' ");
}
return;
}

function updateActive(){
	global $db;

	$i=1;
	$sql = $db->query("SELECT * FROM user ");
	while($row = mysqli_fetch_array($sql)){ $sn = $row['sn'];  
	$act = sqL1('user','a1',$sn);
	$db->query("UPDATE user SET active='$act' WHERE sn='$sn' ");
}
return;
}


function updateAllUplines(){
	global $db;
	if(sqL1('user','a1',0)>0){
		$sql = $db->query("SELECT * FROM user WHERE a1=0 ");
		while($row = mysqli_fetch_array($sql)){ $sn = $row['sn'];
		$this->updateUplines($sn);
	}
}
return;
}	

function LoginUsers()
{
	global $db, $report, $count;
	$username = strtolower(sanitize($_POST['username']));
	$password = $_POST['password'];

	$sql = $db->query("SELECT * FROM user WHERE user='$username' ");

	if (mysqli_num_rows($sql) == 1) {
		$row = mysqli_fetch_array($sql);
			//$status = $row['status'];
			// $adminuser = $row['sn'];
			// $checksp = $row['id'];
		if (password_verify($password, $row['pass'])) {
			
			$_SESSION['user_id'] = $row['id'];
					//$_SESSION['report'] = "Welcome to your dashboard";
			$this->logAgent();
			header('location: ./');   
			
		}else {
			$report = 'Invalid Login details, Try again.';
			$count = 1;
		}
	} 
	
	else {
		$report = 'Invalid Login details, Try again';
		$count = 1;
	}

	return;
}





function Logout(){
	$_SESSION['user_id'] == '';
	$_SESSION['report'] = "You have logged out successfully";
	unset($_SESSION['user_id']);
	header('location: signin.php');
}
function Uid(){
	$uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
	return $uid;
}
function Fid(){
	$fid = $_SESSION['fid']??0;
	return $fid;
}
function win_hashs($length){
	return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
}
function valEmpty($field, $fname)
{
	global $report, $count;
	$field = sanitize(trim($field));
	if ($field == '') {
		$report .= "<br>" . $fname . " field is required! ";
		$count = 1;
		return;
	} elseif (strlen($field) < 3) {
		$report .= "<br>" . $fname . " entered is too short! ";
		$count = 1;
		return;
	} else {
		return $field;
	}
}
function valPass($field)
{
	global $report, $count;
	if ($field == '') {
		$report .= "<br>Password field is required! ";
		$count = 1;
		return;
	} elseif (strlen($field) < 4) {
		$report .= "<br>Password cannot be less than 6 characters! ";
		$count = 1;
		return;
	} else {
		return sanitize($field);
	}
	}// end of a Valpass

	function valPhone($field)
	{
		global $db, $report, $count;
		$field = sanitize(trim($field));
		$query =$db->query("SELECT * FROM user");
		$result = $query->fetch_assoc();
		if($result['phone'] == $field){
			$report = 'This phone number is already existing';
			$count = 1;
		}
		elseif($field == '') {
			$report .= "<br>Phone Number field is required! ";
			$count = 1;
			return;
		} elseif(strlen($field) < 11) {
			$report .= "<br>Phone Number entered is invalid! ";
			$count = 1;
			return;
		} else {
			return $field;
		}
	}

	function myTeam($sn){
		global $db;
		$t=$sn;
		$sql=$db->query("SELECT * FROM user WHERE sponsor='$sn' " )or die(mysqli_error());
		while($row=mysqli_fetch_array($sql)){ 
			$t .= $row['sn'].',';

		}
		return $t;
	}


	//AdminUser update access....
	function UpdateAdminInfo()
	{
		global $db, $report, $count;

		$id = $_SESSION['sn'];
		$firstname = sanitize($_POST['firstname']);
		$lastname = sanitize($_POST['lastname']);
		$username = sanitize($_POST['username']);
		$email = sanitize($_POST['email']);
		$phone = sanitize($_POST['phone']);
		$sex = sanitize($_POST['sex']);
		$dob = sanitize($_POST['dob']);
		$city = sanitize($_POST['city']);
		$address = sanitize($_POST['address']);
		$state = sanitize($_POST['state']);
		$country = sanitize($_POST['country']);
		$bank = sanitize($_POST['bank']);
		$accname = sanitize($_POST['accname']);
		$accno = sanitize($_POST['accountno']);

		$query = ("UPDATE user SET firstname='$firstname', lastname='$lastname', 
			email='$email', phone='$phone', sex='$sex', dob='$dob', city='$city', address='$address', 
			states='$state', country='$country', bank='$bank', accountno='$accno', accname='$accname',
			user='$username'
			WHERE sn='$id'") or die('error');

		if ($db->query($query) === TRUE) {
			unset($_SESSION['sn']);
			$report = "Profile Updated Successfully";
		}else{
			$report = "Invalid data submitted!! please try again.";
			$count = 1;   
		}
		return; 

	}
	#User additional details update
	function UpdateUserDetails(){
		global $db, $report, $count;
		$id = $_SESSION['sn'];
		
		$address = sanitize($_POST['address']);
		$city = sanitize($_POST['city']);
		$dob = sanitize($_POST['dob']);
		$bank = sanitize($_POST['bank']);
		$accname = sanitize($_POST['accname']);
		$accno = sanitize($_POST['accountno']);
		
		$query = ("UPDATE user SET dob='$dob', address='$address', city='$city', bank='$bank', accountno='$accno', accname='$accname' WHERE sn='$id'") or die('error');
		if($db->query($query) === TRUE) {
			unset($_SESSION['sn']);
			$report = "Profile updated successfully"; 
		}
		else{
			$report = "Profile not Updated Successfully";
			$count = 1;   
		}
		return; 

	}
	#User additional details update
	function UpdateBank(){
		global $db, $report, $count;
		$uid = $this->Uid();
		
		$bank = sanitize($_POST['bank']);
		$accname = sanitize($_POST['accname']);
		$accountno = sanitize($_POST['accountno']);
		
		
		$sql = $db->query("UPDATE user SET bank='$bank', accountno='$accountno', accname='$accname' WHERE id='$uid' ") or die('error');

		$report = "Profile information updated successfully"; 
		
		return; 

	}
	#User additional details update
	function UpdateAddress(){
		global $db, $report, $count;
		$uid = $this->Uid();
		
		//$bank = sanitize($_POST['bank']);
		$address = sanitize($_POST['address']);
		$country = sanitize($_POST['country']);
		
		
		$sql = $db->query("UPDATE user SET address='$address', country='$country' WHERE id='$uid' ") or die('error');

		$report = "Profile information updated successfully"; 
		
		return; 

	}

	#User additional details update
	function UpdateUserData(){
		global $db, $report, $count;
		$fid = $this->Fid();
		
		//$bank = sanitize($_POST['bank']);
		$firstname = sanitize($_POST['firstname']);
		$lastname = sanitize($_POST['lastname']);
		$user = sanitize($_POST['user']);
		$email = sanitize($_POST['email']);
		$phone = sanitize($_POST['phone']);

		if(sqL1('user','user',$user)==1 AND $user!=userName($fid,'user')){
			$report = 'The username you entered already exist, try another'; $count=1; return;
		}
		
		
		$sql = $db->query("UPDATE user SET firstname='$firstname', lastname='$lastname', user='$user', phone='$phone', email='$email' WHERE id='$fid' ") or die('error');

		$report = "Profile information updated successfully"; 
		
		return; 

	}

	function sendToAllEmail()
	{

		global $db,$report;

		$message = addslashes($_POST['message']);
		$subject = $_POST['subject'];

		if(empty($message)){
			$report = "Compose your message before pressing the submit button";
			$count = 1;
         # style the $subject variable for the message look beautiful..
		}else{
			$i=1;
			$sql=$db->query("SELECT * FROM user" )or die(mysqli_error());
			while($row=mysqli_fetch_array($sql)){ 
				$e=$i++;
				$email = $row['email'];
				$this->emailer($email,$message,$subject);
			}
			$report = 'Email Message successfully sent to all clents: '.$e.' recipients';
		}
		return;
	}
	
	function emailer($email, $message, $subject)
	{
		global $firstname;
		$headers = 'From:   Excel Plus Global<support@excelplusglobal.com>' . "\r\n";
		$headers .= 'Reply-To: support@excelplusglobal.com' . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$send = mail($email, $subject, $message, $headers);
		return;
	}

	function emailerAllNew($email,$name)
	{   
		$headers = 'From:  Excel Plus Global <support@excelplusglobal.com>' . "\r\n";
		$headers .= 'Reply-To: support@excelplusglobal.com' . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$subject = 'Welcome to Excel Plus Global';
		$mailmessage = "<p>Welcome " . ucwords($name) . '!<br>
		Congratulation! You have successfully signed up with THE Excel Plus Global.<br>
		Excel Plus Global (EPG) is a community of Entrepreneurs, inspired and motivated enough to create wealth for themselves and to help others achieve same. <br>As Member of Excel Plus Global, you will have access to our Empowerment skill Aquision program, we train you to be Boss of your own.<br>
		We are a group of Entrepreneurs and Empowerment oriented people of like minds who believe that anyone can have and build a successful business online and offline. So as a community, we have General Skill and Special Skill. We train you in any our general Skills at the point of entry as a member. You will qualify to learn any of our special Skill program when you complete stage 3 level 2.  So far it has been testimony upon testimony impacting and building life and producing outstanding results.<br><br>
		Login to your account using your username and password at
		https://excelplusglobal.com/login.php </p>';
		$send = mail($email, $subject, $mailmessage, $headers);
		return;
	}


	function emailerAl($email,$username,$password)
	{
		
		$headers = 'From: '.EMAIL_FROM_NAME.' <'.EMAIL_FROM_ADDR.'>' . "\r\n";
		$headers .= 'Reply-To: '.EMAIL_FROM_ADDR . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";


		$subject = 'WELCOME TO '.BUSINESS_NAME;
		$mailmessage = 
		'<!doctype html>
		<html>
		<head>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Simple Transactional Email</title>
		<style>
		/* -------------------------------------
		INLINED WITH htmlemail.io/inline
		------------------------------------- */
		/* -------------------------------------
		RESPONSIVE AND MOBILE FRIENDLY STYLES
		------------------------------------- */
		@media only screen and (max-width: 620px) {
			table[class=body] h1 {
				font-size: 28px !important;
				margin-bottom: 10px !important;
			}
			table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
				font-size: 16px !important;
			}
			table[class=body] .wrapper,
			table[class=body] .article {
				padding: 10px !important;
			}
			table[class=body] .content {
				padding: 0 !important;
			}
			table[class=body] .container {
				padding: 0 !important;
				width: 100% !important;
			}
			table[class=body] .main {
				border-left-width: 0 !important;
				border-radius: 0 !important;
				border-right-width: 0 !important;
			}
			table[class=body] .btn table {
				width: 100% !important;
			}
			table[class=body] .btn a {
				width: 100% !important;
			}
			table[class=body] .img-responsive {
				height: auto !important;
				max-width: 100% !important;
				width: auto !important;
			}
		}

		/* -------------------------------------
		PRESERVE THESE STYLES IN THE HEAD
		------------------------------------- */
		@media all {
			.ExternalClass {
				width: 100%;
			}
			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
				line-height: 100%;
			}
			.apple-link a {
				color: inherit !important;
				font-family: inherit !important;
				font-size: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
				text-decoration: none !important;
			}
		      #MessageViewBody a {
			color: inherit;
			text-decoration: none;
			font-size: inherit;
			font-family: inherit;
			font-weight: inherit;
			line-height: inherit;
		}
		.btn-primary table td:hover {
			background-color: #34495e !important;
		}
		.btn-success a:hover {
			background-color: #34495e !important;
			border-color: #34495e !important;
		}
		.btn-primary a:hover {
			background-color: #34495e !important;
			border-color: #34495e !important;
		}
	}
	</style>
	</head>
	<body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
	<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
	<tr>
	<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
	<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
	<div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

	<!-- START CENTERED WHITE CONTAINER -->
	<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
	<table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

	<!-- START MAIN CONTENT AREA -->
	<tr>
	<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
	<tr>
	<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
	<p style="font-family: sans-serif; font-size: 16px; font-weight: normal; margin: 0; Margin-bottom: 15px;">

	Congratulations on your successful Registration 
	with Good Life Global & Earn with <br>

	Username :'.$username.'<br>
	Password: '.$password.'<br><br>

	Once Again Congratulations<br>
	Good Life Global Admin


	</p>
	</td>
	</tr>
	</table>
	</td>
	</tr>

	<!-- END MAIN CONTENT AREA -->
	</table>

	<!-- END CENTERED WHITE CONTAINER -->
	</div>
	</td>
	<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
	</tr>
	</table>
	</body>
	</html>';

	$send = mail($email, $subject, $mailmessage, $headers);
	return;
}

	//Admin users upa
function UpdateUser(){
	global $db, $report;
	$id = $_SESSION['fid'];
	$firstname = sanitize($_POST['firstname']);
	$lastname = sanitize($_POST['lastname']);
	$username = sanitize($_POST['username']);
	$email = sanitize($_POST['email']);
	$phone = sanitize($_POST['phone']);
	$sex = sanitize($_POST['sex']);
	$dob = sanitize($_POST['dob']);
	$city = sanitize($_POST['city']);
	$address = sanitize($_POST['address']);
	$state = sanitize($_POST['state']);
	$country = sanitize($_POST['country']);
	$bank = sanitize($_POST['bank']);
	$accname = sanitize($_POST['accname']);
	$accno = sanitize($_POST['accountno']);
	
	$query = ("UPDATE user SET firstname='$firstname', lastname='$lastname', 
		email='$email', phone='$phone', sex='$sex', dob='$dob', city='$city', address='$address', 
		states='$state', country='$country', bank='$bank', accname='$accname', accountno='$accno', user='$username'
		WHERE sn='$id'") or die('error');
	
	if ($db->query($query) === TRUE) {
		$report = "Record updated successfully"; 
		$qsql = $db->query("SELECT * FROM user ");
		$row = mysqli_fetch_array($qsql);
		$username = $row['user'];
		if($row['sn'] == 1){
			unset($_SESSION['sn']);
			$report = "Profile Updated Successfully";
		}else{
				//unset($_SESSION['sn']);
			$report = "Profile Updated Successfully";   
		}
	}
	return; 

}
	 // change password
function ChangePassword(){
	global $db, $report, $count;
	$uid = $this->Uid();
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$confpassword=$_POST['confpassword'];
	
	if($newpassword != $confpassword){
		$report = "Password is not a match";
		$count = 1;
	}else{
		$sql = "SELECT * FROM user WHERE id='$id'";
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if(password_verify($oldpassword, $row['pass'])){
			$newpassword= password_hash($newpassword, PASSWORD_BCRYPT);
			$update = "UPDATE user SET pass ='$newpassword' WHERE id = '$id'";
			$result2 = $db->query($update);
			$report = "Your password successully changed";
		}else{ $report = "Your current password is wrong"; $count=1; }
	}
	return; 
}

	 // change password
function UpdateUserPass(){
	global $db, $report, $count;
	$uid = $this->Uid();
	
	$oldpassword=$_POST['pass'];
	$newpassword=$_POST['pass1'];
	$confpassword=$_POST['pass2'];
	
	if($newpassword != $confpassword){
		$report = "Password is not a match";
		$count = 1;
	}else{
		$sql = "SELECT * FROM user WHERE id='$id'";
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if(password_verify($oldpassword, userName($uid,'pass'))){
			$newpassword= password_hash($newpassword, PASSWORD_BCRYPT);
			$update = "UPDATE user SET pass ='$newpassword' WHERE id = '$uid'";
			$result2 = $db->query($update);
			$report = "User password successully changed: ".$this->userName($uid);
		}else{ $report = "Your current password is wrong"; $count=1; }
	}
	return; 
}

	#Userlevel update access
function UpdatePicture()
{
	global $db, $report, $count;

	$id = $_SESSION['user_id'];
	$image_name = $_FILES['photo']['name'];
	$image_loc = $_FILES['photo']['tmp_name'];
	$image_type = $_FILES['photo']['type'];
	$image_size = $_FILES['photo']['size'];
	$target = "uploads/".basename($image_name);
	$sql = $db->query("UPDATE user SET photo = '$image_name' WHERE id='$id'");
	move_uploaded_file($image_loc, $target);  
	$ext = explode('.', $image_name);
	$end = strtolower(end($ext));
	if (checkExtension($end)) {
		if (checkSize($image_size)) {
			$sql = $db->query("UPDATE user SET photo = '$image_name' WHERE id='$id'");
			move_uploaded_file($image_loc, $target);
			$report .= 'Photo Successfully Uploaded';

		} else {
			$count = 1;
			$report .= 'Image Size Must Not Be More than 1MB';
		}
	} else {
		$count = 1;
		$report .= 'Image Must Be In Jpg,Jpeg, or Png Format only';
	}
	return; 
}
function UpdateUserPicture()
{
	global $db, $report, $count;

	$uid = $this->Uid();
	$image_name = $_FILES['photo']['name'];
	$image_loc = $_FILES['photo']['tmp_name'];
	$image_type = $_FILES['photo']['type'];
	$image_size = $_FILES['photo']['size'];
		$target = 'uploads/';//.basename($image_name);

		$ext = explode('.', $image_name);
		$end = strtolower(end($ext));
		if (checkExtension($end)) { 
			if (checkSize($image_size)) {
				$name = $this->win_hashs(14).'.'.$end;
				$sql = $db->query("UPDATE user SET photo = '$name' WHERE id='$uid'");
				move_uploaded_file($image_loc, $target.$name);
				$report = 'Photo Successfully Uploaded';

			} else {
				$count = 1;
				$report = 'Image Size Must Not Be More than 1MB';
			}
		} else {
			$count = 1;
			$report = 'Image Must Be In Jpg,Jpeg, or Png Format only';
		}
		return; 
	}
	function UpdateUserPicturex()
	{
		global $db, $report, $count;

		$id = $this->Uid();
		$image_name = $_FILES['photo']['name'];
		$image_loc = $_FILES['photo']['tmp_name'];
		$image_type = $_FILES['photo']['type'];
		$image_size = $_FILES['photo']['size'];
		$target = "uploads/".basename($image_name);

		$ext = explode('.', $image_name);
		$end = strtolower(end($ext));
		if (checkExtension($end)) { 
			if (checkSize($image_size)) {
				$sql = $db->query("UPDATE user SET photo = '$image_name' WHERE id='$uid'");
				move_uploaded_file($image_loc, $target);
				$report = 'Photo Successfully Uploaded';

			} else {
				$count = 1;
				$report = 'Image Size Must Not Be More than 1MB';
			}
		} else {
			$count = 1;
			$report = 'Image Must Be In Jpg,Jpeg, or Png Format only';
		}
		return; 
	}

	 //not used yet..
	function validateUser($username, $info = '')
	{
		global $db, $report, $count; 
		$sql = $db->query("SELECT * FROM user WHERE user = '$username' ") or die(mysqli_error());
		$num = mysqli_num_rows($sql);
		$row = mysqli_fetch_assoc($sql);
		if ($num == 0) {
			$res = FALSE;
		} else {
			$res = TRUE;
		}
		if ($info == 1) {
			$res = $row['firstname'] . ' ' . $row['lastname'];
		}
		if ($info == 2) {
			$res = $row['sn'];
		}
		return $res;
	}
	#alert error message....
	function Alert()
	{
		global $report, $count;
		
		if($count > 0) {

			echo '
			<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show p-2"  style="position:fixed; top:10px; right:10px; z-index:100000">
			<div class="d-flex align-items-center">
			<div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
			</div>
			<div class="ms-3">
			<h6 class="mb-0 text-white">Error</h6>
			<div class="text-white">' . $report . '</div>
			</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';


		} else {
			echo '<div class="alert alert-success border-0 bg-success alert-dismissible fade show p-2" style="position:fixed; top:10px; right:10px; z-index:100000">
			<div class="d-flex align-items-center">
			<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
			</div>
			<div class="ms-3">
			<h6 class="mb-0 text-white">Success</h6>
			<div class="text-white">' . $report . '</div>
			</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
		}
		return;
	}
	//get downlines ...not used yet..
	function referral($id)
	{
		global $db;
		$sql = $db->query("SELECT * FROM user WHERE sponsor='$id'");
		$no = $sql->num_rows;
		return $no;
	}
	//get sponsor..  
	function ApprovePackage()
	{
		global $db,$report;
		$title = sanitize($_POST['title']);
		$cost = sanitize($_POST['cost']);
		$point = sanitize($_POST['point']);
		$cashback = sanitize($_POST['cashback']);
		$keyy = $this->win_hashs(8);
		$_SESSION['keyy']=$keyy;
		$msg = $db->query("INSERT INTO package (title, cost, cashback, keyy, points) 
			VALUES('$title','$cost','$cashback','$keyy','$point')") or die(mysqli_error($db));
		$report = "Package Added Successfully";
		return;
	} 

	function UpdateSetup()
	{  
		global $db, $report;
		$regfee = $_POST['regfee'];
		$refbonus = sanitize($_POST['refbonus']);
		$stage1 = sanitize($_POST['stage1']);
		$stage2 = sanitize($_POST['stage2']);
		$stage3 = sanitize($_POST['stage3']);
		
		
		$sql = $db->query("UPDATE setup SET regfee='$regfee', refbonus='$refbonus', stage1='$stage1', stage2='$stage2', stage3='$stage3' WHERE sn=1 ");
		$report = "Setup Updated Successfully";
		
		return; 
	}
	 ######################----CLIENT TOPUP SUPPORT ---=####################################
	function sqLm($table, $a, $b, $c, $d){
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE  $a='$b' AND $c='$d'") or die(mysqli_error());
		return mysqli_num_rows($sql);
	}
	function sqLw($table,$a, $b, $c, $d, $e)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE $a='$b' AND $c='$d' " )or die(mysqli_error());	
		$row = mysqli_fetch_assoc($sql); 
		return $row[$e];
	}
	function clientSupport(){
		global $db, $report, $count;

		$email = strtolower(sanitize(trim($_POST['email'])));
		$phone = trim($_POST['phone']);
		$amount = trim($_POST['amount']);
		$date  = trim($_POST['datet']); //current time of complain
		$trno = trim($_POST['trno']);
		
		$time = strtotime($date); //check ..
		
		//validate request inputs..
		if(strlen($phone) != 11 || !is_numeric($phone) ){
			$report = 'invalid phone number'; 
			$count = 1;
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$report = "invalid email address";
			$count = 1;
		}
		elseif(!is_numeric($amount)){
			$report = 'Invalid amount entered';
			$count = 1;
		}
		else{
        	//check trno for existence 
			$checktrno = sqL1('clientopup', 'trno', $trno);
			if($checktrno == 0){
				$report = "Invalid transaction no, try again later";
				$count = 1;
			}else{
        		//validate request...check if the client has paid ..
				$verify_req = $this->sqLm('clientopup', 'trno', $trno, 'paidstatus', 1); 
				if($verify_req == 1){
					$report = 'Request Submitted Successfully';
					//perform this operation..return recharge id..
					$rid = $this->sqLw('clientopup', 'trno', $trno, 'paidstatus', 1, 'rechargeid');
					$clientsup = $db->query("UPDATE clientsupport SET email='$email', phone='$phone', 
						amount='$amount', rechargeid='$rid', requestdate='$time'
						WHERE trno='$trno' ") or die(mysqli_error());
				}
				else{
					$report = 'Invalid Request, please supply correct information';
					$count = 1;
				}

			}
			
		}


	}
	######################---END CLIENT TOPUP SUPPORT ---=##################################

    ################ ------------CUSTOMER RECHARGE FEE PROCESSING -----######################
	
	function add1p($amount){
		return $amount + $amount*0.01;
		
	}
	
	
	function adminId($col='id'){
		global $db;
		$admin = $db->query("SELECT * FROM user WHERE sn=1");
		$result = $admin->fetch_assoc();
		return $result[$col];
	}
	function clientTopup($col, $trno){
		global $db;
		$clientD = $db->query("SELECT * FROM clientopup WHERE trno = '$trno'");
		$result = $clientD->fetch_assoc();
		return $result[$col];
	}



	function userNamex2($id,$col)
	{
		global $db;

		$que = $db->query("SELECT * FROM user WHERE id = '$id' ") or die(mysqli_error());
		$ro = mysqli_fetch_array($que);
		
		return $ro[$col];
		
	}

	function treeColor($uidx,$fidx){
		if($fidx==$uidx){$col='green';}elseif($fidx>$uidx){$col='brown';}else{$col='blue';}
		return $col;
	}

	function matTree($uidx){
		global $db;
		$uid = $this->keyToId($uidx);
		$tree = '<ul class="tree">
		<li><span class="bg-success"><a href="#" data-toggle="tooltip" title="'.userName($uid).'">'.userName($uid,'user').'<br><div class="fa fa-users"></div> '.$this->userNamex2($uid,'sp').'</a></span>'; 
		$sql = $db->query("SELECT * FROM user WHERE a1='$uidx' "); 
		$tree .= mysqli_num_rows($sql)>0 ? '<ul>' : '';
		while($row = mysqli_fetch_assoc($sql) ) { $nsn=$row['sn']; 
		
		$tree .=  '<li><span class="bg-success"><a href="?treeid='.userName($row['id'],'sn').'" data-toggle="tooltip" title="'.userName($row['id']).'" style="color:'.$this->treeColor($uidx,$row['a1']).'"><b>'.userName($row['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$row['sp'].'</a></span>';
		$sq = $db->query("SELECT * FROM user WHERE a1='$nsn' "); 
		$tree .= mysqli_num_rows($sq)>0 ? '<ul>' : '';
		while($ro = mysqli_fetch_assoc($sq)) {   $nss=$ro['sn']; 
		
		$tree .= '<li><span class="bg-success"><a href="?treeid='.userName($ro['id'],'sn').'" data-toggle="tooltip" title="'.userName($ro['id']).'" style="color:'.$this->treeColor($uidx,$ro['a1']).'"><b>'.userName($ro['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ro['sp'].'</a></span>';

		$sqs = $db->query("SELECT * FROM user WHERE a1='$nss' "); 
		$tree .= mysqli_num_rows($sqs)>0 ? '<ul>' : '';
		while($ros = mysqli_fetch_assoc($sqs)) {  $nst=$ros['sn'];  
		
		$tree .= '<li><span class="bg-success"><a href="?treeid='.userName($ros['id'],'sn').'"  data-toggle="tooltip" title="'.userName($ros['id']).'" style="color:'.$this->treeColor($uidx,$ros['a1']).'"><b>'.userName($ros['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ros['sp'].'</a></span>';

		$sqq = $db->query("SELECT * FROM user WHERE a1='$nst' "); 
		$tree .= mysqli_num_rows($sqq)>0 ? '<ul>' : '';
		while($roq = mysqli_fetch_assoc($sqq)) {   $nsu=$roq['sn']; 
		
		$tree .= '<li><span class="bg-primary"><a href="?treeid='.userName($roq['id'],'sn').'"  data-toggle="tooltip" title="'.userName($roq['id']).'" style="color:'.$this->treeColor($uidx,$roq['a1']).'"><b>'.userName($roq['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$roq['sp'].'</a></span>';

		$sqr = $db->query("SELECT * FROM user WHERE a1='$nsu' "); 
		$tree .= mysqli_num_rows($sqr)>0 ? '<ul>' : '';
		while($ror = mysqli_fetch_assoc($sqr)) {   $ns1=$ror['sn']; 
		
		$tree .= '<li><span class="bg-primary"><a href="?treeid='.userName($ror['id'],'sn').'"  data-toggle="tooltip" title="'.userName($ror['id']).'" style="color:'.$this->treeColor($uidx,$ror['a1']).'"><b>'.userName($ror['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ror['sp'].'</a></span>';  


		$sq1 = $db->query("SELECT * FROM user WHERE a1='$ns1' "); 
		$tree .= mysqli_num_rows($sq1)>0 ? '<ul>' : '';
		while($ro1 = mysqli_fetch_assoc($sq1)) { $ns2=$ro1['sn'];   
		
		$tree .= '<li><span class="bg-primary"><a href="?treeid='.userName($ro1['id'],'sn').'"  data-toggle="tooltip" title="'.userName($ro1['id']).'" style="color:'.$this->treeColor($uidx,$ro1['a1']).'"><b>'.userName($ro1['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ro1['sp'].'</a></span>';  

		$sq2 = $db->query("SELECT * FROM user WHERE a1='$ns2' "); 
		$tree .= mysqli_num_rows($sq2)>0 ? '<ul>' : '';
		while($ro2 = mysqli_fetch_assoc($sq2)) { $ns3=$ro2['sn'];  
		
		$tree .= '<li><span class="bg-danger"><a href="?treeid='.userName($ro2['id'],'sn').'"  data-toggle="tooltip" title="'.userName($ro2['id']).'" style="color:'.$this->treeColor($uidx,$ro2['a1']).'"><b>'.userName($ro2['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ro2['sp'].'</a></span> '; 

		$sq3 = $db->query("SELECT * FROM user WHERE a1='$ns3' "); 
		$tree .= mysqli_num_rows($sq3)>0 ? '<ul>' : '';
		while($ro3 = mysqli_fetch_assoc($sq3)) {   
			
			$tree .= '<li><span class="bg-danger"><a href="?treeid='.userName($ro3['id'],'sn').'"  data-toggle="tooltip" title="'.userName($ro3['id']).'" style="color:'.$this->treeColor($uidx,$ro3['a1']).'"><b>'.userName($ro3['id'],'user').'</b> <br><div class="fa fa-users"></div> '.$ro3['sp'].'</a></span> </li>';  }

			$tree .= mysqli_num_rows($sq3)>0 ? '</ul>' : ''; 
			' </li>';  } 

			$tree .= mysqli_num_rows($sq2)>0 ? '</ul>' : ''; 
			' </li>';  }

			$tree .= mysqli_num_rows($sq1)>0 ? '</ul>' : ''; 
			' </li>';  }

			$tree .= mysqli_num_rows($sqr)>0 ? '</ul>' : ''; 
			' </li>';  }
			
			$tree .= mysqli_num_rows($sqq)>0 ? '</ul>' : ''; 
			$tree .= ' </li>';  }
			

			$tree .= mysqli_num_rows($sqs)>0 ? '</ul>' : ''; 
			$tree .= '</li>';  }
			
			$tree .= mysqli_num_rows($sq)>0 ? '</ul>' : ''; 
			
			$tree .= '</li>';    }
			$tree .= mysqli_num_rows($sql)>0 ? '</ul>' : ''; 
			$tree .= '</li>

			</ul>';

			return $tree; 

		}


		function stageRemark($level,$x=2){
			if($level == 0){$a = 1; $b='Stage 1, Level 0';}
			elseif($level == 1){$a = 1; $b='Stage 1, Level 1';}
			elseif($level == 2){$a = 1; $b='Stage 1, Level 2';}
			elseif($level == 3){$a = 1; $b='Stage 1, Level 3';}
			elseif($level == 4){$a = 2; $b='Stage 2, Level 1';}
			elseif($level == 5){$a = 2; $b='Stage 2, Level 2';}
			elseif($level == 6){$a = 2; $b='Stage 2, Level 3';}
			elseif($level == 7){$a = 3; $b='Stage 3, Level 1';}
			elseif($level == 8){$a = 3; $b='Stage 3, Level 2';}
			return $x==2 ? $b : $a;
		}













	} 
	$pro = new Profile();
	$uid = $pro->Uid();
	$uidx = userName($uid,'sn');
	$stage = userName($uid,'stage');
 //$pro->logAgent();
// if($uid==1){
// $email = userName($uid,'email'); $user=userName($uid,'firstname'); 
// $pro->emailerAllNew($email,$user);
// }
	?>

