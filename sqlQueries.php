<?php
include ("mysql.php") ;

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$email = $_SESSION["username"] ;

//Pull player ID related to email
try{
 $stmt = $conn->prepare("SELECT player_id FROM player_table WHERE email= :email") ;
 if($stmt->execute(array(":email"=>$email))){
  $player_id = $stmt->fetch(PDO::FETCH_ASSOC) ;
  $pid = $player_id['player_id'];
 } }
catch(Exception $e){
  echo $e ;
 }

//All SQL queries to insert character information into player database

//Insert player ID, name, race, pronouns, background, and point values
 try{

        echo $ccharID;
       if (empty($ccharID)) {
           include ("updateQueries.php");
           echo "updated queries" ;
       }
       else {
           include ("creatorQueries.php");
           echo "creator queries" ;
       }

}catch(Exception $e){
 echo $e ;
}
      
?>
