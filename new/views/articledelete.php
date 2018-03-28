<?php
include_once("connection.php");
session_start();

$statmen = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
$statmen->BindParam(1, $_GET['article']);
$statmen->execute();
$result = $statmen->fetchAll();

foreach ($result as $var) {
    $delet = $var['userid'];
}

if ($delet == $_SESSION['userid']){

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM articles WHERE article_id=" . $_GET['article'];
    $conn->exec($sql);

    header("Location: ../index.php");
    exit;
}
?>