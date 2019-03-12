<?php
// Include config file
 require_once "config.php";

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
        $sql = "SELECT char_id FROM character_table JOIN player_table ON player_table.player_id = character_table.player_id WHERE player_table.email = whatiscadence@gmail.com)";
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $rows = mysqli_stmt_num_rows($stmt);
                if ($rows == 0) {
                    ?><p>You do not have any characters</p><?php
                } else {
                    if(mysqli_stmt_bind_result($stmt, $charIDS)){
                        ?> <p>These are your character ids</p>
                        <ul><?php
                        while (mysqli_stmt_fetch($stmt)) { ?>
                            <li><?= "%s", $charIDS ?></li>
                        <?php
                        }
                        ?></ul><?php
                    } else{
                        echo "Something went wrong";
                    }
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

    ?>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
