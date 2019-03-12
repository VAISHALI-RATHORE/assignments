<!-- <?php 
      // $update = false ;
      $mysqli = new mysqli('localhost','root','','ajax') or die(mysql_error($mysqli)); 
      $result = $mysqli->query("SELECT * FROM crud ") or die($mysqli->error);
?> --> 
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
    <!-- <input type="hidden" name="id" value="<?Php echo $id;?>"> -->
    <label><h6>Title:</h6></label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" >
    <br>
  </div>   
  <select name="category" id="category" >
    <option >Category:</option>
    <option >Politics</option>
    <option >Film-industry</option>
    <option >Education</option>
    <option >Management</option>
    <option >other</option>
  </select>
    <div class="form-group">
          <label><h6>Description:</h6></label>
          <input type="text"  rows="5" cols="10" name="desc" id="desc" class="form-control"  placeholder="Enter blog description" >
        
    </div>
           <br>
    
          

         <div class="form-group">
         <!-- <button type="submit" class="btn btn-primary" name="save" id="save" onclick="return function()">SAVE</button> -->
       <!--   <?php 
      
      if ($update == true):
        ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?> -->
    <button type="submit" class="btn btn-primary" name="save" id="save" onclick="return function()">Save</button>
<!-- <?php endif; ?> -->
         </div>
  
  </form>
 </div>
 </div>
 </div>
 </body>
 <hr>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 <script type="text/javascript">
$(document).on('click','#save',function(e) {
  var title = $("#title").val();
  var category = $("#category").val();
  var desc = $("#desc").val();
  //var files = $('#files')[0].files[0];
        
  formData = {
      title : title,
      category : category,
      desc : desc,
      // files : files,
  },

  
  $.ajax({
         url: "insertion.php",
         type: "post",
         data : formData,
         success: function(data){
              alert("Data Save: " + data);
         }
});
 });

 </script>
 </html>

                     

