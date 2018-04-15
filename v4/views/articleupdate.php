<!DOCTYPE html>
<html>

<head>
    <?php
    include("include.php");
    ?>
</head>

<body>

<?php
include("header.php");

include_once('connection.php');
if (isset($_POST['submit'])) {

    if ($_SESSION['rank'] == 1 && isset($_SESSION["logged"])) {


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
        header("Location: ../index.php");
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

        echo "<div class=\"products\"><form id='form' style=\"text-align: center\" action='articleupdate.php?article=" . $_GET['article'] . "' method='POST' enctype='multipart/form-data'>
           <label>Naam van het product</label><br /><input type='text' class=\"inputveld\"  maxlength='15' name='articlename' value='"
            . $name
            . "' required><br><br><label>Beschrijving van het product</label><br /><input type='text' class=\"inputveld\"  maxlength='300' name='articledesc' value='"
            . $desc
            . "' required><br><br><label>Prijs van het product</label><br /><input type='text' maxlength='6' class=\"inputveld\"  name='articleprice' value='"
            . $price
            . "' required><br><br> <input type='submit' class=\"inputknop\" name='submit' value='Product aanpassen'> </form></div>";
    }
} else {
    header("Location: ../index.php");
}
?>
<button onclick="goBack()">Go Black</button>


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