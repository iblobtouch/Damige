<html>
<body>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "damige";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "<br>");
    }
    
    $sql = "SELECT * FROM users WHERE username = '". $_POST["user"] . "' 
    AND password = '" . $_POST["pass"] . "'";
    
    echo $sql;
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['login'] = true;
        if(isset($_SESSION['login'])){
            header("Location: /damige/index.php");
        }
        echo "true";
    } else {
        header("Location: /damige/login.php");
        echo "true";
    }
    
$conn->close();
    
    
?>

    
<button><a href="index.php">Go back to the homepage</a></button>   

</body>
</html>