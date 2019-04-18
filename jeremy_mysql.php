<?php
/*
This file contains the class for the mysql connection and all its functions/interactions
*/
class mysqlFunctions{
  function __construct() {
    include("mysql.php");
    $this->conn = $conn ;
  }
  function updateName($id, $name){
    $conn = $this->conn ;
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

  function updateRace($id, $race){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_table set race=:race where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":race"=>$race));
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