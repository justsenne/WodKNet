<?php
if (isset($_GET['product'])){
include_once("connection.php");
include_once("include.php");
include_once("header.php");

$useredit = "neen";

$sql = $conn->prepare("SELECT * FROM game_desc WHERE game_id=?");
$sql->BindParam(1, $_GET['product']);
$sql->execute();
$result = $sql->fetchAll();

foreach ($result as $row) {
    echo "<div class='product-page'><h1>"
        . strip_tags($row['game_name'], '')
        . " - $"
        . strip_tags($row["game_price"], '')
        . "</h1><img style='width: 100%; height: 100%;' src='../data/img/"
        . $row['game_image']
        . "'> "
        . $row['game_description']
        . "";
    $useredit = $row['userid'];
    $productid = $row['game_id'];
}
} else{
    header("Location: ../index.php");
}
    if (!$useredit == $_SESSION['userid']) {
        echo "<a href='productupdate.php?product="
            . $productid
            . "'> change </a>"
            . "<a href='productdelete.php?product="
            . $productid
            . "'> delete </a>";
    } else {
        echo "<a href='productupdate.php?product="
            . $productid
            . "'> change </a>"
            . "<a href='productdelete.php?product="
            . $productid
            . "'> delete </a>";
    }
?>

</div>
