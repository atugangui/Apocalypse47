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
     $sql = "INSERT INTO character_table (char_name) VALUES ('Peter')";
     if(mysqli_stmt_execute($conn, $sql)){
        mysqli_stmt_store_result($sql) ;
        echo "we did a thing";}
     else{ echo "Didnt do the thing";}
   }
   catch (Exception $e){
     echo $e;
     echo "error couldnt execute sql";
   }
   mysql_close($conn);
?>