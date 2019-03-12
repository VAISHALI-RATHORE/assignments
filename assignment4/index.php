<form action="index.php" method="POST">
Name : <input type="text" name="name"><br>
Email : <input type="text" name="email"><br>
Mobile Number :<input type="text" name="mobile"><br>
<input type="submit" name="submit">
<hr>
</form>
<form>
<input type="search" name="search"  placeholder="Enter name!">
<input type="submit" name="search1">
</form>
-----------------------------------------------------------------------------------------------
<br>
<?php
$mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
?>
<?php 

$acs =array();
if(isset($_POST)){
$search_text = $_POST['search'];
$result =array();
$row =array();
$name =array();
$result = $mysqli->query("SELECT * FROM post where  name = '$search_text'") or die($mysqli->error);

while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
  }
  ?>

<?php if(sizeof($acs)>0) {?>
	<ol>
		<?php foreach($acs as $ac) {?>
			<li>
				name:<?php echo $ac['name'];?>
			<br/>
               Mobile:<?php echo $ac['mobile'];?>
             <br/>
               Email:<?php echo $ac['email'];?>  
            </li>   
        <?php } ?>
	</ol>
<?php } ?>