<html>
<body>

<?php
    $servername = "localhost";
    $username = "Iblob";
    $password = "";
    $dbname = "damige";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "<br>");
    }
    
    $sql = "SELECT * FROM delivery WHERE VRN = '". $_POST["VRN"] . "' 
    AND Driver_ID = '" . $_POST["ID"] ."' 
    AND Venue_ID = '" . $_POST["venue"] ."'
    AND Date = '" . $_POST["date"] . "'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Delivery authorised, have a nice day";
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Delivery Attempt', 'Valid Delivery', STR_TO_DATE('" . $_POST["date"] . "', '%Y-%m-%d'));";
        
        echo $sql;
        $result = $conn->query($sql);
    } else {
        echo "Delivery Not authorised, please wait for assistance";
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Delivery Attempt', 'Invalid Delivery', STR_TO_DATE('" . $_POST["date"] . "', '%Y-%m-%d'));";
        
        echo $sql;
        $result = $conn->query($sql);
    }
    
$conn->close();
    
    
?>

    
<button><a href="index.php">Go back to the homepage</a></button>   

</body>
</html>