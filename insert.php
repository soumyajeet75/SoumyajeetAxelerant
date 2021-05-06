<?php
include'connect.php';
$option=$_POST['option']; 
mysqli_query($connect,"INSERT INTO opinionpoll(options) VALUES('$option')");
 if(mysqli_affected_rows($connect) > 0){
 echo "<p>Opinion Submitted Successfully</p>";
 echo "<a href='index.html'>Go Back</a>";
} else {
 echo "Opinion Submission Failed<br />";
 echo mysqli_error($connect);
}
?>