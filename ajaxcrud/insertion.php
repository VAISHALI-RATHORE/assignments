
<?php
$mysqli = new mysqli('localhost','root','','ajax') or die(mysql_error($mysqli)); 
  
 
if(isset($_REQUEST)) {
$title=$_POST['title'];
$category=$_POST['category'];
$desc=$_POST['desc'];
$mysqli->query("INSERT into crud (title,category,description) VALUES ('$title','$category','$desc')");

} 

 //  if (isset($_POST['edit'])) {
 // 	$id = $_POST['edit'];
 // 	$update = true;
	// $result = $mysqli->query("SELECT * from crud WHERE id=$id ") or die($mysqli->error());
 //  if(count($result)==1){
 //  $row = $result->fetch_array();
 //   $title = $row['title'];
 //   $category =$row['category'];
 //   $description =$row['description'];
   
 //     }
   // }
   ?>
<!-- 
// if (isset($_POST['update'])) {
//     $id = $_POST['id'];
//     $title = $_POST['title'];
//     $category = $_POST['category'];
//     $description = $_POST['desc'];
//     $mysqli->query("UPDATE data SET name ='$name',location ='$location' WHERE id=$id ") or die($mysqli->error());
   

//      // header('location: index.php');
// }
 -->