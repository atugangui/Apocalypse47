<?php
include("mysql.php");
try{
$stmt = $conn->prepare("DELETE FROM character_table where char_id=:id");
$stmt->execute(array(":id"=>$id));

$stmt = $conn->prepare("DELETE FROM character_physical_skills where char_id=:id");
$stmt->execute(array(":id"=>$id));

$stmt = $conn->prepare("DELETE FROM character_mental_skills where char_id=:id");
$stmt->execute(array(":id"=>$id));

$stmt = $conn->prepare("DELETE FROM character_spiritual_skills where char_id=:id");
$stmt->execute(array(":id"=>$id));

$stmt = $conn->prepare("DELETE FROM character_adv_and_disadv where char_id=:id");
$stmt->execute(array(":id"=>$id));
} 
catch (Exception $e) {
  echo $e;
}
?>
