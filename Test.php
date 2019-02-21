<?php

//Get movie title, year, and rating
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
$advantages = file_get_contents("advantage_disadvantages.csv") ;
$advantages = explode("\r", $advantages) ;
?>
<!DOCTYPE html>
<html>
<head>
      <title>Test</title>
      <meta charset="utf-8" />
</head>
   <body>

   	<fieldset>
   		<legend>Race</legend>
	<select id="race" size = "5">
		<?php 
		foreach($races as $race){
			$race = explode(",", $race) ;
			$r = $race[0] ;
			?>
			<option><?=$r ?></option>
		<?php }?>
		</select>
	</fieldset>

   	<fieldset>
   		<legend>Background</legend>
	<select id="background" size = "5">
		<?php 
		foreach($bgs as $bg){
			$bg = explode(",", $bg) ;
			$background = $bg[0] ;
			$race = $bg[1] ;
			?>
			<option><?=$background ?> , <?=$race?></option>
		<?php }?>
		</select>
	</fieldset>

<fieldset>
   		<legend>Skills</legend>

   		<fieldset>
   			<legend>Physical</legend>
   			<select id="physical" size="5">
   				<?php 
		foreach($phys_skills as $phys){
			$phys = explode(",", $phys) ;
			$skill = $phys[0] ;
			$requirement = $phys[1] ;
			$cost = $phys[2] ;
			$training = $phys[3] ;
			?>
			<option><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
   			</select>
   		</fieldset>

   		<fieldset>
   			<legend>Mental</legend>
   			<select id="mental" size="5">
   				<?php 
		foreach($ment_skills as $ment){
			$ment = explode(",", $ment) ;
			$skill = $ment[0] ;
			$requirement = $ment[1] ;
			$cost = $ment[2] ;
			$training = $ment[3] ;
			?>
			<option><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
   			</select>
		</fieldset>

		<fieldset>
			<legend>Spiritual</legend>
			<select id="spiritual" size = "5">
				<?php 
		foreach($spirit_skills as $spirit){
			$spirit = explode(",", $spirit) ;
			$skill = $spirit[0] ;
			$requirement = $spirit[1] ; 
			$cost = $spirit[2] ;
			$training = $spirit[3] ;
			?>
			<option><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
			</select>
		</fieldset>
   	</fieldset>

   	<fieldset>
   		<legend>Advantages</legend>

   		<fieldset>
   			<legend>Minor Advantages</legend>
   			<select id="min_adv" size="5">
   				<?php
   				for ($i=1; $i<18; $i++) {
   					$min_adv = explode(",", $advantages[$i]) ;
   					$advantage = $min_adv[1] ;
   					$weight = $min_adv[2] ;
   					?>
   					<option><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }?>
   			</select>
   		</fieldset>

		<fieldset>
   			<legend>Major Advantages</legend>
   			<select id="maj_adv" size="5">
   				<?php
   				for ($i=18; $i<35; $i++) {
   					$maj_adv = explode(",", $advantages[$i]) ;
   					$advantage = $maj_adv[1] ;
   					$weight = $maj_adv[2] ;
   					?>
   					<option><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }?>
   			</select>
   		</fieldset>

   		<fieldset>
   			<legend>Minor Disadvantages</legend>
   			<select id="min_dis" size="5">
   				<?php
   				for ($i=43; $i<53; $i++) {
   					$min_dis = explode(",", $advantages[$i]) ;
   					$advantage = $min_dis[1] ;
   					$weight = $min_dis[2] ;
   					?>
   					<option><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }?>
   			</select>
   		</fieldset>

   		<!-- <fieldset>
   			<legend>Major Disadvantages</legend>
   			<select id="min_adv" size="5">
   				<?php/*
   				for ($i=1; $i<18; $i++) {
   					$min_adv = explode(",", $advantages[$i]) ;
   					$advantage = $min_adv[1] ;
   					$weight = $min_adv[2] ;
   					?>
   					<option><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }*/?>
   			</select>
   		</fieldset> -->
   	</fieldset>
	
   </body>
   </html>
