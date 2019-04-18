<?php
include ("getCharacterOptions.php") ;
        $raceSelect = "<select id='selectedRace' name='race'>" ;
        foreach($races as $race){
            $race = explode(",", $race) ;
            $r = $race[0] ;
            $raceSelect.="<option value='$r'>$r</option>" ;
          }
    $raceSelect.="</select>" ;
?>
<!DOCTYPE html>
<html>
<head>
      <link href="edit.css" type="text/css" rel="stylesheet"/>
      <script src="edit.js" type="text/javascript"></script>
      <meta charset="utf-8" />
</head>
<body>

    <input type="hidden" name="char_id" value="<?= $char_id ?>">
        <?php echo $char_id ; ?>
    <h2>Name:</h2>

    <p id="nameInput"><?=$cname ?></p>
    <div id="nameArea">
        <button type="submit" id="editName" onclick="editNameClick()">Edit</button>
    </div>


    <h2>Pronouns:</h2>
    <p><?=$cpronouns ?></p>
    <button type="button" onclick = "edit_char(1)">Edit</button>
    <div id="pronInput" class="dropdown-content">
        <input type="text" name="pronouns" /><br />
    </div>

  <div id="raceArea">
    <h2>Race:</h2>
    <p><?=$crace ?></p>
    <button type="submit" id="editRace" onclick="editRaceClick()">Edit</button>
  </div>
    

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
  
   <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
  function editNameClick(){
  var name=$("#nameInput").text();
  var nameHtml="<input type='text' id='editNameInput' value='"+name+"'><button type='submit' id='submitName' onclick='ajaxName()'>Submit</button>";
  $("#nameArea").html(nameHtml);
}

function ajaxName(){
  var newName=$("#editNameInput").val() ;
  $.ajax({
      method: "POST",
      url: "ajax.php",
      data: { name: newName, char_id: "<?= $char_id?>", fx: "updateName" }
    })
      .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Name: </div><div class='d-inline p-2'  id='nameInput'>"+newName+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-primary mb-1' id='editName' onclick='editNameClick()'>Edit</button></div>";
        $("#nameArea").html(newHtml);
      });
}

  function editRaceClick(){
    var raceMenu="<?= $raceSelect?>"; 
    raceMenu+="<button type='submit' id='submitRace' onclick='ajaxRace()'>Submit</button>" ;
    $("#raceArea").html(raceMenu) 
  }

  function ajaxRace(){
  var newRace=$("#selectedRace option:selected" ).text();
  console.log(newRace) ;
  $.ajax({
      method: "POST",
      url: "ajax.php",
      data: { race: newRace, char_id: "<?= $char_id?>", fx: "updateRace" }
    })
      .done(function( msg ) {
        alert( "Data Saved: " + msg );
        newHtml="<button type='submit' id='editRace' onclick='editRaceClick()'>Edit</button>" ;
        $("#editRace").html(newHtml);
      });
}
</script>

</body>
    <a href="welcome.php" class="btn-primary">Return to Home Page</a>
</html>