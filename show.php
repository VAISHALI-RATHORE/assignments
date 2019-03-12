
<?php  
 
 
   $name ='';
  $email ='';
  $mobile ='';
  $mobile ='';
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];
     if(!empty($name) || !empty($email) || !empty($mobile) ){
   echo "<h2>Your Input:</h2>";

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $mobile;
echo "<br>";
}
else
{
     echo "You did not fill out the required fields.";

}
}   


?>                   