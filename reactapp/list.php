<?php
  $mysqli = new mysqli('localhost','root','','project1') or die(mysql_error($mysqli));
  $result=array();
  $row=array();
  $states=array();
  $state_name='';
  $str1='';
  $arr=array();
  $record_per_page = 5;  
  $page = '';  
  $output = '';
  $search = isset($_POST['search']) ? $_POST['search']:'';
  $selection = isset($_POST['selection']) ? $_POST['selection']:'';
  $selection2 = isset($_POST['selection2']) ? $_POST['selection2']:'';
  $title = 'Repellat unde soluta aut.';
  
 

  $query = "SELECT articles.id, title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id";

  if(isset($_POST['search']) && $_POST['search']!='') {
  	$query = "SELECT articles.id, title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id WHERE title like '%$search%'";
  } 
  else if (isset($_POST['selection']) && $_POST['selection']!='') {
   if($_POST['selection']=="latest")
    {
      $query = "SELECT articles.id, title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  ORDER BY date_of_update DESC LIMIT 10";
    }
   else if($_POST['selection']=="popularity")
   {
    $query = " SELECT articles.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  ORDER BY views DESC LIMIT 10";
   }
  }

  if(isset($_POST['selection2']) && $_POST['selection2']!='') {
   if($_POST['selection2']=="serious")
  {
      $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  WHERE no_of_views >= 100";
  }
  else if($_POST['selection2']=="light")
   {
      $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  WHERE no_of_views < 100";
  }
   else if($_POST['selection2']=="all")
  {
    $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id";
  }

  }
   if(isset($_POST['id']) && $_POST['id']!='') {
    $id= $_POST['id'];
    
   
    $query = "SELECT no_of_views,date_of_update FROM articles WHERE id='$id'";
    $result=$mysqli->query($query)or die($mysqli->error());
    $row=$result->fetch_assoc();
  
$views=$row['no_of_views'];
$views++;

$query = "UPDATE articles SET no_of_views='$views' where id='$id'";
    $result=$mysqli->query($query)or die($mysqli->error());
    
   // $row=$result->fetch_assoc(); $articles[]=$row; 
   // print_r($articles);


  } 


  
 // if(isset($_POST["page"]))  
 // {  
 //      $page = $_POST["page"];  
 // }  
 // else  
 // {  
 //      $page = 1;  
 // }  
 // $start_from = ($page - 1)*$record_per_page;  
 // $total_rid = "SELECT COUNT(id) FROM articles ORDER BY id DESC";  
 // $result=$mysqli->query($total_id)or die($mysqli->error());
 // $total_pages = ceil($total_id/$record_per_page);  
 // for($i=1; $i<=$total_pages; $i++)  
 // {  
 //      $output .= "<a href='index.php'></a>";  
 // }  
 // $output .= '</div><br /><br />';  
 // echo $output;
  
  $result=$mysqli->query($query)or die($mysqli->error());
  if($result->num_rows>0) {
  	while($row=$result->fetch_assoc()){ $articles[]=$row; }
	echo json_encode($articles);
  } else {
  	echo json_encode(array());
  }
  
?>