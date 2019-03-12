<?php

$title="";
$category ="";
$Sdesc='';
$desc='';
$name='';

//connection database

$mysqli = new mysqli('localhost','root','','homepost') or die(mysql_error($mysqli));
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$category = $_POST['category'];
    $desc = $_POST['desc'];
    $Sdesc = $_POST['Sdesc'];
    $name = $_POST['name'];
    $mysqli->query("INSERT INTO articles (title,category,description,short,name,image) VALUES ('$title', '$category','$desc','$Sdesc','$name','$image')") ;
}
?>