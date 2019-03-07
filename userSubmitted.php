<?php
include("mysql.php");
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
?>

<!DOCTYPE html>
<html>
<head>
      <title>New Character Submitted!</title>
      <meta charset="utf-8" />
</head>
<body>
    <h1>New Character Submitted!</h1>
    <p>Character will now be reviewed by Admin.</p>

    <h2>Name:</h2>
    //<p><?=$name ?></p>
      
    <h2>Race:</h2>
    <p><?=$race ?></p>
      
    <h2>Background:</h2>
    <p><?=$background ?></p>
      
    <h2>Physical Skills:</h2>
    <?php foreach($phys as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>
      
    <h2>Mental Skills</h2>
    <?php foreach($ment as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>
      
      <h2>Spiritual Skills</h2>
      <?php foreach($spirit as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>
      
      <h2>Advantages and Disadvantages</h2>
      <?php foreach($maj_adv as $maja){
      ?><p><?=$maja ?></p>
      <br>
      <?php } ?>
      <?php foreach($min_adv as $mina){
      ?><p><?=$mina ?></p>
      <br>
      <?php } ?>
      <?php foreach($maj_dis as $majd){
      ?><p><?=$majd ?></p>
      <br>
      <?php } ?>
      <?php foreach($min_dis as $mind){
      ?><p><?=$mind ?></p>
      <br>
      <?php } ?>
      
      <h2>Traits</h2>
      <?php foreach($traits as $trait){
      ?><p><?=$trait ?></p>
      <br>
      <?php } ?>

</body>
</html>
