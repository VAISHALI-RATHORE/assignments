<?php 
 $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
   $name ='';
  $email ='';
  $mobile ='';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $mobile;
echo "<br>";
;

}	
	
if(empty($name) || empty($email) || empty($mobile) )
{
    echo "You did not fill out the required fields.";
}
?>