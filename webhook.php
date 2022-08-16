<?php 

$db = new mysqli('localhost', 'excelplusglobal_user', 'excelplusglobal.com', 'excelplusglobal_db');

$x = file_get_contents('php://input');
$v = json_decode($x);

$db->query("INSERT INTO webhook(data, email, id) VALUES('$x', '', '$v->id') ")or die(mysqli_error($db));


?>