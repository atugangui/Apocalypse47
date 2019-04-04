<?php

$stmt = $conn->prepare("UPDATE character_table SET player_id = :param_pid, char_name = :param_name, race = :param_race, char_pronouns = :param_prons,
 background = :param_bg) WHERE char_id = :param_charID");
$stmt->execute(array(":param_pid" => $pid, ":param_name" => $cname, ":param_race" => $crace, ":param_prons" => $cpronouns, ":param_bg" => $cbackground, ":param_charID" => $cchar_id));


//Insert physical skills
foreach($cphys as $p){
    $stmt= $conn->prepare("INSERT INTO character_physical_skills (char_id, skill_name) VALUES(:param_cid, :param_phys)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_phys"=>$p)) ;
}

//Insert mental skills
foreach($cment as $m){
    $stmt= $conn->prepare("INSERT INTO character_mental_skills (char_id, skill_name) VALUES(:param_cid, :param_ment)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_ment"=>$m)) ;
}

//Insert spiritual skills
foreach($cspirit as $s){
    $stmt= $conn->prepare("INSERT INTO character_spiritual_skills (char_id, skill_name) VALUES(:param_cid, :param_spirit)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_spirit"=>$s)) ;
}

//Insert major advantages
foreach($cmaj_adv as $maja){
    $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_maja)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_advantage', ":param_maja"=>$maja)) ;
}

//Insert minor advantages
foreach($cmin_adv as $mina){
    $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mina)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_advantage', ":param_mina"=>$mina)) ;
}

//Insert major advantages
foreach($cmaj_dis as $majd){
    $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_majd)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'major_disadvantage', ":param_majd"=>$majd)) ;
}

//Insert minor disadvantages
foreach($cmin_dis as $mind){
    $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_mind)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'minor_disadvantage', ":param_mind"=>$mind)) ;
}

//Insert traits
foreach($ctraits as $trait){
    $stmt= $conn->prepare("INSERT INTO character_adv_and_disadv (char_id, TYPE, NAME) VALUES(:param_cid, :param_type, :param_trait)");
    $stmt->execute(array(":param_cid"=>$charID, ":param_type"=>'trait', ":param_trait"=>$trait)) ;
}