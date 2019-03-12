<?php 
    $name =array();
  
  $mobile =array();
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	
	$data = array($name,$mobile);
	}
?>

<?php  foreach ($data as $value) { ?>
<ul>
<li><?php echo $value; ?></li>
<br>
</ul>
<?php } ?>
