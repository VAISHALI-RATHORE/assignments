
<?php
 	$mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
?>

....................................................................................
<form method="POST">
  <select name="state_id" >
 <?php  
 $acs = array(); 
 $result = $mysqli->query("SELECT  id, name FROM states") or die($mysqli->error);
 while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
 ?>
<?php 
  foreach($acs as $ac) {?>
      
  <option value="<?php echo $ac['id'];?>"><?php echo $ac['name'];?></option>
  <?php }  ?>
  </select>
 <button name="show">
  cities under choosen state
</button>
<select name="industry_id" >
 <?php  
 $acs = array(); 
 $result = $mysqli->query("SELECT  id, name FROM industries") or die($mysqli->error);
 while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
 ?>
<?php 
  foreach($acs as $ac) {?>
      
  <option value="<?php echo $ac['id'];?>"><?php echo $ac['name'];?></option>
  <?php }  ?>
  </select>
 <button name="show1">
  subindustries under choosen industries
</button>

</form>
..............................................................................................
<?php 

$state_id ='';
$industry_id = '';
$users =array();
$users1 =array();
$head = array();
$test = array();
$test1 = array();
if (isset($_POST['show'])) {
 
  $state_id = $_POST['state_id'];
  $state = $mysqli->query("SELECT name FROM states WHERE id = '$state_id'") or die($mysqli->error); 
  $test = $state->fetch_assoc();
  //  while($row = $result->fetch_assoc()){
  //       $head[]=$row;
  //    } 
  $result = $mysqli->query("SELECT name FROM cities WHERE state_id = '$state_id'") or die($mysqli->error);
  
 while($row = $result->fetch_assoc()){
        $users[]=$row;
      }
}
  
// echo "<pre>";
// print_r($head);
// return;
?>
<?php if (isset($test['name'])) { ?>
<h1> <?php echo $test['name']; ?></h1> 
<?php } ?>
<?php if(sizeof($users)>0) { ?>
<ol>
  <?php foreach ($users as $user) { ?>

  <li>
    Name(city): <?php echo $user['name']; ?>
    <br/>
  </li>   
  <?php } ?>
</ol>
<?php } ?>
<?php 



if (isset($_POST['show1'])) {
 
  $industry_id = $_POST['industry_id'];
  // $result = $mysqli->query("SELECT name FROM industries WHERE id = '$industry_id'") or die($mysqli->error); 	
  //  while($row = $result->fetch_assoc()){
  //       $users2[]=$row;
  //    } 
  $indus = $mysqli->query("SELECT name FROM industries WHERE id = '$industry_id'") or die($mysqli->error); 
  $test1 = $indus->fetch_assoc();

  $result = $mysqli->query("SELECT name FROM subindustries WHERE industry_id = '$industry_id'") or die($mysqli->error);
  while($row = $result->fetch_assoc()){
        $users1[]=$row;
      }

}
?>
 <?php if (isset($test1['name'])) { ?>
<h1> <?php echo $test1['name']; ?></h1> 
<?php } ?>
<?php if(sizeof($users1)>0) { ?>
 <ol>
  <?php foreach ($users1 as $userk) { ?>

  <li>
    Name(subindustry): <?php echo $userk['name']; ?>
    <br/>
  </li> 
  
  <?php } ?>
 </ol> 
<?php } ?>

<?php
$str=file_get_contents("sample.json");
$array=json_decode($str,true);
$locations = $array['Location'];
$industries = $array['industrySeller'];
$states=array();
$cities=array();
$subindustries =array();

$id=array();
$row=array();
// echo "<pre>";
// 		print_r($locations);
// 		echo "</pre>";
?>




<?php 


