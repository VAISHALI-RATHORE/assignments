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
          while($row =$result->fetch_assoc()) : ?>
        	<tr>
        		<td><?php echo $row['title']; ?></td>
        		<td><?php echo $row['category']; ?></td>
                <td><?php echo $row['description']; ?></td>
        		<td>
        			<a href="index.php?edit= <?php echo $row['id'];?>" class="btn btn-info">Edit</a>
        			<a href="process.php?delete= <?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
        		</td>
        	</tr>
           <?php endwhile; ?>
        	</table>

        </div>
        <a href="ajaxcrud.php">go back to new </a>

