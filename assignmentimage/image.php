<form action="" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
........................................................................................................
<?php
 	$mysqli = new mysqli('localhost','root','','images') or die(mysql_error($mysqli));
?>
<?php
// Include the database configuration file

$statusMsg = '';



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
// echo "<pre>";
// print_r($_FILES["file"]);
// return;

$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $mysqli->query("INSERT into product_images (image) VALUES ('$fileName')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
  
<?php

$imageURL ='';

$query = $mysqli->query("SELECT * FROM product_images");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
    $imageURL = $row['image'];
?>
    <img src="<?php echo 'uploads/'.$imageURL; ?>" alt="" />
<?php
   }
}else{ 
?>
    <p>No image(s) found...</p>
<?php } ?>