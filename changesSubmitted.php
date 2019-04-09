<?php
include("mysql.php");

//Gather user input information
$cchar_id = $_REQUEST["char_id"];
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

$physical_cost = 0;
$mental_cost = 0;
$spiritual_cost = 0;

for ($i=0; $i < sizeof($cphys); $i++) {
    $temp = explode(",",$cphys[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $physical_skills[$i][$j] = $temp[$j];
        $physical_cos = $physical_cos + $physical_skills[$i][1];
    }
}

for ($i=0; $i < sizeof($cment); $i++) {
    $temp = explode(",",$cment[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $mental_skills[$i][$j] = $temp[$j];
        $mental_cost = $mental_cost + $mental_skills[$i][1];
    }
}

for ($i=0; $i < sizeof($cspirit); $i++) {
    $temp = explode(",",$cspirit[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $spiritual_skills[$i][$j] = $temp[$j];
        $spiritual_cost = $spiritual_cost + $spiritual_skills[$i][1];
    }
}

print($spiritual_cost);

# Do the points sum up
//if physical is ten, 
	// and ifmental and spirital are twenty
	// else ya fucked up


// if mental is ten
	// and if phsy adn psirital are twenty
	// else ya fucked up

// if spiritual is ten
	// and phsy and mental are twenty
	// else ya fucked up


print($phys_test[0][0]);



//Insert into database
include("sqlQueries.php") ;

include("charactersheet.php") ;

?>
