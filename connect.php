<?php
$connect=mysqli_connect('hostname','user','password','dbname');

if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}

?>