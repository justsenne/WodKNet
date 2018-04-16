<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="../layout/scripts/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../layout/scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../layout/scripts/bootstrap.js"></script>
    <script type="text/javascript" src="../layout/scripts/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="../layout/scripts/fontawesome-all.js"></script>
    <?php
    include('../includes/head.php');
    session_start();
    ?>
    <link rel="stylesheet" type="text/css" href="../layout/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../marktplaats-compass/stylesheets/style.css">
</head>

<body>

<?php
include("../includes/nav.php");

include_once('connection.php');
if (isset($_POST['submit'])) {
echo "1";
    if ($_SESSION['rank'] == 1 && isset($_SESSION["logged"])) {
echo "2";

        $sql = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
        $sql->BindParam(1, $_GET['article']);
        $sql->execute();
        $result = $sql->fetchAll();

        foreach ($result as $row) {
            $img = $row["article_image"];
        }
        $sql = "UPDATE articles SET article_name=?, article_description=?, article_price=?, article_image=? WHERE article_id=?";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['articlename'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['articledesc'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['articleprice'], PDO::PARAM_STR);
        $stmt->bindParam(4, $img, PDO::PARAM_STR);
        $stmt->bindParam(5, $_GET['article'], PDO::PARAM_STR);
        $stmt->execute();

        header("Location: ../index.php");
        exit;
    } else {
        echo "3";
        header("Location: ../index.php");
        exit;
    }
} else if ($_SESSION['rank'] == 1) {
    $sql = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
    $sql->BindParam(1, $_GET['article']);
    $sql->execute();
    $result = $sql->fetchAll();

    foreach ($result as $row) {
        $name = $row['article_name'];
        $desc = $row['article_description'];
        $price = $row['article_price'];
        $img = $row["article_image"];

        echo "<div class='products'><form id='form' style='text-align: center' action='articleupdate.php?article=" . $_GET['article'] . "' method='POST' enctype='multipart/form-data'>
           <label>Naam van het product</label><br /><input type='text' class='inputveld'  maxlength='15' name='articlename' value='"
            . $name
            . "' required><br><br><label>Beschrijving van het product</label><br /><input type='text' class='inputveld'  maxlength='300' name='articledesc' value='"
            . $desc
            . "' required><br><br><label>Prijs van het product</label><br /><input type='text' maxlength='6' class='inputveld'  name='articleprice' value='"
            . $price
            . "' required><br><br> <input type='submit' class='inputknop' name='submit' value='Product aanpassen'> </form></div>";
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
<button onclick="goBack()"> return </button>


<a href="../index.php"> index </a>
<script src="js\jquery.js"></script>
<script src="js\jquery.validate.js"></script>
<script>
    $("#form").validate();

    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>