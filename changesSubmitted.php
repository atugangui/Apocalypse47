<?php
include("mysql.php");

//Gather user input information
$cchar_id = $_REQUEST["char_id"];
echo 1 ;
$cname = $_REQUEST["name"] ;
$cpronouns = $_REQUEST["pronouns"];
$crace = $_REQUEST["race"] ;
$cbackground = $_REQUEST["background"] ;
$cphys = $_REQUEST["physical"] ;
$cment = $_REQUEST["mental"] ;
$cspirit = $_REQUEST["spiritual"] ;
$cmaj_adv = $_REQUEST["maj_adv"] ;
$cmin_adv = $_REQUEST["min_adv"] ;
$cmaj_dis = $_REQUEST["maj_dis"] ;
$cmin_dis = $_REQUEST["min_dis"] ;
$ctraits = $_REQUEST["traits"] ;

//Insert into database
include("sqlQueries.php") ;

include("charactersheet.php") ;

?>
