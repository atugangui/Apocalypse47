<?php
include ("getCharacterOptions.php") ;
$raceSelect = "<select id='selectedRace' name='race'>" ;
foreach($races as $race){
  $race = explode(",", $race) ;
  $r = $race[0] ;
  $raceSelect.="<option value='$r'>$r</option>" ;
}
$raceSelect.="</select>" ;

$bgSelect = "<select id='selectedBg' name='bg'>" ;
foreach($bgs as $bg){
  $bg = explode(",", $bg) ;
  $background = $bg[0] ;
  $race = $bg[1] ;
  $bgSelect.="<option value='$background'>$background,$race</option>";
}
$bgSelect.="</select>" ;

$physSelect = "<select multiple='multiple' id='selectedPhys' name='phys'>" ;
foreach($phys_skills as $phys){
  $phys = explode(",", $phys) ;
  $skill = $phys[0] ;
  $requirement = $phys[1] ;
  $cost = $phys[2] ;
  $training = $phys[3] ;
  $physSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training></option>" ;
}
$physSelect.="</select>" ;

$mentSelect = "<select multiple='multiple' id='selectedMent' name='ment'>" ;
foreach($ment_skills as $ment){
  $ment = explode(",", $ment) ;
  $skill = $ment[0] ;
  $requirement = $ment[1] ;
  $cost = $ment[2] ;
  $training = $ment[3] ;
  $mentSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training></option>" ;
}
$mentSelect.="</select>" ;

