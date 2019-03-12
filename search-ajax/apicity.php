
<?php
  $mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
$state_id='';
$result=array();
$row=array();
$cities=array();
$city_name='';

$result=$mysqli->query("SELECT name,state_id FROM cities ")or die($mysqli->error());
while($row=$result->fetch_assoc()){
  $cities[]=$row;}
  echo json_encode($cities);
?>