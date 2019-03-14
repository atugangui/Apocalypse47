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

//Pull player ID related to email
try{
 $stmt = $conn->prepare("SELECT player_id FROM player_table WHERE email= :email") ;
 if($stmt->execute(array(":email"=>$email))){
  $player_id = $stmt->fetch(PDO::FETCH_ASSOC) ;
  $pid = $player_id['player_id'];
 } }
catch(Exception $e){
  echo $e ;
 }

//All SQL queries to insert character information into player database

//Insert player ID, name, race, pronouns, background, and point values
 try{
  
  $stmt= $conn->prepare("INSERT INTO character_table (player_id, char_name, race, char_pronouns, background, total_cp, 
                                                      total_bp, remaining_cp, remaining_bp, cumulative_xp) 
                         VALUES(:param_pid, :param_name, :param_race, :param_prons, :param_bg, :param_cp, 
                                :param_bp, :param_rcp, :param_rbp, :param_xp)");
$stmt->execute(array("param_pid"=>$pid, ":param_name"=>$name, ":param_race"=>$race, ":param_prons"=>$pronouns, ":param_bg"=>$background,
                         ":param_cp"=>'50', ":param_bp"=>'0', ":param_rcp"=>'50', ":param_rbp"=>'0', ":param_xp"=>'0')) ;

$charID = $conn->lastInsertId() ;

  //Insert physical skills
foreach($phys as $p){
   $stmt= $conn->prepare("INSERT INTO character_physical_skills (char_id, skill_name) VALUES(:param_cid, :param_phys)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_phys"=>$p)) ;
}

  //Insert mental skills
foreach($ment as $m){
   $stmt= $conn->prepare("INSERT INTO character_mental_skills (char_id, skill_name) VALUES(:param_cid, :param_ment)");
$stmt->execute(array(":param_cid"=>$charID, ":param_ment"=>$m)) ;
}

  //Insert spiritual skills
foreach($spirit as $s){
   $stmt= $conn->prepare("INSERT INTO character_spiritual_skills (char_id, skill_name) VALUES(:param_cid, :param_spirit)");
$stmt->execute(array(":param_cid"=>$charID, ":param_spirit"=>$s)) ;
}

  //Insert major advantages
foreach($maj_adv as $maja){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_maja)");
  $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_advantage', ":param_maja"=>$maja)) ;
}
  
    //Insert minor advantages
foreach($min_adv as $mina){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mina)");
  $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_advantage', ":param_mina"=>$mina)) ;
}
  
   //Insert major advantages
foreach($maj_dis as $majd){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_majd)");
  $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_disadvantage', ":param_majd"=>$majd)) ;
}
  
   //Insert minor disadvantages
foreach($min_dis as $mind){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mind)");
  $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_disadvantage', ":param_mind"=>$mind)) ;
}
  
   //Insert traits
foreach($traits as $trait){
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_trait)");
  $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'trait', ":param_trait"=>$trait)) ;
}

}catch(Exception $e){
 echo $e ;
}
      
?>
