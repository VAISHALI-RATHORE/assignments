<?php
  $str=file_get_contents("food.json");
  $array=json_decode($str,true);
  $items = $array['items']['item'];
      echo "<pre>";
      print_r($array);
      return;
      echo "<br/>";
  $mysqli = new mysqli('localhost','root','','food') or die(mysql_error($mysqli));
  
  foreach ($items as $item) {
      $type = isset($item['type']) ? $item['type'] : '';
      $name = isset($item['name']) ? $item['name'] : '';
      $ppu = isset($item['ppu']) ? $item['ppu'] : '';
      
      $mysqli->query("INSERT INTO  main (type, name , ppu) VALUES ('$type', '$name' , '$ppu')"); 
      
      $item_id = $mysqli->insert_id;

      // echo $item_id;
      // echo "<br/>";
         
      if(isset($item['batters']['batter'])){
        foreach ($item['batters']['batter'] as $batter) {
          $type = isset($batter['type']) ? $batter['type'] : '';

          $mysqli->query("INSERT INTO  batters (type, item_id, status) VALUES ('$type', '$item_id', '1')") ;
        }
      }

      if(isset($item['topping'])){
        foreach ($item['topping'] as $topping) {
          $type = isset($topping['type']) ? $topping['type'] : '';
          
          $mysqli->query("INSERT INTO  toppings (type, item_id) VALUES ('$type', '$item_id')");           
        }
      }

      if(isset($item['fillings']['filling'])){
        foreach ($item['fillings']['filling'] as $filling) {
          $name = isset($filling['name']) ? $filling['name'] : '';
          $addcost = isset($filling['addcost']) ? $filling['addcost'] : '';
          
          $mysqli->query("INSERT INTO  fillings (name, addcost, item_id) VALUES ('$name', '$addcost', '$item_id')");
        }
      }
    }
?>