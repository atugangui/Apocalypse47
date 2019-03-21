<?php
include ("getCharacterOptions.php") ;
?>

<html>
<head>
      <meta charset="utf-8" />
</head>
<body>

    <h2>Name:</h2>
    <p><?=$name ?></p>
    <p><?=$pronouns ?></p>

    <h2>Race:</h2>
    <p><?=$race ?></p>

    <h2>Background:</h2>
    <p><?=$background ?></p>

    <h2>Physical Skills:</h2>
      <button type="button">Edit</button>
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
    <a href="welcome.php" class="btn-primary">Return to Home Page</a>
</html>
