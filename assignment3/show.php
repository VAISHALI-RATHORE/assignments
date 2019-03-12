<?php require_once 'process.php'; ?>
<?php  
         $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM form order by id DESC") or die($mysqli->error);
         //pre_r($result);
         // pre_r($result->fetch_assoc());
         ?>
<?php   $row =$result->fetch_assoc() ; ?>
     

        	<ol>
        		<li>NAME:<?php echo $row['name']; ?></li>
        		<li>MOBILE:<?php echo $row['mobile']; ?></li>
        	</ol>
            <ol>
                <li>NAME:<?php echo $row['name1']; ?></li>
                <li>MOBILE:<?php echo $row['mobile1']; ?></li>
            </ol>
            <ol>
                <li>NAME:<?php echo $row['name2']; ?></li>
                <li>MOBILE:<?php echo $row['mobile2']; ?></li>
            </ol>
       
        <a href="index.php">back</a>

        
     ?> 