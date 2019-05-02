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
    <title>Home</title>
    <!-- Compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS for Welcome Page -->
    <link href="welcome.css" rel="stylesheet">

</head>
<body>
    <div class="md-row-reverse p-3 px-md-4 mb-3 bg-white border-bottom box-shadow bg-secondary">
            <a href="reset-password.php" class="btn btn-danger">Reset Password</a>
            <a href="logout.php" class="btn btn-outline-primary">Sign Out</a>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-3">Your Characters:</h1>
    </div>
    <?php
        $name = htmlspecialchars($_SESSION["username"]);
        $sql = "SELECT char_name FROM character_table JOIN player_table ON player_table.player_id = character_table.player_id WHERE player_table.email = :name";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":name"=>$name));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows[0])==0) {
            ?>
            <p>You do not have any characters.</p>
            <?php
        } else { ?>

    <div class="container">
        <div class="row">
            <?php foreach ($rows as $char) { ?>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $char['char_name'] ?></h5>
                        <a href="displayCharacter.php?name=<?php echo $char['char_name'] ?>" class="btn btn-dark">View Character</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
            <div class="newBtnChar">
                <a href="Creator.php" class="btn btn-primary btn-block">Make a new character</a>
            </div>
    </div> 
    <?php } ?>

    <?php 
        $sql = "SELECT * FROM player_table WHERE player_table.email = :name";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":name"=>$name));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows)==0) { 
            $xp = 50;
            $bap = 0;
            $sql = "INSERT INTO player_table (email, xp, bap) VALUES (:param_email, :param_xp, :param_bap)";
            $stmt = $conn -> prepare($sql);
            $stmt -> execute(array(":param_email" => $name, ":param_xp" => $xp, ":param_bap"=> $bap));
        } 
    ?>
    <!-- JS file -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>