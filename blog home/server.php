<?php

$title="";
$category ="";
$Sdesc='';
$desc='';
$name='';

//connection database

$mysqli = new mysqli('localhost','root','','homepost') or die(mysql_error($mysqli));

if(isset($_POST["submit"])){
	$title = $_POST['title'];
	$category = $_POST['category'];
    $desc = $_POST['desc'];
    $Sdesc = $_POST['Sdesc'];
    $name = $_POST['name'];
    $date = $_POST['date'];
             
            
    $mysqli->query("INSERT INTO articles (title,category,description,short,name,dos) VALUES ('$title', '$category','$desc','$Sdesc','$name','$date'") ;

}
 if (isset($_POST['submit1'])) {
 	$comment = $_POST['comment'];
 	$mysqli->query("INSERT INTO comment (comment) VALUES ('$comment')") ;
 }


?>

<!-- // if(isset($_POST["submit1"]) && !empty($_FILES["image"]["name"])){
// 	$targetDir = "uploads/";
// 	$fileName = basename($_FILES["image"]["name"]);
//     $targetFilePath = $targetDir . $fileName;
//     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//     // Allow certain file formats
//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
//     if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
//         	$mysqli->query("INSERT INTO articles (image) VALUES ('$fileName')") ;
//   }
// }
// 	} -->