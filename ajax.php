<?php
include ("mysql.php") ;
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 

/* get the incoming function name   */
$fx=$_POST["fx"];

switch($fx){
  case "updateName":
       updateName();
  break;
}

function updateName(){
  $name=$_POST["name"];
  $id=$_POST["char_id"];
  $stmt = $conn->prepare("UPDATE character_table SET char_name = :param_name WHERE char_id = :param_cid");
  if($stmt->execute(array(":param_name" => $name, ":param_cid" => $id))){
    echo "success";
  }
  else{echo "fail";}
}
?>
