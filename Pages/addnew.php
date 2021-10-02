<?php 

require_once('../server.php');

$name=$_POST['name']; //fname is from 'data's variable in AJAX
$description=$_POST['description'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$insert="INSERT into practicetable(fullname, description, phone, email) values('$name','$description','$phone','$email')";

$res=mysqli_query($server, $insert);

if(!$res){

	echo "Insert Failed!";
}
else{
	echo "Inserted Data!";
}


 ?>