foreach ($industries as $industry) {
		$industry_name = $industry['industry'];
		$industry_slug = $industry['industrySlug'];
		
		$id=$mysqli->query("SELECT id FROM industries WHERE slug = '$industry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $industry_id=$row['id'];
		if(!$industry_id) {
			$mysqli->query("INSERT INTO  industries (name, slug) 
		    	VALUES ('$industry_name', '$industry_slug')") 
		        or die($mysqli->error());
		       
}

}


foreach ($industries as $subindustry) {
	
	$subindustry_name = $subindustry['subindustry'];
	$subindustry_slug = $subindustry['subIndustrySlug'];
	$industry_slug = $subindustry['industrySlug'];
  
    $id=$mysqli->query("SELECT id FROM industries WHERE slug = '$industry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $industry_id=$row['id'];
		
		$id=$mysqli->query("SELECT id FROM subindustries WHERE slug = '$subindustry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $subindustry_id=$row['id'];
		if(!$subindustry_id) {
			 // echo $city_id;
			$mysqli->query("INSERT INTO  subindustries (name, industry_id , slug) 
		    	VALUES ('$subindustry_name', '$industry_id' , '$subindustry_slug')") ;
		        
}


}

	foreach ($locations as $state) {
		
		$state_name = $state['ofc_state'];
		$state_code = $state['state'];
		$state_slug = $state['stateSlug'];
        
		$id=$mysqli->query("SELECT id FROM states WHERE code = '$state_code'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];
		if(!$stateid) {
			$mysqli->query("INSERT INTO  states (name, code , slug) 
		    	VALUES ('$state_name', '$state_code' , '$state_slug')") 
		        or die($mysqli->error());
		     	
		}
	}



	foreach ($locations as $location) {
		/*$cities['name'] = $location['ofc_city'];
		$cities['slug'] = $location['citySlug']; */
		/*echo "<pre>";
		print_r($location);
		echo "</pre>";*/

		$city_name = $location['ofc_city'];
		$city_slug = $location['citySlug'];
		$state_code = $location['state'];

		$id=$mysqli->query("SELECT id FROM states WHERE code = '$state_code'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];
		// echo "<pre>";
		// print_r($stateid);
		// echo "</pre>";
		$id=$mysqli->query("SELECT id FROM cities WHERE slug = '$city_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $city_id=$row['id'];
		if(!$city_id) {
			 // echo $city_id;
			$mysqli->query("INSERT INTO  cities (name, state_id , slug) 
		    	VALUES ('$city_name', '$stateid' , '$city_slug')") 
		        or die($mysqli->error());
		     
		        	
		}

		/*$states[$location['state']]['name'] = $location['ofc_state'];
		$states[$location['state']]['slug'] = $location['stateSlug'];
		$states[$location['state']]['code'] = $location['state'];*/
	}


?>
<!-- 
	// if($unique1!=$state['ofc_state']){
	// $states[$index]['name']=$state['ofc_state'];
	// $states[$index]['code']=$state['state'];
	// $states[$index]['slug']=$state['stateSlug'];
	// $index++;}
	// $unique1=$state['ofc_state'];
  // foreach($array['Location'] as $state){
	 //  if($unique1!=$state['ofc_state']){
		// 	$state_name=$state['ofc_state'];
		// 	$state_code =$state['state'];
		// 	$state_slug=$state['stateSlug'];
		// 	//$index++;  
		//     $mysqli->query("INSERT INTO  states(stateName, stateCode , slug) 
		//     	VALUES ('$state_name', '$state_code' , '$state_slug')") 
		//         or die($mysqli->error()); 

		//     $id=$mysqli->query("SELECT id FROM states")or die($mysqli->error());
		// 	 $row=$id->fetch_assoc();
		// 	 $stateid=$row['id'];

	//  	foreach($array['Location'] as $city){
	//         if($unique2!=$city['ofc_city']){
	// 			$city_name=$city['ofc_city'];
	// 			$city_code =$city['cityId'];
	// 			$city_slug=$city['citySlug'];
 //    		$mysqli->query("INSERT INTO  cities(cityName, cityCode , slug,state_id) 
 //    		VALUES ('$city_name', '$city_code' , '$city_slug','$stateid')"); 
 //    		}
 //    	$unique2=$city['ofc_city'];
    	   
 //    	}
 //    }
 // 	$unique1=$state['ofc_state'];
	// }
?>

 -->

  





















<!-- 
<?php
$str=file_get_contents("sample.json");
$array=json_decode($str,true);
$states=array();
$unique1='';
$cities=array();
$count=0;
$id=array();
$row=array();
$unique2='';
?>

<?php
 $mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
 ?>


  <?php 
$index=0;
// foreach($array['Location'] as $state){
// 	if($unique1!=$state['ofc_state']){
// 	$states[$index]['name']=$state['ofc_state'];
// 	$states[$index]['code']=$state['state'];
// 	$states[$index]['slug']=$state['stateSlug'];
// 	$index++;}
// 	$unique1=$state['ofc_state'];
	
//  }
  foreach($array['Location'] as $state){
  if($unique1!=$state['ofc_state']){
	$state_name=$state['ofc_state'];
	$state_code =$state['state'];
	$state_slug=$state['stateSlug'];
	$index++;  
    $mysqli->query("INSERT INTO  state( statename, statecode , slug) 
    	VALUES ('$state_name', '$state_code' , '$state_slug')") 
        or die($mysqli->error()); 

    $id=$mysqli->query("SELECT id FROM state")or die($mysqli->error());
	 $row=$id->fetch_assoc();
	 $stateid=$row['id'];

	 foreach($array['Location'] as $city){
        if($unique2!=$city['ofc_city']){
	$city_name=$city['ofc_city'];
	$city_code =$city['cityId'];
	$city_slug=$city['citySlug'];

	
    $mysqli->query("INSERT INTO  city(cityname, state_id,slug,code) 
    	VALUES ('$city_name', '$stateid','$city_code' , '$city_slug',)"); 
    }
    $unique2=$city['ofc_city'];}
}
    $unique1=$state['ofc_state'];}
 ?> -->   <!-- <?php
	$mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
?>
<?php
 $str =file_get_contents("sample.json");
 $array = json_decode($str,true);
 ?>
<?php 
// $var1

$index = 0;
foreach ($array['Location'] as $state) {

// $array1['name_state'] = $state['ofc_state'];
// $array1['code_state'] = $state['state'];
// $array1['slug_state'] = $state['stateSlug'];

$var1 =  $state['ofc_state'];;
$var2 = $state['state'];
$var3 = $state['stateSlug'];
$mysqli->query("INSERT INTO state (statename,statecode,slug) VALUES ('$var1', '$var2', '$var3')") or die($mysqli->error);
$result = $mysqli->query("SELECT id from state ") or die($mysqli->error);
$row =$result->fetch_assoc();
$acs = array();
$acs[]=$row;

}
?>

<br> -->


<!-- <?php $index=1;
 foreach ($array1 as $final) { ?>
        <?php echo  $index ; ?>
        Name: <?php echo $final['name_state']; ?>
 		<br/>
 	    citycode: <?php echo $final['code_state']; ?>
 		<br/>
 		slug: <?php echo $final['slug_state']; ?>
 		<br>
 		<br>
 		 <?php $index++ ; ?>
<?php } ?> -->

<!-- 
........................................................................................... -->
<!-- <br>
<?php  $index = 0; 
foreach ($array['Location'] as $city) {
 $array2[$index]['name_city'] = $city['ofc_city'];
 $array2[$index]['code_city'] = $city['cityId'];
 $array2[$index]['slug_city'] = $city['citySlug'];
 $index++;	
 
}
?>
<?php $index=1;
 foreach ($array2 as $final1) { ?>
        <?php echo  $index ; ?>
        Name: <?php echo $final1['name_city']; ?>
 		<br/>
 	    citycode: <?php echo $final1['code_city']; ?>
 		<br/>
 		slug: <?php echo $final1['slug_city']; ?>
 		<br>
 		<br>
 		 <?php $index++ ; ?>
<?php } ?>
............................................................................................................................
 -->