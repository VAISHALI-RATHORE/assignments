<?php 
 $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
   $name ='';
  $email ='';
  $mobile ='';
if (isset($_GET['submit'])) {
	$name = $_GET['name'];
	$email = $_GET['email'];
    $mobile = $_GET['mobile'];
    if(!empty($name) || !empty($email) || !empty($mobile) ){
	$mysqli->query("INSERT INTO get (name,email,mobile) VALUES ('$name', '$email','$mobile')");
	header("location: show.php");
}	
else
{   	
    echo "You did not fill out the required fields.";

}
}
?>