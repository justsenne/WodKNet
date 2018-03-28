<?php
if (isset($_GET['article'])){
include_once("connection.php");
include_once("include.php");
include_once("header.php");

$sql = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
$sql->BindParam(1, $_GET['article']);
$sql->execute();
$result = $sql->fetchAll();

foreach ($result as $row) {
    echo "<div class='article-page'><h1>"
        . strip_tags($row['article_name'], '')
        . " - $"
        . strip_tags($row["article_price"], '')
        . "</h1><img style='width: 100%; height: 100%;' src='../data/img/"
        . $row['article_image']
        . "'> "
        . $row['article_description']
        . "";
    $articleid = $row['article_id'];
}
} else{
    header("Location: ../index.php");
}
    if ($_SESSION["rank"] == 1) {
        echo "<a href='articleupdate.php?article="
            . $articleid
            . "'> change </a>"
            . "<a href='articledelete.php?article="
            . $articleid
            . "'> delete </a>";
    } else {
    }
?>

</div>
