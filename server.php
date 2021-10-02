<?php

$server=mysqli_connect("localhost","root","","ajaxpractice");

if(!$server){
	echo "Connection Failed!";
}

else{
	echo "Connected to db!";
}


?>
