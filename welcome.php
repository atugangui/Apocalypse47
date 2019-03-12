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
    <h2>These are you're characters:</h2>
    <?php
    echo "string";
        $name = htmlspecialchars($_SESSION["username"]);
            echo "string";
        $sql = "SELECT * FROM users";
        echo "string";
        $stmt = $conn->prepare($sql);
        echo "string";
        $stmt->execute();
        echo "string";
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "string";
        print_r($rows);
        if (sizeof($rows[0])==0) {
            ?>
            <p>you do not have any characters</p>
            <?php
        } else {
            ?>
            <p>Wy are we here?</p>
            <?php
        }
    ?>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
