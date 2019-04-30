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
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="reset-password.php" class="btn btn-danger">Reset Password</a>
        <a href="logout.php" class="btn btn-outline-primary">Sign Out</a>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Your Characters:</h1>
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
        } else {
            ?>
            <!--<ul></ul>
                <div class="container">
                    <div class="row">
                        <?php
                            foreach($rows as $name) {  ?>
                        <div class="col-sm-4">
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><?php echo $name['char_name'] ?><small class="text-muted"></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <?php
                                                $sql = "SELECT race FROM character_table WHERE char_name = :name";
                                                $stmt = $conn->prepare($sql);
                                                $rows = $stmt->execute(array(":name"=>$name));
                                                $crace = $rows[0]['race'] ;
                                                $sql = "SELECT background FROM character_table WHERE char_name = :name";
                                                $stmt = $conn->prepare($sql);
                                                $rows = $stmt->execute(array(":name"=>$name));
                                                $cbg = $rows[0]['background'] ; 
                                            ?>
                                            <li><?php echo $crace ?></li>
                                            <li><?php echo $cbg ?></li>
                                        </ul>
                                    <a href="displayCharacter.php?name=<?php echo $name['char_name'] ?>" class="btn btn-lg btn-block btn-outline-primary">View Character</a>
                                </div>
                        </div>
                                    <?php }
                                    ?>
                    </div>
                </div>
<?php } ?> -->

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name['char_name'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">goodbye</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php } ?>

        <p>
        <a href="Creator.php" class="btn-primary">Make a new character</a>
    </p>

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