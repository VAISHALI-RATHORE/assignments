<?php include 'server.php'; ?>
<form action="" method="POST">
  <input type="text" name="state" placeholder="Enter state" >
  <button name="add">
  	ADD
  </button>
</form>
<form action="" method="POST">
  <input type="text" name="city" placeholder="Enter city" >
 <select name="state_id" >
 <?php	
 $acs = array(); 
 $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
 $result = $mysqli->query("SELECT  id, state FROM state") or die($mysqli->error);
 while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
 ?>
<?php 
 	foreach($acs as $ac) {?>
			
  <option value="<?php echo $ac['id'];?>"><?php echo $ac['state'];?></option>
  <?php }  ?>
  </select>
 <button name="add1">
  	ADD
</button>
</form>
..................................................................................

