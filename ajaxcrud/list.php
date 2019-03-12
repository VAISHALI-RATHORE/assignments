<?php 
      $mysqli = new mysqli('localhost','root','','ajax') or die(mysql_error($mysqli)); 
      $result = $mysqli->query("SELECT * FROM crud") or die($mysqli->error);
?>
        <div class="row justify-content-center">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>Title</th>
        				<th>Category</th>
        				<th colspan="2">Description</th>
        			</tr>
        		</thead>
        <?php
          while($row =$result->fetch_assoc()) : 
            
            ?>
        	<tr>
        		<td id="title"><?php echo $row['title']; ?></td>
        		<td id="category"><?php echo $row['category']; ?></td>
                <td id="description"><?php echo $row['description']; ?></td>
        		<td>
        		<!-- 	<a href="index.php?edit= <?php echo $row['id'];?>" class="btn btn-info" >Edit</a> -->
                    <a href="#" data-id=" <?php echo $row['id'];?>" data-role="edit" >EDIT</a>
                    <button  name="delete" id="delete">DELETE</button> 
        			<!-- <a href="process.php?delete= <?php echo $row['id'];?>" class="btn btn-danger">Delete</a> -->
        		</td>
        	</tr>
           <?php endwhile; ?>
        	</table>
        </div>
        <a href="index.php">go back to new </a>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
           $('#delete').on('click',function(){
            var id = $(this).attr("id");
              $.ajax({
            url: "update.php",
            type: "GET",
            async: true, 
            data: { id:id },
            success: function (data) {
                $('#title').val(data.title);
                $('#category').val(data.category);
                $('#description').val(data.description);
            }
           })
        });
       });
    </script>
<!--         if($("#title").val()!="") {
//         $.ajax({
//             url: "update.php",
//             type: "POST",
//             async: true, 
//             data: { title:$("#title").val(), category:$("#category").val(), description:$("#description").val(),}

//             success: function(data) {
//                 $('#output').html(data); 
//                 drawVisualization();   
//             },  
//         });
//     } else {
//         //notify the user they need to enter data
//     }
// };

 -->