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
  $physSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training</option>" ;
}
$physSelect.="</select>" ;

$mentSelect = "<select multiple='multiple' id='selectedMent' name='ment'>" ;
foreach($ment_skills as $ment){
  $ment = explode(",", $ment) ;
  $skill = $ment[0] ;
  $requirement = $ment[1] ;
  $cost = $ment[2] ;
  $training = $ment[3] ;
  $mentSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training</option>" ;
}
$mentSelect.="</select>" ;
$spiritSelect = "<select multiple='multiple' id='selectedSpirit' name='spirit'>" ;
foreach($spirit_skills as $spirit){
  $spirit = explode(",", $spirit) ;
  $skill = $spirit[0] ;
  $requirement = $spirit[1] ;
  $cost = $spirit[2] ;
  $training = $spirit[3] ;
  $spiritSelect.="<option value='$skill'>$skill, Requirement: $requirement, Cost: $cost, Training Required: $training</option>" ;
}
$spiritSelect.="</select>" ;
$majaSelect = "<select multiple='multiple' id='selectedMaja' name='maja'>" ;
foreach($major_advantages as $major_advantage){
            $maj_adv = explode(",", $major_advantage) ;
            $advantage = $maj_adv[1] ;
            $weight = $maj_adv[2] ;
            $majaSelect.="<option value='$advantage'>$advantage, Weight:$weight</option>" ;
          }
$majaSelect.="</select>" ;
$minaSelect = "<select multiple='multiple' id='selectedMina' name='mina'>" ;
foreach($minor_advantages as $minor_advantage) {
            $min_adv = explode(",", $minor_advantage) ;
            $advantage = $min_adv[1] ;
            $weight = $min_adv[2] ;
            $minaSelect.="<option value='$advantage'>$advantage, Weight:$weight</option>" ;
          }
$minaSelect.="</select>" ;
$mindSelect = "<select multiple='multiple' id='selectedMind' name='mind'>" ;
foreach ($major_disadvantages as $major_disadvantage){
            $maj_dis = explode(",", $major_disadvantage) ;
            $advantage = $maj_dis[1] ;
            $weight = $maj_dis[2] ;
            $mindSelect.="<option value='$advantage'>$advantage, Weight:$weight</option>" ;
          }
$mindSelect.="</select>" ;
$majdSelect = "<select multiple='multiple' id='selectedMajd' name='majd'>" ;
    foreach($major_disadvantages as $major_disadvantage){
    $maj_disadv = explode(",", $major_disadvantage) ;
    $disadvantage = $maj_disadv[1] ;
    $weight = $maj_disadv[2] ;
    $majdSelect.="<option value='$disadvantage'>$disadvantage, Weight:$weight</option>" ;
    }
    $majdSelect.="</select>" ;
