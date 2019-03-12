<?php
require_once "config.php" ;

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

     $query = "INSERT INTO character_table (char_name, race, background) VALUES(?,?,?)" ;
     if($stmt = mysqli_prepare($link, $query)){
        mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_race, $param_bg) ;

        $param_name = $name ;
        $param_race = $race ;
        $param_bg = $background ;

        if(mysqli_stmt_execute($stmt)){
            echo "good" ;
            }
            else{
            echo "bad" ;
            }
     mysqli_stmt_close($stmt) ;

   mysqli_close($link);
?>