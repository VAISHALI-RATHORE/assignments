
<?php $mysqli = new mysqli('localhost','root','','ajax') or die(mysql_error($mysqli)); ?>
  <?php
   
  if (isset($_REQUEST)) {
   // $post = $_POST;
   // $file = $_FILES;
   // echo "<pre>";
   // print_r($post);
   // print_r($file);
   // return;
$title=$_POST['title'];
$category=$_POST['category'];
$desc=$_POST['desc'];
// $fileName = $_FILES["file"]["name"];
// $targetDir = "uploads/";
// $filename = basename($_FILES["file"]["name"]);
// $targetFilePath = $targetDir . $fileame;
// if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
$insert = $mysqli->query("INSERT into crud (title,category,description) VALUES ('$title','$category','$desc')");
}
?>