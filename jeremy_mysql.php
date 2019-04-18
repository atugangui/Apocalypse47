<?php
/*
This file contains the class for the mysql connection and all its functions/interactions
*/
class mysqlFunctions{
  function __construct(){
    include("config.php");
    $connect="mysql:host=$server;dbname=$database";
    try {
      $db = new PDO($connect, $username, $password);
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    $this->db=$db;
  }


  function updateName($id, $name){
    $db=$this->db;
    try {
      $stmt = $db->prepare("update character_table set char_name=:name where char_id=:id");
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
