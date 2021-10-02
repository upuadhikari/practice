<?php 
$server=mysqli_connect("localhost","root","","ajaxpractice");

// mysqli_set_charset($server,'utf-8');
$id=$_POST['id_is'];
//  $name=mysqli_real_escape_string($server,$name);
// $name=str_replace(' ', %, $name );

$sel="DELETE from practicetable where id='$id}' ";
$del=mysqli_query($server, $sel);

if(!$del){
	echo "Can't delete data!";
}
else{
	echo "Deleted on data";
}

 ?>