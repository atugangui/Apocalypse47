<?php
include ("mysql.php") ;

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$email = $_SESSION["username"] ;
echo $email ;

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

//Pull player ID related to email
try{
 $stmt = $conn->prepare("SELECT player_id FROM player_table WHERE email= :email") ;
 if($stmt->execute(array(":email"=>$email))){
  $player_id = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
  $pid = $player_id[0] ;
  echo $pid ;
 } }
catch(Exception $e){
  echo $e ;
 }

//SQL queries to insert character information into player database
 try{
  
  $stmt= $conn->prepare("INSERT INTO character_table (player_id, char_name, race, char_pronouns, background, total_cp, 
                                                      total_bp, remaining_cp, remaining_bp, cumulative_xp) 
                         VALUES(:param_pid, :param_name, :param_race, :param_prons, :param_bg, :param_cp, 
                                :param_bp, :param_rcp, :param_rbp, :param_xp)");
  if($stmt->execute(array("param_pid"=>$player_id[0], ":param_name"=>$name, ":param_race"=>$race, ":param_prons"=>$pronouns, ":param_bg"=>$background,
                         ":param_cp"=>'50', ":param_bp"=>'0', ":param_rcp"=>'50', ":param_rbp"=>'0', ":param_xp"=>'0'))){
           echo nl2br("Name, race, pronouns, and background inserted.\n") ;
      }

$charID = $conn->lastInsertId() ;

  //Insert physical skills
foreach($phys as $p){
   $stmt= $conn->prepare("INSERT INTO character_physical_skills (char_id, skill_name) VALUES(:param_cid, :param_phys)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_phys"=>$p) )){
           echo nl2br("Physical skills inserted.\n") ;
      }  
}

  //Insert mental skills
foreach($ment as $m){
   $stmt= $conn->prepare("INSERT INTO character_mental_skills (char_id, skill_name) VALUES(:param_cid, :param_ment)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_ment"=>$m) )){
           echo nl2br("Mental skills inserted.\n") ;
      }
}

  //Insert spiritual skills
foreach($spirit as $s){
   $stmt= $conn->prepare("INSERT INTO character_spiritual_skills (char_id, skill_name) VALUES(:param_cid, :param_spirit)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_spirit"=>$s) )){
           echo nl2br("Spiritual skills inserted.\n") ;
      }
}

  //Insert major advantages
foreach($maj_adv as $maja){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_maja)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_advantage', ":param_maja"=>$maja) )){
           echo nl2br("Major advantages inserted.\n");
      }
}
  
    //Insert minor advantages
foreach($min_adv as $mina){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mina)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_advantage', ":param_mina"=>$mina) )){
           echo nl2br("Minor advantages inserted.\n") ;
      }
}
  
   //Insert major advantages
foreach($maj_dis as $majd){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_majd)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_disadvantage', ":param_majd"=>$majd) )){
           echo nl2br("Major disadvantages inserted.\n") ;
      }
}
  
   //Insert minor disadvantages
foreach($min_dis as $mind){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mind)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_disadvantage', ":param_mind"=>$mind) )){
           echo nl2br("Minor disadvantages inserted.\n") ;
      }
}
  
   //Insert traits
foreach($traits as $trait){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_trait)");
  if($stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'trait', ":param_trait"=>$trait) )){
           echo nl2br("Traits inserted.\n") ;
      }
}
  
 }
catch(Exception $e){
 echo $e ;
}
      
?>
