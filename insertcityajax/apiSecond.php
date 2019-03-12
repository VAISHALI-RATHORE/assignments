<?php
	$mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
	$arr=array();
	
	$state_id = isset($_POST['state']) ? $_POST['state'] : '';

    if(isset($_POST['city']) && $state_id!='') {
        $cityName=$_POST['city'];
        $result = $mysqli->query("SELECT id from cities WHERE name ='$cityName' AND state_id ='$state_id'") or die($mysqli->error);
	    $city=$result->fetch_assoc();

	    if(isset($city['id'])) {
           	echo "Already exist!";	    	
	    } else {
      	    $mysqli->query("INSERT INTO cities (name, state_id) VALUES ( '$cityName', '$state_id')") or die($mysqli->error);
      	    echo "Inserted";	    	
	    }	    
    } 
?>	