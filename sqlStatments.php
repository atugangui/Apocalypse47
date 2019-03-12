<?php
include("mysql.php");
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

$stmt = ("INSERT INTO character_table (race, background) VALUES(:race, :background)");
$stmt = ("INSERT INTO character_physical_skills (skill_name) VALUES($phys)");
$stmt = ("INSERT INTO character_mental_skills (skill_name) VALUES($ment)");
$stmt = ("INSERT INTO character_spiritual_skills (skill_name) VALUES($sprit)");
$stmt = ("INSERT into character_adv_and_disadv (TYPE, name) VALUES("major_advantage", $maj_adv)");
$stmt = ("INSERT into character_adv_and_disadv (TYPE, name) VALUES("minor_advantage", $min_adv)");
$stmt = ("INSERT into character_adv_and_disadv (TYPE, name) VALUES("major_disadvantage", $maj_dis)");
$stmt = ("INSERT into character_adv_and_disadv (TYPE, name) VALUES("minor_disadvantage", $min_dis)");
$stmt = ("INSERT into character_adv_and_disadv (TYPE, name) values("trait", $trait");

try {
     $stmt= $conn->prepare("INSERT INTO character_table (race, background) VALUES(:race, :background)");
     $stmt->execute(array(":race"=>$race, ":background"=>$background)) ;
      
   }
   catch (Exception $e){
     echo $e;
   }

?>
