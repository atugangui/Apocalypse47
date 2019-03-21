<!DOCTYPE html>
<html>
<head>
      <link href="edit.css" type="text/css" rel="stylesheet"/>
      <script src="edit.js" type="text/javascript"></script>
      <meta charset="utf-8" />
</head>
<body>
<?php
include ("getCharacterOptions.php") ;
?>

    <h2>Name:</h2>
    <p><?=$cname ?></p>
    <p><?=$pronouns ?></p>

    <h2>Race:</h2>
    <p><?=$crace ?></p>

    <h2>Background:</h2>
    <p><?=$cbackground ?></p>
<button onlick= "test()">Test</button>
	

    <h2>Physical Skills:</h2>
      <button onlick= "edit_char()">Edit</button>
		
		<div id="physDropdown" class="dropdown-content">
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
		</div>

    <?php foreach($cphys as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>

    <h2>Mental Skills</h2>
    <?php foreach($cment as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>

      <h2>Spiritual Skills</h2>
      <?php foreach($cspirit as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>

      <h2>Advantages and Disadvantages</h2>
      <?php foreach($cmaj_adv as $maja){
      ?><p><?=$maja ?></p>
      <br>
      <?php } ?>
      <?php foreach($cmin_adv as $mina){
      ?><p><?=$mina ?></p>
      <br>
      <?php } ?>
      <?php foreach($cmaj_dis as $majd){
      ?><p><?=$majd ?></p>
      <br>
      <?php } ?>
      <?php foreach($cmin_dis as $mind){
      ?><p><?=$mind ?></p>
      <br>
      <?php } ?>

      <h2>Traits</h2>
      <?php foreach($ctraits as $trait){
      ?><p><?=$trait ?></p>
      <br>
      <?php } ?>

</body>
    <a href="welcome.php" class="btn-primary">Return to Home Page</a>
</html>
