<?php 
	function sanitize($str){
		global $db;
		return mysqli_real_escape_string($db, $str);
	}
    function sqL($table)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table " )or die(mysqli_error());	
		return mysqli_num_rows($sql);
	}
    function sqL1($table,$col1,$val1)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' " )or die(mysqli_error());	
		return mysqli_num_rows($sql);
	}
    function sqL2($table,$col1,$val1,$col2,$val2)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' AND $col2='$val2' " )or die(mysqli_error());	
		return mysqli_num_rows($sql);
	}
	function sqLx($table,$col1,$val1,$col)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' " )or die(mysqli_error());	
		$row = mysqli_fetch_assoc($sql); 
		return $row[$col];
	}
	function sqLx2($table,$col1,$val1,$col2,$val2,$col)
	{
		global $db;
		$sql=$db->query("SELECT * FROM $table WHERE $col1='$val1' AND $col2='$val2' " )or die(mysqli_error());	
		$row = mysqli_fetch_assoc($sql); 
		return $row[$col];
	}	

	function sqLr($col)
	{
		global $db;
		$sql=$db->query("SELECT * FROM user WHERE sn<55 ORDER BY rand() LIMIT 1 " )or die(mysqli_error());	
		$row = mysqli_fetch_assoc($sql); 
		return $row[$col];
	}
	function checkSize($image_size){
	    if($image_size <= 2048576){
	        return true;
	    }
	    else {
	        return false;
	    }
	}
	function checkExtension($end){
	    $array = array('jpg','jpeg','gif','png');

	    if(in_array($end,$array)){
	        return true;
	    }
	    else { return false; }
	}
	function userName($id,$col=''){
	    global $db;
	    $sql = $db->query("SELECT * FROM user WHERE id='$id'");
	    $row = $sql->fetch_assoc();
	    $val = ($col=='')? $row['firstname'].' '.$row['lastname']: $row[$col];
	    return $val;
	}	

	function userName2($id,$col=''){
	    global $db;
	    $sql = $db->query("SELECT * FROM user WHERE sn='$id'");
	    $row = $sql->fetch_assoc();
	    $val = ($col=='')? $row['firstname'].' '.$row['lastname']: $row[$col];
	    return $val;
	}
	function dTable($head,$body,$sql,$action=0)
	{
		$action1 = $action;
		$i=0; $x=0;
		$n = count($head);
		$m = count($body);

		$act = $action==0 ? '' : '<th>Action</th>';

		$table='<table id="example1" class="table table-bordered table-striped sm">
		                  <thead>
		                  <tr>'; 
		            while($i<$n){ $a = $i++;
		                   
		                   $table .= '<th>'.$head[$a].'</th>';
		                  }
		                 $table .= $act.'</tr>
		                  </thead>
		                  <tbody>'; 
		while($row = mysqli_fetch_assoc($sql)) {
		$action = $action1==0 ? '' : '<td><form method="POST"><button type="submit" name="'.$action1[0].'" class="btn btn-xs btn-primary" value="'.$row[$action1[2]].'">'.$action1[1].'</button></form></td>';

              $table .= ' <tr>';
              $x=0;
              while($x<$m){ $y = $x++;
               $b = $row[$body[$y]];
               $table .= '<td>'.$b.'</td>';
              }
               $table .= $action.'</tr>';
            }
             
               $table .= '</tbody>
              <tfoot>
              <tr>';

              $i=0;
             while($i<$n){ $a = $i++;
               
               $table .= '<th>'.$head[$a].'</th>';
              }
              $table .= $act.'</tr>
              </tfoot>
            </table>';
               
		return $table;		  
	}
function forgotPassword(){
    global $db, $report, $count;

    //$username = sanitize($_POST['user']);
    $email_to = sanitize($_POST['email']);
   // $phone = sanitize($_POST['phone']);

    $sql = $db->query("SELECT * FROM user WHERE email='$email'");
    if($sql->num_rows < 1){
        $count = 1;
        $report = "Sorry Username or Email does not exist";
    }
    else {
        $password = substr(str_shuffle(str_repeat('123456789abcdefghijk', 5)), 0, 5);
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $sql1 = $db->query("UPDATE user SET pass='$pass' WHERE  email='$email'");

        $subject= 'Password Changed';
        $message = '<p>Password Changed Succesfully<br> Your New Password is: '.$password.'.<br> Please Keep Safe'; 
        $email_from = "happinessajayi@happinessajayi.com";
        $headers = "From: " . $email_from . "\n";
        $headers .= "Reply-To: " . $email_from . "\n";
       ini_set("sendmail_from", $email_from);
        $sent = mail($email_to, $subject, $message, $headers, "-f" . $email_from);
        if ($sent) {
            $report = 'Message sent successfully';
        } else {
            $count = 1;
            $report = 'Oops, message not sent, try again';
        }
	}
    return;
}


function getName(){
	global $nx;
$nc = count($nx)-1;
$a = rand(0,$nc); $b = rand(0,$nc);
return $nx[$a].' '.$nx[$b];
}

function money($amt)
{
	return 'USD '. number_format($amt, 2);
}
    
?>