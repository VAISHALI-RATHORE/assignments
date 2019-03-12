<?php 
      $mysqli = new mysqli('localhost','root','','ajax') or die(mysql_error($mysqli)); 
      $result = $mysqli->query("SELECT * FROM crud WHERE id = id") or die($mysqli->error);
?>
<html>
<head>
    <title>Blog viewpage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



<div class="container">
  <div class="row">
  <div class="col-md-4 offset-md-4">

  <form action="list.php" method="POST">
  <div class="form-group">
  	<?php while($row =$result->fetch_assoc()) : ?>
    <label><h6>Title:</h6></label>
    <input type="text" name="title" id="title" class="form-control" placeholder="<?php echo $row['title']; ?>" >
    <br>
  </div>   
  <select name="category" id="category">
    <option ><?php echo $row['category']; ?></option>
  </select>
    <div class="form-group">
          <label><h6>Description:</h6></label>
          <textarea rows="5" cols="10" name="desc" id="desc" class="form-control"  placeholder="<?php echo $row['description']; ?>" >
          </textarea>
    </div>
           <br>
    
          

         <div class="form-group">
         <button type="submit" class="btn btn-primary" name="save" id="save" onclick="return function()">SAVE</button>
         </div>
  
  </form>
 </div>
 </div>
 </div>
 </body>
 <hr>
