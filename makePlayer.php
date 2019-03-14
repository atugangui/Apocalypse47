        <?php
// Include database connection
require_once "mysql.php";
// Initialize the session
session_start();

$email = htmlspecialchars($_SESSION["username"]);
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

    $sql = "SELECT * FROM player_table WHERE player_table.email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":email"=>$email));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows[0])!=0) {
            header("location: welcome.php");
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $xp = 50;
                            $bp = 0;

                            $sql = "INSERT INTO player_table (email, NAME, pronouns, xp, bp) VALUES (?,?,?, ?, ?)";
                            $stmt = $conn -> prepare($sql);
                            $stmt -> execute([$email, $name, $pronouns, $xp, $bp]);
                            header("location: welcome.php")
                        }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div>
        <h3>We need a little more information to finish making your account</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
                    </div>    
                    <div class="form-group">
                        <label>Pronouns</label>
                        <input type="text" name="pronouns" class="form-control" value="<?php echo $pronouns; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </div>
                </form>
            </div>

</body>
</html>
