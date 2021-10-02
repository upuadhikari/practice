<?php 


require_once('../server.php');

$id=$_POST['id'];
$name=$_POST['name']; //fname is from 'data's variable in AJAX
$description=$_POST['description'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$insert="UPDATE practicetable set fullname='$name', description ='$description', phone='$phone' and email='$email' where id='$id' ";

$res=mysqli_query($server, $insert);

if(!$res){

	echo "Update Failed!";
}
else{
	echo "Data is Updated!";
}


 

 ?>