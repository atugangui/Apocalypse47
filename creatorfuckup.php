<?php

$races = file_get_contents("race_types.csv") ;
$races = explode("\r", $races) ;
$bgs = file_get_contents("background_choices.csv") ;
$bgs = explode("\r", $bgs) ;
$phys_skills = file_get_contents("physical_skills_available.csv") ;
$phys_skills = explode("\r", $phys_skills);
$ment_skills = file_get_contents("mental_skills_available.csv") ;
$ment_skills = explode("\r", $ment_skills) ;
$spirit_skills = file_get_contents("spiritual_skills_available.csv") ;
$spirit_skills = explode("\r", $spirit_skills) ;
$major_advantages = file_get_contents("major_advantages.csv") ;
$major_advantages = explode("\r", $major_advantages) ;

$minor_advantages = file_get_contents("minor_advantages.csv") ;
$minor_advantages = explode("\r", $minor_advantages) ;

$major_disadvantages = file_get_contents("major_disadvantages.csv") ;
$major_disadvantages = explode("\r", $major_disadvantages) ;

$minor_disadvantages = file_get_contents("minor_disadvantages.csv") ;
$minor_disadvantages = explode("\r", $minor_disadvantages) ;

$traits = file_get_contents("traits.csv") ;
$traits = explode("\r", $traits) ;
?>

<!DOCTYPE html>
<html>
<head>
      <title>Test</title>
      <meta charset="utf-8" />
      <script src = "/Users/Ericaholland/WebstormProjects/NetDev/Softdev/creatorfuckaround.js"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   <body>
   	<form action="changesSubmitted.php" method="post">

	<fieldset>
		<legend>Name and Pronouns</legend>
		<input type="text" name="name" /> <br />
		<input type="text" name="pronouns" /> <br />
	</fieldset>

	<select id="first-choice">
      <option selected value="base">Please Select</option>
      <option value="human">Human</option>
      <option value="havassian">Havassian</option>
    </select>

    <br>

    <select id="second-choice">
      <option>Please choose from above</option>
    </select>

   </body>
   </html>
