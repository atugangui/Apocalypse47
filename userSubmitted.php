<?php
include("mysql.php");
$race = $_REQUEST["race"] ;
$background = $_REQUEST["background"] ;
$phys = $_REQUEST["physical[]"] ;
$ment = $_REQUEST["mental[]"] ;
$spirit = $_REQUEST["spiritual[]"] ;
$maj_adv = $_REQUEST["maj_adv[]"] ;
$min_adv = $_REQUEST["min_adv[]"] ;
$maj_dis = $_REQUEST["maj_dis[]"] ;
$min_dis = $_REQUEST["min_dis[]"] ;
$traits = $_REQUEST["traits[]"] ;

var_dump($phys) ;

?>

<!DOCTYPE html>
<html>
<head>
      <title>New Character Submitted</title>
      <meta charset="utf-8" />
</head>
<body>
    <h1>New Character Submitted</h1>
    <p>Character will now be reviewed by Admin</p>

    <h2>Name:</h2>
    <p><?=$name ?></p>
    <h2>Race:</h2>
    <p><?=$race?></p>
    <h2>Background:</h2>
    <p><?=background?></p>
    <h2>Physical Skills:</h2>
    //<p><?=background?></p>

</body>
   </html>
