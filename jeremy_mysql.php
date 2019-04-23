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

function updatePron($id, $pron){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_table set char_pronouns=:pron where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":pron"=>$pron));
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

  function updateBg($id, $background){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_table set background=:background where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":background"=>$background));
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

  function updatePhys($id, $phys){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_physical_skills set skill_name=:phys where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":phys"=>$phys));
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

  function updateMent($id, $ment){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_mental_skills set skill_name=:ment where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":ment"=>$ment));
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

  function updateSpirit($id, $spirit){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("update character_spirit_skills set skill_name=:spirit where char_id=:id");
      $stmt->execute(array(":id"=>$id, ":spirit"=>$spirit));
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