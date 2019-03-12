<?php
include ("mysql.php") ;

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
 try{
  $stmt= $conn->prepare("INSERT INTO character_table (char_name, race, background) VALUES(:param_name, :param_race, :param_bg)");
  if($stmt->execute(array(":param_name"=>$name, ":param_race"=>$race, ":param_bg"=>$background))){
           echo "worked" ;
      }
 }
catch(PDOException $e){
     echo $e->getMessage() ;
}

$charId = $conn->lastInsertId() ;

foreach($maj_adv as $ma){
 try{
   $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (NAME) VALUES(:param_ma)");
  if($stmt->execute(array(":param_ma"=>$ma) )){
           echo "worked" ;
      }
     }
catch(PDOException $e){
     echo $e->getMessage() ;
}
     
}
      
?>
