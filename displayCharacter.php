<?php
$name = $_GET['name'] ;

// Include database connection
require_once "mysql.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$email = htmlspecialchars($_SESSION["username"]);
$sql = "SELECT player_id FROM player_table WHERE email = :email" ;
$stmt = $conn->prepare($sql);
$stmt->execute(array(":email"=>$email)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$player_id = $rows[0]['player_id'] ;

$sql = "SELECT char_id FROM character_table WHERE player_id = :player_id AND char_name = :char_name" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":player_id"=>$player_id, ":char_name"=>$name)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$char_id = $rows[0]['char_id'] ;

//SQL Queries to pull information
$sql = "SELECT * FROM character_table WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pronouns = $rows[0]['pronouns'] ;
$race = $rows[0]['race'] ;
$background = $rows[0]['background'] ;


$sql = "SELECT skill_name FROM character_physical_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $phys[$i] = $rows[0]['skill_name'] ;
}

$sql = "SELECT skill_name FROM character_mental_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $ment[$i] = $rows[0]['skill_name'] ;
}

$sql = "SELECT skill_name FROM character_spiritual_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $spirit[$i] = $rows[0]['skill_name'] ;
}

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'major_advantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $maj_adv[$i] = $rows[0]['NAME'] ;
}

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'minor_advantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $min_adv[$i] = $rows[0]['NAME'] ;
}

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'major_disadvantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $maj_dis[$i] = $rows[0]['NAME'] ;
}

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'minor_disadvantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $min_dis[$i] = $rows[0]['NAME'] ;
}

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'trait'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<sizeof($rows[0]);$i++){
 $traits[$i] = $rows[0]['NAME'] ;
}


include ("charactersheet.php") ;
?>
