<?php 
$mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
$name ='';
$email ='';
$mobile ='';
if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
if(!empty($name) || !empty($email) || !empty($mobile) ){
$mysqli->query("INSERT INTO post (name,email,mobile) VALUES ('$name', '$email','$mobile')");
header("location: index.php");
}	
else
{   	
    echo "You did not fill out the required fields.";

}
}
if (isset($_POST['search1'])) {
  $search = $_POST['search'];
  }
?>






<?php 
 $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
 $result = $mysqli->query("SELECT * FROM post where  name = '%".$search."%'") or die($mysqli->error);
 $acs=array(); 
 while ($row =$result->fetch_assoc())
      { 
        $acs[]=$row;
      }
 

foreach ($acs as $val) { 
 echo $val['name']; 
 echo $val['email']; 
 echo $val['mobile'];


 }  
 ?>
