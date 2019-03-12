<?php
$str=file_get_contents("food.json");
$array=json_decode($str,true);



 echo "<pre>";
 		print_r($array);
 		echo "</pre>";
?>