<?php
/*
This file contains the class for the mysql connection and all its functions/interactions
*/
class mysqlFunctions{

  function construct() {
    include("mysql.php");
  }



  function updateName($id, $name){
    try {
      $stmt = $conn->prepare("update character_table set char_name=:name where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":name"=>$name));
      $count = $stmt->rowCount();
      if($count =='0'){
          return false;
      }
      else{
          return true;
      }
      //var_dump($rows);
    }
    catch (Exception $e) {
      echo $e;
    }
  }
}
 ?>
