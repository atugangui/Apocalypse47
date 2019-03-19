<?php
$name = $_GET['name'] ;
echo "butt" ;
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
        $stmt->execute(array(":email"=>$email));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$player_id = $rows[0] ;

$sql = "SELECT char_id FROM character_table WHERE player_id = :player_id AND char_name = :char_name" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_name"=>$name)) ;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$char_id = $rows[0] ;

//SQL Queries to pull information
$sql = "SELECT * FROM character_table WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
if($stmt->execute(array(":char_id"=>$char_id)) ){
 echo "good" ;
}
else{
 echo "bad" ;
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pronouns = $rows[0]['pronouns'] ;
$race = $rows[0]['race'] ;
$background = $rows['background'] ;


$sql = "SELECT skill_name FROM character_physical_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$phys = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT skill_name FROM character_mental_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$ment = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT skill_name FROM character_spiritual_skills WHERE char_id = :char_id" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$spirit = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'major_advantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$maj_adv = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'minor_advantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$min_adv = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'major_disadvantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$maj_dis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'minor_disadvantage'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$min_dis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT NAME FROM character_adv_and_disadv WHERE char_id = :char_id and TYPE = 'trait'" ;
$stmt = $conn->prepare($sql) ;
$stmt->execute(array(":char_id"=>$char_id)) ;
$traits = $stmt->fetchAll(PDO::FETCH_ASSOC);


include ("charactersheet.php") ;
?>
