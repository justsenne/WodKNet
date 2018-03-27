<?php
include_once("connection.php");
session_start();

$statmen = $conn->prepare("SELECT * FROM game_desc WHERE game_id=?");
$statmen->BindParam(1, $_GET['product']);
$statmen->execute();
$result = $statmen->fetchAll();

foreach ($result as $var) {
    $delet = $var['userid'];
}

if ($delet == $_SESSION['userid']){

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM game_desc WHERE game_id=" . $_GET['product'];
    $conn->exec($sql);

    header("Location: ../index.php");
    exit;
}
?>