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

print("hello");
echo "\n";
$phys_test[][];
for ($i=0; $i < sizeof($cphys); $i++) {
    $temp = explode(",",$cphys[$i]);

    for ($j=0; $j < sizeof($temp); $j++) {
        $phsy_test[$i][$j] = $temp[$j];
        print($phys_test[$i][$j]);
    }
}

print($phys_test[0][0]);
print("hell0");


//Insert into database
include("sqlQueries.php") ;

include("charactersheet.php") ;

?>
