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
$advantage_disadvantage_weight = 0;
for ($i=0; $i < sizeof($cphys); $i++) {
    $temp = explode(",",$cphys[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $physical_skills[$i][$j] = $temp[$j];
        $physical_cost = $physical_cost + $physical_skills[$i][1];
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
for ($i=0; $i < sizeof($cmaj_adv); $i++) {
    $temp = explode(",",$cmaj_adv[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $major_advantages[$i][$j] = $temp[$j];
        $advantage_disadvantage_weight = $advantage_disadvantage_weight + $major_advantages[$i][1];
    }
}
for ($i=0; $i < sizeof($cmin_adv); $i++) {
    $temp = explode(",",$cmin_adv[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $minor_advantages[$i][$j] = $temp[$j];
        $advantage_disadvantage_weight = $advantage_disadvantage_weight + $minor_advantages[$i][1];
    }
}
for ($i=0; $i < sizeof($cmaj_dis); $i++) {
    $temp = explode(",",$cmaj_dis[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $major_disadvantages[$i][$j] = $temp[$j];
        $advantage_disadvantage_weight = $advantage_disadvantage_weight + $major_disadvantages[$i][1];
    }
}
for ($i=0; $i < sizeof($cmin_dis); $i++) {
    $temp = explode(",",$cmin_dis[$i]);
    for ($j=0; $j < sizeof($temp); $j++) {
        $minor_disadvantages[$i][$j] = $temp[$j];
        $advantage_disadvantage_weight = $advantage_disadvantage_weight + $minor_disadvantages[$i][1];
    }
}
$errors=0;
if($advantage_disadvantage_weight!=0){
    $err[0] = "You need to balance your advantages properly.";
}
if($physical_cost + $mental_cost + $spiritual_cost > 50){
    $err[1] = "You have more than 50 total points. Do it better this time.";
}
if($physical_cost > 10 && $mental_cost > 10 && $spiritual_cost > 10){
    $err[2] = "You have to have one category with ten points and two with 20. None have less than 10. It's not that hard.";
}
if($physical_cost > 20 || $mental_cost > 20 || $spiritual_cost > 20){
    $err[3] = "No category can have more than 20 points. Try again.";
}
if ($errors==0) {
    //Insert into database
    include("sqlQueries.php") ;
    include("charactersheet.php") ;
} else {
    ?><script language="javascript" type="text/javascript">
        alert("You messed up " +
            <?php foreach ($errors as $error) {
                ?> <?= $error ?> " +"
            <?php } ?>

            );
        </script>
        <script language="javascript" type="text/javascript">
            history.go(-1);
        </script>

    <?php }

    ?>
