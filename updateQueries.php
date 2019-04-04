<?php

$stmt = $conn->prepare("UPDATE character_table SET player_id = :param_pid, char_name = :param_name, race = :param_race, char_pronouns = :param_prons,
 background = :param_bg WHERE char_id = :param_cchar_id ");
$stmt->execute(array(":param_pid" => $pid, ":param_name" => $cname, ":param_race" => $crace, ":param_prons" => $cpronouns, ":param_bg" => $cbackground, ":param_cchar_id" => $cchar_id));


//Insert physical skills
foreach($cphys as $p){
    $stmt= $conn->prepare("UPDATE character_physical_skills SET skill_name = :param_phys WHERE char_id = :param_cid ");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_phys"=>$p)) ;
}

//Insert mental skills
foreach($cment as $m){
    $stmt= $conn->prepare("UPDATE character_mental_skills SET skill_name = :param_ment WHERE char_id = :param_cid ");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_ment"=>$m)) ;
}

//Insert spiritual skills
foreach($cspirit as $s){
    $stmt= $conn->prepare("UPDATE character_mental_skills SET skill_name = :param_spirit WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_spirit"=>$s)) ;
}

//Insert major advantages
foreach($cmaj_adv as $maja){
    $stmt= $conn->prepare("UPDATE character_adv_and_disadv SET TYPE = :param_type, NAME = :param_maja WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_type"=>'major_advantage', ":param_maja"=>$maja)) ;
}

//Insert minor advantages
foreach($cmin_adv as $mina){
    $stmt= $conn->prepare("UPDATE character_adv_and_disadv SET TYPE = :param_type, NAME = :param_mina WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_type"=>'minor_advantage', ":param_mina"=>$mina)) ;
}

//Insert major advantages
foreach($cmaj_dis as $majd){
    $stmt= $conn->prepare("UPDATE character_adv_and_disadv SET TYPE = :param_type, NAME = :param_majd WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_type"=>'major_disadvantage', ":param_majd"=>$majd)) ;
}

//Insert minor disadvantages
foreach($cmin_dis as $mind){
    $stmt= $conn->prepare("UPDATE character_adv_and_disadv SET TYPE = :param_type, NAME = :param_mind WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_type"=>'minor_disadvantage', ":param_mind"=>$mind)) ;
}

//Insert traits
foreach($ctraits as $trait){
    $stmt= $conn->prepare("UPDATE character_adv_and_disadv SET TYPE = :param_type, NAME = :param_trait WHERE char_id = :param_cid");
    $stmt->execute(array(":param_cid"=>$cchar_id, ":param_type"=>'trait', ":param_trait"=>$trait)) ;
}