$traitSelect = "<select multiple='multiple' id='selectedTrait' name='trait'>" ;
    foreach ($traits as $trait){
                        $traits = explode(",", $trait) ;
                        $trait = $traits[1] ;
                        $traitSelect.="<option value='$trait'>$trait</option>" ;
                        }
                        $traitSelect.="</select>" ;
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8" />
</head>
<body>

  <input type="hidden" name="char_id" value="<?= $char_id ?>">

  <h2>Name:</h2>
  <p id="nameInput"><?=$cname ?></p>
  <div id="nameEdit">
    <button type="submit" class="button" id="editName" onclick="editNameClick()">Edit</button>
  </div>

  <h2>Pronouns:</h2>
  <p id="pronInput"><?=$cpronouns ?></p>
  <div id="pronEdit">
    <button type="submit" class="button" id="editPron" onclick="editPronClick()">Edit</button>
  </div>
  
  <h2>Race:</h2>
  <p><?=$crace ?></p>
  <div id="raceEdit">
    <button type="submit" class="button" onclick="editRaceClick()">Edit</button>
  </div>

  <h2>Background:</h2>
  <p><?=$cbackground ?></p>
  <div id="bgEdit">
    <button type="submit" class="button" onclick="editBgClick()">Edit</button>
  </div>

  <h2>Skills</h2>

  <div class="container">
      <div class="row">
              <h3>Physical Skills:</h3>
              <?php foreach($cphys as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              <div id="physEdit">
                  <button type="submit" onclick="editPhysClick()">Edit</button>
              </div>
      </div>

      <div class="row">
              <h3>Mental Skills</h3>
              <?php foreach($cment as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              <div id="mentEdit">
                  <button type="submit" onclick="editMentClick()">Edit</button>
              </div>
      </div>

      <div class="row">
              <h3>Spiritual Skills</h3>
              <?php foreach($cspirit as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              <div id="spiritEdit">
                  <button type="submit" onclick="editSpiritClick()">Edit</button>
              </div>
      </div>
      </div>
  </div>

  <h2>Advantages and Disadvantages</h2>

  <div class="container">
      <div class="row">
          <div id="col-sm-6">
              <h3>Major Advantages</h3>
              <?php foreach($cmaj_adv as $maja){
                  ?><p><?=$maja ?></p>
                  <br>
              <?php } ?>
              <div id="majaEdit">
                  <button type="submit" onclick="editMajaClick()">Edit</button>
              </div>
          </div>

          <div id="col-sm-6">
              <h3>Minor Advantages</h3>
              <?php foreach($cmin_adv as $mina){
                  ?><p><?=$mina ?></p>
                  <br>
              <?php } ?>
              <div id="minaEdit">
                  <button type="submit" onclick="editMinaClick()">Edit</button>
              </div>
          </div>
      </div>
  </div>

  <div class="container">
      <div class="row">
          <div id="col-sm-6">
              <h3>Major Disadvantages</h3>
              <?php foreach($cmaj_dis as $majd){
                  ?><p><?=$majd ?></p>
                  <br>
              <?php } ?>
              <div id="majdEdit">
                  <button type="submit" onclick="editMajdClick()">Edit</button>
              </div>
          </div>

          <div id="col-sm-6">
              <h3>Minor Disadvantages</h3>
              <?php foreach($cmin_dis as $mind){
                  ?><p><?=$mind ?></p>
                  <br>
              <?php } ?>
              <div id="mindEdit">
                  <button type="submit" onclick="editMindClick()">Edit</button>
              </div>
          </div>
      </div>
  </div>
                  <h2>Traits</h2>
                    <div id="traitEdit">
                    <?php foreach($ctraits as $trait){
                      ?><p><?=$trait ?></p>
                      <br>
                      <?php } ?>

                        <button type="submit" class="button" onclick="editTraitClick()">Edit</button>
                      </div>



                      <script>
                        
                        function editNameClick(){
                          var name=$("#nameInput").text();
                          var nameHtml="<input type='text' id='editNameInput' value='"+name+"'><button type='submit' class='button' id='submitName' onclick='ajaxName()'>Submit</button>";
                          $("#nameEdit").html(nameHtml);
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
        $("#nameEdit").html(newHtml);
      });
                        }
                        function editPronClick(){
                          var pron=$("#pronInput").text();
                          var pronHtml="<input type='text' id='editPronInput' value='"+pron+"'><button type='submit' class='button' id='submitPron' onclick='ajaxPron()'>Submit</button>";
                          $("#pronEdit").html(pronHtml);
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
        $("#pronEdit").html(newHtml);
      });
                        }
                        function editRaceClick(){
                          var raceMenu="<?= $raceSelect?>"; 
                          raceMenu+="<button type='submit' class='button' id='submitRace' onclick='ajaxRace()'>Submit</button>" ;
                          $("#raceEdit").html(raceMenu) 
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
        $("#raceEdit").html(newHtml);
      });
                        }
                        function editBgClick(){
                          var bgMenu="<?= $bgSelect?>"; 
                          bgMenu+="<button type='submit' class='button' id='submitBg' onclick='ajaxBg()'>Submit</button>" ;
                          $("#bgEdit").html(bgMenu) ;
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
        $("#bgEdit").html(newHtml);
      });
                        }
                        function editPhysClick(){
                          var physMenu="<?= $physSelect?>"; 
                          physMenu+="<button type='submit' class='button' id='submitPhys' onclick='ajaxPhys()'>Submit</button>" ;
                          $("#physEdit").html(physMenu) ;
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
        newHtml="<div class='d-inline p-2'  >Physical Skills: <br></div><div class='d-inline p-2'  id='physInput'>"+newPhys+ "</div><div class='d-inline p-2' ><button type='submit' id='editPhys' onclick='editPhysClick()'>Edit</button>" ;
        $("#physEdit").html(newHtml);
      });
                        }
                        function editMentClick(){
                          var mentMenu="<?= $mentSelect?>"; 
                          mentMenu+="<button type='submit' class='button' id='submitMent' onclick='ajaxMent()'>Submit</button>" ;
                          $("#mentEdit").html(mentMenu) ;
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
        $("#mentEdit").html(newHtml);
      });
                        }
                        function editSpiritClick(){
                          var spiritMenu="<?= $spiritSelect?>"; 
                          spiritMenu+="<button type='submit' class='button' id='submitSpirit' onclick='ajaxSpirit()'>Submit</button>" ;
                          $("#spiritEdit").html(spiritMenu) ;
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
        $("#spiritEdit").html(newHtml);
      });
                        }
                        function editMajaClick(){
                          var majaMenu="<?= $majaSelect?>"; 
                          majaMenu+="<button type='submit' class='button' id='submitMaja' onclick='ajaxMaja()'>Submit</button>" ;
                          $("#majaEdit").html(majaMenu) ;
                        }
                        function ajaxMaja(){
                          var newMaja= $("#selectedMaja").val() || [];
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { maja: newMaja, char_id: "<?= $char_id?>", fx: "updateAdvant", type: "maja" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Major Advantages: </div><div class='d-inline p-2'  id='majaInput'>"+newMaja+"</div><div class='d-inline p-2' ><button type='submit' id='editMaja' onclick='editMajaClick()'>Edit</button>" ;
        $("#majaEdit").html(newHtml);
      });
                        }
                        function editMajdClick(){
                            var majdMenu="<?= $majdSelect?>";
                            majdMenu+="<button type='submit' class='button' id='submitMajd' onclick='ajaxMajd()'>Submit</button>" ;
                            $("#majdEdit").html(majdMenu) ;
                        }
                        function ajaxMajd() {
                            var newMajd = $("#selectedMajd").val() || [];
                            $.ajax({
                                method: "POST",
                                url: "ajax.php",
                                data: {majd: newMajd, char_id: "<?= $char_id?>", fx: "updateAdvant", type: "majd"}
                            })
                                .done(function (msg) {
                                    //alert( "Data Saved: " + msg );
                                    newHtml = "<div class='d-inline p-2'  >Major Disadvantages: </div><div class='d-inline p-2'  id='majdInput'>" + newMajd + "</div><div class='d-inline p-2' ><button type='submit' id='editMajd' onclick='editMajdClick()'>Edit</button>";
                                    $("#majdEdit").html(newHtml);
                                });
                        }
                        function editMinaClick(){
                          var minaMenu="<?= $minaSelect?>"; 
                          minaMenu+="<button type='submit' class='button' id='submitMina' onclick='ajaxMina()'>Submit</button>" ;
                          $("#minaEdit").html(minaMenu) ;
                        }
                        function ajaxMina(){
                          var newMina= $("#selectedMina").val() || [];
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { mina: newMina, char_id: "<?= $char_id?>", fx: "updateAdvant", type: "mina" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Minor Advantages: </div><div class='d-inline p-2'  id='minaInput'>"+newMina+"</div><div class='d-inline p-2' ><button type='submit' id='editMina' onclick='editMinaClick()'>Edit</button>" ;
        $("#minaEdit").html(newHtml);
      });
                        }
                        
                        function editMindClick(){
                          var mindMenu="<?= $mindSelect?>"; 
                          mindMenu+="<button type='submit' class='button' id='submitMind' onclick='ajaxMind()'>Submit</button>" ;
                          $("#mindEdit").html(mindMenu) ;
                        }
                        function ajaxMind(){
                          var newMind= $("#selectedMind").val() || [];
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { mind: newMind, char_id: "<?= $char_id?>", fx: "updateAdvant", type: "mind" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Minor Disadvantages: </div><div class='d-inline p-2'  id='mindInput'>"+newMind+"</div><div class='d-inline p-2' ><button type='submit' id='editMind' onclick='editMindClick()'>Edit</button>" ;
        $("#mindEdit").html(newHtml);
      });
}
                          function editTraitClick(){
                          var traitMenu="<?= $traitSelect?>"; 
                          traitMenu+="<button type='submit' class='button' id='submitTrait' onclick='ajaxTrait()'>Submit</button>" ;
                          $("#traitEdit").html(traitMenu) ;
                        }
                        function ajaxTrait(){
                          var newTrait= $("#selectedTrait").val() || [];
                          $.ajax({
                            method: "POST",
                            url: "ajax.php",
                            data: { trait: newTrait, char_id: "<?= $char_id?>", fx: "updateAdvant", type: "trait" }
                          })
                          .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        newHtml="<div class='d-inline p-2'  >Traits: </div><div class='d-inline p-2'  id='traitInput'>"+newTrait+"</div><div class='d-inline p-2' ><button type='submit' id='editTrait' onclick='editTraitClick()'>Edit</button>" ;
        $("#traitEdit").html(newHtml);
      });
                        }
                      </script>

                    </body>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                    <a href="welcome.php" class="btn btn-primary">Return to Home Page</a>
                    </html>