<?php
include("mysql.php");

//Gather user input information
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

//Insert into database
include("sqlQueries.php") ;

include("charactersheet.php") ;

?>
