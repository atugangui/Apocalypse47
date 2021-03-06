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
      $stmt = $conn->prepare("DELETE FROM character_physical_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));
      foreach($phys as $p){
      $stmt = $conn->prepare("INSERT INTO character_physical_skills (char_id, skill_name) VALUES(:id, :phys)");
      $stmt->execute(array(":id"=>$id, ":phys"=>$p)) ;
      }
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
      $stmt = $conn->prepare("DELETE FROM character_mental_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));
      foreach($ment as $m){
      $stmt = $conn->prepare("INSERT INTO character_mental_skills (char_id, skill_name) VALUES(:id, :ment)");
      $stmt->execute(array(":id"=>$id, ":ment"=>$m)) ;
      }
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
      $stmt = $conn->prepare("DELETE FROM character_spiritual_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));
      foreach($spirit as $s){
      $stmt = $conn->prepare("INSERT INTO character_spiritual_skills (char_id, skill_name) VALUES(:id, :spirit)");
      $stmt->execute(array(":id"=>$id, ":spirit"=>$s)) ;
      }
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
    function updateAdvant($id, $advant, $type){
    $conn = $this->conn ;
    try {
      if($type === "maja"){
        $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv WHERE TYPE=:type AND char_id=:id");
        $stmt->execute(array(":id"=>$id, ":type"=>'major_advantage'));
        foreach($advant as $a){
          $stmt = $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, NAME, TYPE) VALUES(:id, :advant, :type)");
          $stmt->execute(array(":id"=>$id, ":advant"=>$a, ":type"=>'major_advantage')) ;
        }
     }
        if($type === "majd"){
          $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv WHERE TYPE=:type AND char_id=:id");
          $stmt->execute(array(":id"=>$id, ":type"=>'major_disadvantage'));
            foreach($advant as $a){
                $stmt = $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, NAME, TYPE) VALUES(:id, :advant, :type)");
                $stmt->execute(array(":id"=>$id, ":advant"=>$a, ":type"=>'major_disadvantage')) ;
            }
        }
    if($type === "mina"){
        $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv WHERE TYPE=:type AND char_id=:id");
        $stmt->execute(array(":id"=>$id, ":type"=>'minor_advantage'));
        foreach($advant as $a){
        $stmt = $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, NAME, TYPE) VALUES(:id, :advant, :type)");
        $stmt->execute(array(":id"=>$id, ":advant"=>$a, ":type"=>'minor_advantage')) ;
        }
    }
    if($type === "mind"){
        $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv WHERE TYPE=:type AND char_id=:id");
        $stmt->execute(array(":id"=>$id, ":type"=>'minor_disadvantage'));
        foreach($advant as $a){
        $stmt = $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, NAME, TYPE) VALUES(:id, :advant, :type)");
        $stmt->execute(array(":id"=>$id, ":advant"=>$a, ":type"=>'minor_disadvantage')) ;
        }
    }
    if($type === "trait"){
        $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv WHERE TYPE=:type AND char_id=:id");
        $stmt->execute(array(":id"=>$id, ":type"=>'trait'));
        foreach($advant as $t){
        $stmt = $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, NAME, TYPE) VALUES(:id, :trait, :type)");
        $stmt->execute(array(":id"=>$id, ":trait"=>$t, ":type"=>'trait')) ;
        }
    }
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

  function deleteCharacter($id){
    $conn = $this->conn ;
    try {
      $stmt = $conn->prepare("DELETE FROM character_table where char_id=:id");
      $stmt->execute(array(":id"=>$id));

      $stmt = $conn->prepare("DELETE FROM character_physical_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));

      $stmt = $conn->prepare("DELETE FROM character_mental_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));

      $stmt = $conn->prepare("DELETE FROM character_spiritual_skills where char_id=:id");
      $stmt->execute(array(":id"=>$id));

      $stmt = $conn->prepare("DELETE FROM character_adv_and_disadv where char_id=:id");
      $stmt->execute(array(":id"=>$id));
    }
    catch (Exception $e) {
      echo $e;
    }
  }
}
 ?>