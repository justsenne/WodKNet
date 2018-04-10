<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    include("include.php");
    ?>
</head>

<body>

<?php
include("header.php");

include_once('connection.php');
$idsql = $conn->prepare("SELECT * FROM comments WHERE comment_id=?");
$idsql->BindParam(1, $_GET['id']);
$idsql->execute();
$results = $idsql->fetchAll();

foreach ($results as $row) {
    $comment_user = $row["user_id"];
    $article_id = $row["article_id"];
}

if (isset($_POST['submit'])) {

    if ($_SESSION["userid"] == $comment_user) {

        $sql = "UPDATE comments SET rating=?, comment=? WHERE comment_id=?";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['rating'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['comment'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_GET['id'], PDO::PARAM_STR);
        $stmt->execute();

        header("Location: articlepage.php?article=". $article_id);
        exit;
    } else {
        header("Location: ../index.php");
    }
} else if ($_SESSION["userid"] == $comment_user) {
    $sql = $conn->prepare("SELECT * FROM comments WHERE comment_id=?");
    $sql->BindParam(1, $_GET['id']);
    $sql->execute();
    $result = $sql->fetchAll();

    foreach ($result as $row) {

        echo "<form action='commentupdate.php?id=" . $_GET['id'] . "' method='POST'>
        <label for='rating'> rating:</label>
        <input type='number' name='rating' max='10' min='0'  value='" . $row["rating"] . "'>
        <textarea name='comment' maxlength='1500' id='comment' cols='30' rows='10'>" . $row["comment"] . "</textarea>
        <input type='submit' name='submit' value='edit comment'> </form>";

    }
} else {
    header("Location: ../index.php");
}
?>
<button onclick="goBack()">Go Back</button>


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