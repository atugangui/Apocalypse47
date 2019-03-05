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
$major_advantages = file_get_contents("major_advantages.csv") ;
$major_advantages = explode("\r", $major_advantages) ;

$minor_advantages = file_get_contents("minor_advantages.csv") ;
$minor_advantages = explode("\r", $minor_advantages) ;

$major_disadvantages = file_get_contents("major_disadvantages.csv") ;
$major_disadvantages = explode("\r", $major_advantages) ;

$minor_disadvantages = file_get_contents("minor_disadvantages.csv") ;
$minor_disadvantages = explode("\r", $minor_disadvantages) ;
?>

<!DOCTYPE html>
<html>
<head>
      <title>Test</title>
      <meta charset="utf-8" />
</head>
   <body>
   	<form action="userSubmitted.php" method="post">  //Should be changed to whatever file we make is (purgatory.php)

   	<fieldset>
   		<legend>Race</legend>
	<select name="race" size = "5">
		<?php 
		foreach($races as $race){
			$race = explode(",", $race) ;
			$r = $race[0] ;
			?>
			<option value="<?= $r ?>"><?=$r ?></option>
		<?php }?>
		</select>
	</fieldset>

   	<fieldset>
   		<legend>Background</legend>
   		<p>Make sure that select a background that is on the same line as your choosen race.</p>
	<select name="background" size = "5">
		<?php 
		foreach($bgs as $bg){
			$bg = explode(",", $bg) ;
			$background = $bg[0] ;
			$race = $bg[1] ;
			?>
			<option value="<?= $background ?>"><?=$background ?> , <?=$race?></option>
		<?php }?>
		</select>
	</fieldset>

<fieldset>
   		<legend>Skills</legend>
   		<p>You start with ten points in a category of your choice, and twenty points in each of the other two.<br>
   		Remember to hold down control when picking multiple options</p>

   		<fieldset>
   			<legend>Physical</legend>
   			<select multiple="multiple" name="physical[]" size="5">
   				<?php 
		foreach($phys_skills as $phys){
			$phys = explode(",", $phys) ;
			$skill = $phys[0] ;
			$requirement = $phys[1] ;
			$cost = $phys[2] ;
			$training = $phys[3] ;
			?>
			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
   			</select>
   		</fieldset>

   		<fieldset>
   			<legend>Mental</legend>
   			<select multiple="multiple" name="mental[]" size="5">
   				<?php 
		foreach($ment_skills as $ment){
			$ment = explode(",", $ment) ;
			$skill = $ment[0] ;
			$requirement = $ment[1] ;
			$cost = $ment[2] ;
			$training = $ment[3] ;
			?>
			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
   			</select>
		</fieldset>

		<fieldset>
			<legend>Spiritual</legend>
			<select multiple="multiple" name="spiritual[]" size = "5">
				<?php 
		foreach($spirit_skills as $spirit){
			$spirit = explode(",", $spirit) ;
			$skill = $spirit[0] ;
			$requirement = $spirit[1] ; 
			$cost = $spirit[2] ;
			$training = $spirit[3] ;
			?>
			<option value="<?= $skill ?>"><?=$skill ?> , Requirement: <?=$requirement?> , Cost: <?=$cost?> , Training Required: <?=$training?></option>
		<?php }?>
			</select>
		</fieldset>
   	</fieldset>

   	<fieldset>
   		<legend>Advantages</legend>
   		<p>You may have two major and four minor advantages, or one major and two minor advantages.<br>
   		Make sure to balance this out by taking disadvantages so the total weight is zero.</p>

         <fieldset>
            <legend>Major Advantages</legend>
            <select multiple="multiple" name="maj_adv[]" size="5">
               <?php
               foreach($major_advantages as $major_advantage){
                  $maj_adv = explode(",", $major_advantage) ;
                  $advantage = $maj_adv[1] ;
                  $weight = $maj_adv[2] ;
                  ?>
                  <option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
               <?php }?>
            </select>
         </fieldset>

   		<fieldset>
   			<legend>Minor Advantages</legend>
   			<select multiple="multiple" name="min_adv[]" size="5">
   				<?php
   				foreach($minor_advantages as $minor_advantage) {
   					$min_adv = explode(",", $minor_advantage) ;
   					$advantage = $min_adv[1] ;
   					$weight = $min_adv[2] ;
   					?>
   					<option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }?>
   			</select>
   		</fieldset>

         <fieldset>
            <legend>Major Disadvantages</legend>
            <select multiple = "multiple" name="maj_dis[]" size="5">
               <?php
               foreach ($major_disadvantages as $major_disadvantage){
                  $maj_dis = explode(",", $major_disadvantage) ;
                  $advantage = $maj_dis[1] ;
                  $weight = $maj_dis[2] ;
                  ?>
                  <option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
               <?php }?>
            </select>
         </fieldset>

   		<fieldset>
   			<legend>Minor Disadvantages</legend>
   			<select multiple="multiple" name="min_dis[]" size="5">
   				<?php
   				foreach ($minor_disadvantages as $minor_disadvantage){
   					$min_dis = explode(",", $minor_disadvantage) ;
   					$advantage = $min_dis[1] ;
   					$weight = $min_dis[2] ;
   					?>
   					<option value="<?= $advantage ?>"><?=$advantage ?> , Weight:<?=$weight ?></option>
   				<?php }?>
   			</select>
   		</fieldset>

   	</fieldset>

      <fieldset>
         <legend>Traits</legend>
         <p>You can pick as many traits as you like</p>
         <select multiple="multiple" name="traits[]" size="5">
            <?php
            for($i=35; $i<41; $i++){
               $traits = explode(",", $advantages[$i]) ;
               $trait = $traits[1] ;
               ?>
               <option value="<?= $trait ?>"><?=$trait ?></option>
               <?php }?>
           </select>
      </fieldset>
    <input type="submit" name="submit"/>
  </form>
	
   </body>
   </html>
