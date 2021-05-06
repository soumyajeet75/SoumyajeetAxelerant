<?php
include'connect.php';
$option=$_POST['option']; 
mysqli_query($connect,"INSERT INTO opinionpoll(options) VALUES('$option')");
 if(mysqli_affected_rows($connect) > 0){
 echo "<center><h2>Opinion Submitted Successfully</h2></center></br>";
 echo "<form action='poll.php' method='get'> <center><button type='submit' formtarget='_blank' style='height:30px;width:200px;background-color:'#20B2AA'>Click Here to See Poll Results</button></center></form>";
} else { 
 echo "Opinion Submission Failed<br />";
 echo mysqli_error($connect);
}
?>