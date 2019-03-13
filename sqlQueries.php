<?php
include ("mysql.php") ;

//Grabbing character information from creation page
$name = $_REQUEST["name"] ;
$pronouns = $_REQUEST["pronouns"] ;
$race = $_REQUEST["race"] ;
$background = $_REQUEST["background"] ;
$phys = $_REQUEST["physical"] ;
$ment = $_REQUEST["mental"] ;
$spirit = $_REQUEST["spiritual"] ;
$maj_adv = $_REQUEST["maj_adv"] ;
$min_adv = $_REQUEST["min_adv"] ;
$maj_dis = $_REQUEST["maj_dis"] ;
$min_dis = $_REQUEST["min_dis"] ;
$traits = $_REQUEST["traits"] ;

//SQL queries to insert character information into player database
 try{
  $stmt= $conn->prepare("INSERT INTO character_table (char_name, race, char_pronouns, background) 
                         VALUES(:param_name, :param_race, :param_prons, :param_bg)");
  if($stmt->execute(array(":param_name"=>$name, ":param_race"=>$race, ":param_prons"=>$pronouns, ":param_bg"=>$background))){
           echo nl2br("Name, race, pronouns, and background inserted.\n") ;
      }

$charId = $conn->lastInsertId() ;

  //Insert physical skills
foreach($phys as $p){
   $stmt= $conn->prepare("INSERT INTO character_physical_skills (skill_name) VALUES(:param_cid, :param_phys)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_phys"=>$p) )){
           echo nl2br("Physical skills inserted.\n") ;
      }  
}

  //Insert mental skills
foreach($ment as $m){
   $stmt= $conn->prepare("INSERT INTO character_mental_skills (skill_name) VALUES(:param_cid, :param_ment)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_ment"=>$m) )){
           echo nl2br("Mental skills inserted.\n") ;
      }
}

  //Insert spiritual skills
foreach($spirit as $s){
   $stmt= $conn->prepare("INSERT INTO character_spiritual_skills (skill_name) VALUES(:param_cid, :param_spirit)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_spirit"=>$s) )){
           echo nl2br("Spiritual skills inserted.\n") ;
      }
}

  //Insert major advantages
foreach($maj_adv as $maja){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (TYPE, NAME) VALUES(:param_cid, :param_type, :param_maja)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_advantage', ":param_maja"=>$maja) )){
           echo nl2br("Major advantages inserted.\n");
      }
}
  
    //Insert minor advantages
foreach($min_adv as $mina){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (TYPE, NAME) VALUES(:param_cid, :param_type, :param_mina)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_advantage', ":param_mina"=>$mina) )){
           echo nl2br("Minor advantages inserted.\n") ;
      }
}
  
   //Insert major advantages
foreach($maj_dis as $majd){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (TYPE, NAME) VALUES(:param_cid, :param_type, :param_majd)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_disadvantage', ":param_majd"=>$majd) )){
           echo nl2br("Major disadvantages inserted.\n") ;
      }
}
  
   //Insert minor disadvantages
foreach($min_dis as $mind){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (TYPE, NAME) VALUES(:param_cid, :param_type, :param_mind)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_disadvantage', ":param_mind"=>$mind) )){
           echo nl2br("Minor disadvantages inserted.\n") ;
      }
}
  
   //Insert traits
foreach($traits as $trait){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (TYPE, NAME) VALUES(:param_cid, :param_type, :param_trait)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'trait', ":param_trait"=>$trait) )){
           echo nl2br("Traits inserted.\n") ;
      }
}
  
 }
catch(Exception $e){
 echo $e ;
}
      
?>
