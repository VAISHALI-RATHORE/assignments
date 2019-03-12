 <center><form action="" method="POST" >
  Title:<input type="text" name="title" id="title" placeholder="Enter title" >
    <br> 
  Choose:<select name="category" id="category">
    <option >Category:</option>
    <option >Politics</option>
    <option >Film-industry</option>
    <option >Education</option>
    <option >Management</option>
    <option >other</option>
  </select><br>
  Description:<br>
  <textarea name="desc" style="height: 100px; width: 100px;" id="desc"  placeholder="Enter blog description" ></textarea>
  <br>
<!--   Upload image :<input type="file" name="file" id="files" ><br> -->
  <button type="submit"  name="submit" onclick="return function();" id="save">SAVE</button>
  </form></center> 

  .......................................................................................................................
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
      description : desc,
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