<?php
  $mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));

$result=array();
$row=array();
$states=array();
$state_name='';
$str1='';
$arr=array();


$result=$mysqli->query("SELECT id, name FROM states")or die($mysqli->error());
while($row=$result->fetch_assoc()){
 $states[]=$row;}
echo json_encode($states);
?>