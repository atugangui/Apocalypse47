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
        $raceSelect = "<select name = 'race'>" ;
          $rid = 0 ;
        foreach($races as $race){
            $race = explode(",", $race) ;
            $r = $race[0] ;
            $rid = $rid + 1 ;
            $raceSelect.="<option value='$rid'>$r</option>" ;
          }
    $raceSelect.="</select>" ;
?>
<form action="changesSubmitted.php" method="post">
    <input type="hidden" name="char_id" value="<?= $char_id ?>">
    <fieldset>
    <h2>Name:</h2>
    <button type="button" onclick = "edit_char(0)">Edit</button>
    <div id="nameInput" class="dropdown-content">
        <input type="text" name="name" /><br />
    </div>
    <p><?=$cname ?></p>
    </fieldset>

    <h2>Pronouns:</h2>
    <p><?=$cpronouns ?></p>
    <button type="button" onclick = "edit_char(1)">Edit</button>
    <div id="pronInput" class="dropdown-content">
        <input type="text" name="pronouns" /><br />
    </div>

    <h2>Race:</h2>
    <p><?=$crace ?></p>
    <button type="submit" id="editRace" onclick="editRaceClick()">Edit</button>
    

    <h2>Background:</h2>
    <button type="button" onclick = "edit_char(3)">Edit</button>
    <div id="bgDropdown" class="dropdown-content">
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
    </div>
    <p><?=$cbackground ?></p>
	

    <h2>Physical Skills:</h2>
      <button type="button" onclick = "edit_char(4)">Edit</button>

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
<button type="button" onclick = "edit_char(5)">Edit</button>
<div id="mentDropdown" class="dropdown-content">
    <select multiple="multiple" name="physical[]" size="5">
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
</div>
    <?php foreach($cment as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>

      <h2>Spiritual Skills</h2>
<button type="button" onclick = "edit_char(6)">Edit</button>
<div id="spiritDropdown" class="dropdown-content">
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
</div>
      <?php foreach($cspirit as $skill){
      ?><p><?=$skill ?></p>
      <br>
      <?php } ?>

      <h2>Advantages and Disadvantages</h2>
<button type="button" onclick = "edit_char(7)">Edit</button>
<div id="advDropdown" class="dropdown-content">
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
</div>
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
<button type="button" onclick = "edit_char(8)">Edit</button>
<div id="traitsDropdown" class="dropdown-content">
    <select multiple="multiple" name="traits[]" size="5">
        <?php
        foreach ($traits as $trait){
            $traits = explode(",", $trait) ;
            $trait = $traits[1] ;
            ?>
            <option value="<?= $trait ?>"><?=$trait ?></option>
        <?php }?>
    </select>
</div>
      <?php foreach($ctraits as $trait){
      ?><p><?=$trait ?></p>
      <br>
      <?php } ?>

<input type="submit" name="submit"/>
</form>

<script>

  function editRaceClick(){
    var raceMenu="<?= $raceSelect?>"; 
    $("#raceArea").html(raceMenu) ;

  }

</script>

</body>
    <a href="welcome.php" class="btn-primary">Return to Home Page</a>
</html>
