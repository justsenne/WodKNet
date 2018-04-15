<?php
include_once("connection.php");
session_start();

if ($_SESSION['rank'] == 1){

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM articles WHERE article_id=" . $_GET['article'];
    $conn->exec($sql);

    header("Location: ../index.php");
    exit;
}
?>