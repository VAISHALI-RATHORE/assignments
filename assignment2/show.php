<?php require_once 'process.php'; ?>
<?php  
         $mysqli = new mysqli('localhost','root','','assignment') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM get order by id DESC") or die($mysqli->error);
         //pre_r($result);
         // pre_r($result->fetch_assoc());
         ?>
               <?php $acs=array(); ?>
<?php while ($row =$result->fetch_assoc())
      { 
        $acs[]=$row;
      }
 ?>
     

        
                <?php  foreach ($acs as $val) { ?>
                <ul>
        		<li>NAME:<?php echo $val['name']; ?></li>
        		<li>EMAIL:<?php echo $val['email']; ?></li>
        		<li>MOBILE:<?php echo $val['mobile']; ?></li>
        	    </ul>
                <br>
        <?php } ?>
       
        <a href="index.php">Add new</a>
                    