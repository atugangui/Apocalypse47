<?php
$servername = "localhost";
$username = "LarpTeam";
$password = "larp47sofdev19";
try {
    $conn = new PDO("mysql:host=$servername;dbname=Apocalypse47", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
/*
try {
   $q=$conn->prepare("select * from player_table");
   $q->execute();
   $rows = $q->fetchAll(PDO::FETCH_ASSOC);
   var_dump($rows);
}
catch (Exception $e){
  echo $e;
}
*/
?>
