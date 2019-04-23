<?php
$dir= getcwd();
include ($dir."/jeremy_mysql.php") ;
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
$mysql = new mysqlFunctions();
$fx=$_POST["fx"];
$type=$_POST["type"] ;

switch($fx){
  case "updateName":
  updateName($mysql);
  break ;
  case "updatePron":
  updatePron($mysql) ;
  break ;
  case "updateRace":
  updateRace($mysql) ;
  break;
  case "updateBg":
  updateBg($mysql) ;
  break;
  case "updatePhys":
  updatePhys($mysql) ;
  break ;
  case "updateMent":
  updateMent($mysql) ;
  break ;
  case "updateSpirit":
  updateSpirit($mysql) ;
  break ;
  case "updateAdvant":
  updateAdvant($mysql, $type) ;
  break ;
}

function updateName($mysql){
    $name=$_POST["name"];
    $id=$_POST["char_id"];
    if($mysql->updateName($id, $name)){
        echo "success";
    }
    else{echo "fail";}
}

function updatePron($mysql){
    $pron=$_POST["pron"];
    $id=$_POST["char_id"];
    if($mysql->updatePron($id, $pron)){
        echo "success";
    }
    else{echo "fail";}
}

function updateRace($mysql) {
	$id=$_POST["char_id"];
	$race = $_POST["race"] ;
	if($mysql->updateRace($id, $race)){
        echo "success";
    }
    else{echo "fail";}
}

function updateBg($mysql) {
	$id=$_POST["char_id"];
	$bg = $_POST["bg"] ;
	if($mysql->updateBg($id, $bg)){
        echo "success";
    }
    else{echo "fail";}
}

function updatePhys($mysql){
	$id=$_POST["char_id"];
	$phys = $_POST["phys"] ;
	if($mysql->updatePhys($id, $phys)){
        echo "success";
    }
    else{echo "fail";}
	}


function updateMent($mysql){
	$id=$_POST["char_id"];
	$ment = $_POST["ment"] ;
	if($mysql->updateMent($id, $ment)){
        echo "success";
    }
    else{echo "fail";}
	}

function updateSpirit($mysql){
	$id=$_POST["char_id"];
	$spirit = $_POST["spirit"] ;
	if($mysql->updateSpirit($id, $spirit)){
        echo "success";
    }
    else{echo "fail";}
	}

function updateAdvant($mysql, $type){
	$id=$_POST["char_id"];
	$maja = $_POST["maja"] ;
    $majd = $_POST["majd"] ;
	if($mysql->updateAdvant($id, $maja, $type)){
        echo "success";
    }
	if ($type == "majd") {
        if ($mysql->updateAdvant($id, $majd, $type)) {
            echo "success";
        }
    }
    else{echo "fail";}
	}

?>
