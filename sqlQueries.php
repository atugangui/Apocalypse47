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
echo $name ;
try {
     $sql = "INSERT INTO character_table (name) VALUES ('Peter')";
     echo "we did a thing";
   }
   catch (Exception $e){
     echo $e;
     echo "error couldnt execute sql";
   }
   mysql_close($conn);
?>