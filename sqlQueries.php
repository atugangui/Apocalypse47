<?php
include("mysql.php");
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

try {
     $stmt= $conn->prepare("INSERT INTO character_table (char_name, race, char_pronouns, background)
     VALUES(:name, :race, :pronouns, :background)");
     $stmt->execute(":name"=>$name, ":race"=>$race, ":pronouns"=>$pronouns, ":background"=>$background) ;
   }
   catch (Exception $e){
     echo $e;
   }

try {
foreach($phys as $p){
    $stmt = $conn->prepare("INSERT INTO character_physical_skills (skill_name) VALUES(:p)");
    $stmt->execute(":p"=>$p) ;
   }
   }
   catch(Exception $e){
    echo $e ;
    }



?>
