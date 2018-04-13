<?php
include_once("connection.php");
session_start();

$idsql = $conn->prepare("SELECT * FROM comments WHERE comment_id=?");
$idsql->BindParam(1, $_GET['id']);
$idsql->execute();
$results = $idsql->fetchAll();

foreach ($results as $row) {
    $comment_user = $row["user_id"];
    $article_id = $row["article_id"];
}

if ($_SESSION['rank'] == 1 || $_SESSION["userid"] == $comment_user){

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM comments WHERE comment_id=" . $_GET["id"];
    $conn->exec($sql);

    header("Location: articlepage.php?article=". $article_id);
    exit;
} else {
    header("Location: articlepage.php?article=". $article_id);
    exit;
}
?>