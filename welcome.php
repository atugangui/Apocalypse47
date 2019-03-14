<?php
// Include database connection
require_once "mysql.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <h2>These are your characters:</h2>
    <?php
        $name = htmlspecialchars($_SESSION["username"]);
        $sql = "SELECT char_id FROM character_table JOIN player_table ON player_table.player_id = character_table.player_id WHERE player_table.email = :name";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":name"=>$name));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows[0])==0) {
            ?>
            <p>You do not have any characters.</p>
            <?php
        } else {
            ?>
            <ul></ul>
            <?php
            for ($i=0; $i < sizeof(); $i++) {  ?>
                <li><?= $rows[$i]['char_id'] ?></li>
            <?php }
        }
    ?>
    <p>
        <a href="Creator.php" class="btn-primary">Make a new character</a>
    </p>
    <?php 
        $sql = "SELECT * FROM player_table WHERE player_table.email = :name";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":name"=>$name));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows[0])==0) { 
            ?>
            <br>
            <a href="makePlayer.php" class="btn-primary">Finish your account here!</a>
    <?php
        } 
    ?>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
