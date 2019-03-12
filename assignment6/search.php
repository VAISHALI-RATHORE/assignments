<form action="" method="POST"> 
  <input type="text" name="name" placeholder="Enter name" >
  <br>  
  <input type="text" name="mobile" placeholder="Enter mobile">
  <br>
  <input type="text" name="city" placeholder="Enter city">
  <br>
  <button type="submit" name="submit">submit</button>
</form>

<hr>

<form action="" method="POST">
  <input type="text" name="search" placeholder="Enter city" >
  <select name="value">
  	<option value="1">Name</option>
  	<option value="2">Mobile</option>
  	<option value="3">City</option>
  </select>
<input type="submit" name="submit1">
</form>
...........................................................................................................
<?php
  $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
?>

<?php
  $name='';
  $city='';
    $mobile='';
  $search_text='';

  $value='';

    if(isset($_POST['submit'])) {
      $name = $_POST['name'];
      $mobile = $_POST['mobile'];
      $city = $_POST['city'];

      $mysqli->query("INSERT INTO citytask (name,mobile,city) VALUES ( '$name', '$mobile', '$city')") or die($mysqli->error);
    }
?>

<?php 
  $users = array();
  if(isset($_POST['submit1'])) {
    $search_text = $_POST['search'];
     $value=$_POST['value'];
    $result= array();
    $row= array();
      

    if($value== 1){
      $result = $mysqli->query("SELECT * FROM citytask WHERE name = '$search_text'") or die($mysqli->error);
      while($row = $result->fetch_assoc()){
        $users[]=$row;
      }   
   }  else if($value== 2){
    $result = $mysqli->query("SELECT * FROM citytask WHERE mobile = '$search_text'") or die($mysqli->error);
      while($row = $result->fetch_assoc()){
        $users[]=$row;
      }
  }   else{
    $result = $mysqli->query("SELECT * FROM citytask WHERE city = '$search_text'") or die($mysqli->error);
      while($row = $result->fetch_assoc()){
        $users[]=$row;
      }
  }
 ?>

<?php if(sizeof($users)>0) { ?>
<ol>
  <?php foreach ($users as $user) { ?>
  <li>
    Name: <?php echo $user['name']; ?>
    <br/>
    Mobile: <?php echo $user['mobile']; ?>
    <br/>
    City: <?php echo $user['city']; ?>
  
  </li>   
  <?php } ?>
</ol>
<?php } 
}?>