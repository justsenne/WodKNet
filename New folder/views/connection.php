<?php
try {
    global $conn;
    $conn = new PDO('mysql:host=localhost;dbname=gamertrade', "root", "");
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
