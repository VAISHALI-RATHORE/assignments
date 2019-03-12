<?php
  $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
?>
<?php
  $state ='';
  $city ='';
  $status = 0;

    if(isset($_POST['add'])) {
      $state = $_POST['state'];
     	$status = 1;
      $result = $mysqli->query("SELECT state from state WHERE state ='$state'") or die($mysqli->error);
      if ( mysqli_num_rows($result) > 1 ) {
          echo "repeated data";
        }else{
       $result = $mysqli->query("INSERT INTO state (state) VALUES ( '$state')") or die($mysqli->error);
       $mysqli->query("UPDATE state SET status ='$status' WHERE state ='$state' ");
      }
      
    }

     if(isset($_POST['city'])) {
      	$city = $_POST['city'];
      	$state_id = $_POST['state_id'];
      	$status = '1';
      	$result1 = $mysqli->query("SELECT city,state_id, status from city WHERE city ='$city'") or die($mysqli->error);
      if ( mysqli_num_rows($result1) > 1 ) {
      echo "repeated city";
      }else{
      	$mysqli->query("INSERT INTO city (city, state_id, status) VALUES ( '$city', '$state_id', '$status')") or die($mysqli->error);
       header("location: print.php");
      	}
      	// $mysqli->query("UPDATE city SET status ='$status' WHERE city ='$city' ");
    }
?>