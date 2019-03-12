   
<html>
<head>
    <title>Blog create page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="    background: ghostwhite;">


<?php include 'server.php'; ?>
<div class="container">
    <input type="hidden" name="id" value="<?Php echo $id; ?>">
  <div class="row " style="    margin-top: -35px;
">
  <div class="col-md-4 offset-md-4">

  <form action="editdel.php" method="POST">
  <div class="form-group">
    <label><h6>Title:</h6></label>
    <input type="text" name="title" class="form-control" placeholder="Enter title" >
    <br>
  </div>
    <div class="form-group">
    <label><h6>Image:</h6></label>
    <input type="file" name="image" class="form-control"  >
    <br>
  </div>   
  <select name="category">
    <option >Category:</option>
    <option >Politics</option>
    <option >Film-industry</option>
    <option >Education</option>
    <option >Management</option>
    <option >other</option>
  </select>
    <div class="form-group">
          <label><h6>Short description:</h6></label>
          <textarea rows="5" cols="5" name="Sdesc" class="form-control"  placeholder="Enter blog description" >
          </textarea>
    </div>
    <div class="form-group">
          <label><h6>Description:</h6></label>
          <textarea rows="5" cols="10" name="desc" class="form-control"  placeholder="Enter blog description" >
          </textarea>
    </div>
           <br>
    <div class="form-group">
    <label><h6>Article By:</h6></label>
    <input type="text" name="name" class="form-control" placeholder="Your name" >
    <br>
  </div>  


    <div>
         <div class="form-group">
         <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
         </div>
    </div>
  </form>
                
  
 </div>
 </div>
 </div>
 </body>
 </html>

                     

