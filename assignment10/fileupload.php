 <form action="" method="post" enctype="multipart/form-data">
    Select  File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

 <?php

if( isset($_FILES['file']['name'])  )
  {
        $path=$_FILES['file']['name'];
        $pathto="upload/jason/".$path;
 if( move_uploaded_file( $_FILES['file']['tmp_name'],$pathto)) {
  $fileContent = file_get_contents( $_FILES['file']['name']);
  $array=json_decode($fileContent,true);
   echo "The file ".  basename( $_FILES['file']['name']). 
    " has been uploaded";

  // echo "<pre>";
  // print_r($_FILES['file']);
}


}
else
{
    die("No file specified!");
}


?>
 