$spiritSelect = "<select multiple='multiple' id='selectedSpirit' name='spirit'>" ;
foreach($spirit_skills as $spirit){
  $spirit = explode(",", $spirit) ;
  $skill = $spirit[0] ;
  $requirement = $spirit[1] ;
  $cost = $spirit[2] ;
  $training = $spirit[3] ;
  $spiritSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training></option>" ;
}
$spiritSelect.="</select>" ;

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

  <h2>Name:</h2>
  <p id="nameInput"><?=$cname ?></p>
  <div id="nameArea">
    <button type="submit" id="editName" onclick="editNameClick()">Edit</button>
  </div>

  <h2>Pronouns:</h2>
  <p id="pronInput"><?=$cpronouns ?></p>
  <div id="pronArea">
    <button type="submit" id="editPron" onclick="editPronClick()">Edit</button>
  </div>
  
  <h2>Race:</h2>
  <p><?=$crace ?></p>
  <div id="raceArea">
    <button type="submit" onclick="editRaceClick()">Edit</button>
  </div>

  <h2>Background:</h2>
  <p><?=$cbackground ?></p>
  <div id="bgArea">
    <button type="submit" onclick="editBgClick()">Edit</button>
  </div>
  
  <h2>Physical Skills:</h2>
  <?php foreach($cphys as $skill){
    ?><p><?=$skill ?></p>
    <br>
  <?php } ?>
  <div id="physArea">
    <button type="submit" onclick="editPhysClick()">Edit</button>
  </div>

  <h2>Mental Skills</h2>
  <?php foreach($cment as $skill){
    ?><p><?=$skill ?></p>
    <br>
  <?php } ?>
  <div id="mentArea">
    <button type="submit" onclick="editMentClick()">Edit</button>
  </div>

  <h2>Spiritual Skills</h2>
  <?php foreach($cspirit as $skill){
    ?><p><?=$skill ?></p>
    <br>
  <?php } ?>
  <div id="spiritArea">
    <button type="submit" onclick="editSpiritClick()">Edit</button>
  </div>

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
          <div id="advantArea">
            <button type="submit" onclick="editAdvantClick()">Edit</button>
          </div>

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

                        function editPronClick(){
                          var pron=$("#pronInput").text();
                          var pronHtml="<input type='text' id='editPronInput' value='"+pron+"'><button type='submit' id='submitPron' onclick='ajaxPron()'>Submit</button>";
                          $("#pronArea").html(pronHtml);
                        }

                        function ajaxPron(){
                          var newPron=$("#editPronInput").val() ;
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { pron: newPron, char_id: "<?= $char_id?>", fx: "updatePron" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Pronouns: </div><div class='d-inline p-2'  id='pronInput'>"+newPron+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-primary mb-1' id='editPron' onclick='editPronClick()'>Edit</button></div>";
        $("#pronArea").html(newHtml);
      });
                        }

                        function editRaceClick(){
                          var raceMenu="<?= $raceSelect?>"; 
                          raceMenu+="<button type='submit' id='submitRace' onclick='ajaxRace()'>Submit</button>" ;
                          $("#raceArea").html(raceMenu) 
                        }

                        function ajaxRace(){
                          var newRace=$("#selectedRace option:selected" ).text();
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { race: newRace, char_id: "<?= $char_id?>", fx: "updateRace" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Race: </div><div class='d-inline p-2'  id='raceInput'>"+newRace+"</div><div class='d-inline p-2' ><button type='submit' id='editRace' onclick='editRaceClick()'>Edit</button>" ;
        $("#raceArea").html(newHtml);
      });
                        }

                        function editBgClick(){
                          var bgMenu="<?= $bgSelect?>"; 
                          bgMenu+="<button type='submit' id='submitBg' onclick='ajaxBg()'>Submit</button>" ;
                          $("#bgArea").html(bgMenu) ;
                        }

                        function ajaxBg(){
                          var newBg=$("#selectedBg option:selected").text();
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { bg: newBg, char_id: "<?= $char_id?>", fx: "updateBg" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Background: </div><div class='d-inline p-2'  id='bgInput'>"+newBg+"</div><div class='d-inline p-2' ><button type='submit' id='editBg' onclick='editBgClick()'>Edit</button>" ;
        $("#bgArea").html(newHtml);
      });
                        }

                        function editPhysClick(){
                          var physMenu="<?= $physSelect?>"; 
                          physMenu+="<button type='submit' id='submitPhys' onclick='ajaxPhys()'>Submit</button>" ;
                          $("#physArea").html(physMenu) ;
                        }

                        function ajaxPhys(){
                          var newPhys= $("#selectedPhys").val() || [] ;
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { phys: newPhys, char_id: "<?= $char_id?>", fx: "updatePhys" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Physical Skills: </div><div class='d-inline p-2'  id='physInput'>"+newPhys+ "</div><div class='d-inline p-2' ><button type='submit' id='editPhys' onclick='editPhysClick()'>Edit</button>" ;
        $("#physArea").html(newHtml);
      });
                        }

                        function editMentClick(){
                          var mentMenu="<?= $mentSelect?>"; 
                          mentMenu+="<button type='submit' id='submitMent' onclick='ajaxMent()'>Submit</button>" ;
                          $("#mentArea").html(mentMenu) ;
                        }

                        function ajaxMent(){
                          var newMent= $("#selectedMent").val() || [] ;
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { ment: newMent, char_id: "<?= $char_id?>", fx: "updateMent" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Mental Skills: </div><div class='d-inline p-2'  id='mentInput'>"+newMent+ "</div><div class='d-inline p-2' ><button type='submit' id='editMent' onclick='editMentClick()'>Edit</button>" ;
        $("#mentArea").html(newHtml);
      });
                        }

                        function editSpiritClick(){
                          var spiritMenu="<?= $spiritSelect?>"; 
                          spiritMenu+="<button type='submit' id='submitSpirit' onclick='ajaxSpirit()'>Submit</button>" ;
                          $("#spiritArea").html(spiritMenu) ;
                        }

                        function ajaxSpirit(){
                          var newSpirit= $("#selectedSpirit").val() || [];
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { spirit: newSpirit, char_id: "<?= $char_id?>", fx: "updateSpirit" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Spiritual Skills: </div><div class='d-inline p-2'  id='spiritInput'>"+newSpirit+"</div><div class='d-inline p-2' ><button type='submit' id='editSpirit' onclick='editSpiritClick()'>Edit</button>" ;
        $("#spiritArea").html(newHtml);
      });
                        }


                      </script>

                    </body>
                    <a href="welcome.php" class="btn-primary">Return to Home Page</a>
                    </html>