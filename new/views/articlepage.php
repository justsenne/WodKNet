<?php
if (isset($_GET['article'])){
include_once("connection.php");
include_once("include.php");
include_once("header.php");
?>
<div class="products"> <?php


$sql = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
$sql->BindParam(1, $_GET['article']);
$sql->execute();
$result = $sql->fetchAll();


    foreach ($result as $row) {
        $articleid = $row['article_id'];
        echo ""
            . "<div class='productitem'>"


            . "<img class='img' style='width: 100%; object-fit: cover;' src='../data/img/"
            . $row['article_image']
            . "'></div>"

            . "<h3 style='text-align: left'>"
            . $row['article_name']
            . "<br /> €"
            . $row['article_price']
            . "</h3>"
            . "<div class='borderding'>"
            . "<h3 style='text-align: left'>"
            . $row['article_description']
            . "</h3></div>";
    }
} else{
    header("Location: ../index.php");
}
    ?></div>
    <?php
    if ($_SESSION["rank"] == 1) {
        echo "<div class=\"products\" style=\"\"><a style='text-align: left;' href='articleupdate.php?article="
            . $articleid
            . "'><i class=\"fas fa-edit\"></i> Product aanpassen </a><br />"
            . "<a style='text-align: right;' href='articledelete.php?article="
            . $articleid
            . "'><i style='color: darkred;' class=\"fas fa-times\"></i> Product verwijderen</a></div>";
    } else {
        echo "";
    }
?>


