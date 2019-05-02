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
  $bgSelect.="<option value='$background'>$background, $race</option>";
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

    <!-- Custom CSS for charactersheet.php -->
    <link href="charactersheet.css" rel="stylesheet">

  <meta charset="utf-8" />
</head>
<body>

  <input type="hidden" name="char_id" value="<?= $char_id ?>">

<div class="container page-container">
  <h2>Name:</h2>
  <div class="container">
  <div id="nameEdit">
    <p id="nameInput"><?=$cname ?></p>
    <button type="submit" class="btn btn-light" id="editName" onclick="editNameClick()">Edit</button>
  </div>
</div>

  <h2>Pronouns:</h2>
  <div class="container">
    <div id="pronEdit">
    <p id="pronInput"><?=$cpronouns ?></p>
    <button type="submit" class="btn btn-light" id="editPron" onclick="editPronClick()">Edit</button>
  </div>
</div>
  
  <h2>Race:</h2>
  <div class="container">
  <div id="raceEdit">
  <p><?=$crace ?></p>
    <button type="submit" class="btn btn-light" onclick="editRaceClick()">Edit</button>
  </div>
</div>

  <h2>Background:</h2>
  <div class="container">
  <div id="bgEdit">
  <p><?=$cbackground ?></p>
    <button type="submit" class="btn btn-light" onclick="editBgClick()">Edit</button>
  </div>
</div>

  <h2>Skills</h2>

  <div class="container">
      <div class="row">
        
              <h3>Physical Skills:</h3>
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="physEdit">
              <?php foreach($cphys as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editPhysClick()">Edit</button>
              </div>
            </div>
      </div>

      <div class="row">
        
              <h3>Mental Skills</h3>
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="mentEdit">
              <?php foreach($cment as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editMentClick()">Edit</button>
              </div>
            </div>
      </div>

      <div class="row">
        
              <h3>Spiritual Skills</h3>
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="spiritEdit">
              <?php foreach($cspirit as $skill){
                  ?><p><?=$skill ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editSpiritClick()">Edit</button>
              </div>
            </div>
      </div>
  </div>

  <h2>Advantages and Disadvantages</h2>

  <div class="container">
      <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            
              <h3>Major Advantages</h3>
              <div id="majaEdit">
              <?php foreach($cmaj_adv as $maja){
                  ?><p><?=$maja ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editMajaClick()">Edit</button>
              </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-6">
            
              <h3>Minor Advantages</h3>
              <div id="minaEdit">
              <?php foreach($cmin_adv as $mina){
                  ?><p><?=$mina ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editMinaClick()">Edit</button>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            
              <h3>Major Disadvantages</h3>
              <div id="majdEdit">
              <?php foreach($cmaj_dis as $majd){
                  ?><p><?=$majd ?></p>
                  <br>
              <?php } ?>
              
                  <button class="btn btn-light" type="submit" onclick="editMajdClick()">Edit</button>
              </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-6">
            
              <h3>Minor Disadvantages</h3>
              <div id="mindEdit">
              <?php foreach($cmin_dis as $mind){
                  ?><p><?=$mind ?></p>
                  <br>
              <?php } ?>
                  <button class="btn btn-light" type="submit" onclick="editMindClick()">Edit</button>
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
                      
                        <button class="btn btn-light" type="submit" class="button" onclick="editTraitClick()">Edit</button>
                      </div>
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
        newHtml="<div class='d-inline p-2'  id='nameInput'>"+newName+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editName' onclick='editNameClick()'>Edit</button></div>";
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
        newHtml="<div class='d-inline p-2'  id='pronInput'>"+newPron+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editPron' onclick='editPronClick()'>Edit</button></div>";
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
        newHtml="<div class='d-inline p-2'  id='raceInput'>"+newRace+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editRace' onclick='editRaceClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='bgInput'>"+newBg+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editBg' onclick='editBgClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='physInput'>"+newPhys+ "</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editPhys' onclick='editPhysClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='mentInput'>"+newMent+ "</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editMent' onclick='editMentClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='spiritInput'>"+newSpirit+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editSpirit' onclick='editSpiritClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='majaInput'>"+newMaja+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editMaja' onclick='editMajaClick()'>Edit</button>" ;
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
                                    newHtml = "<div class='d-inline p-2'  id='majdInput'>" + newMajd + "</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editMajd' onclick='editMajdClick()'>Edit</button>";
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
        newHtml="<div class='d-inline p-2'  id='minaInput'>"+newMina+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editMina' onclick='editMinaClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='mindInput'>"+newMind+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editMind' onclick='editMindClick()'>Edit</button>" ;
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
        newHtml="<div class='d-inline p-2'  id='traitInput'>"+newTrait+"</div><div class='d-inline p-2' ><button type='submit' class='btn btn-light' id='editTrait' onclick='editTraitClick()'>Edit</button>" ;
        $("#traitEdit").html(newHtml);
      });
                        }
                      </script>

                    </body>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                    <a href="welcome.php" class="btn btn-primary">Return to Home Page</a>
                    </html>