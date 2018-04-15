<?php
session_start();
if (isset($_POST["submit"])) {
    include("connection.php");
    $sql = "INSERT INTO comments(user_id, article_id, rating, comment) 
                            VALUES (:user_id, 
                             :article_id, 
                             :rating, 
                             :comment)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':user_id', $_SESSION["userid"], PDO::PARAM_STR);
    $stmt->bindParam(':article_id', $_GET['article'], PDO::PARAM_STR);
    $stmt->bindParam(':rating', $_POST['rating'], PDO::PARAM_STR);
    $stmt->bindParam(':comment', strip_tags($_POST['comment']), PDO::PARAM_STR);
    $stmt->execute();
}

header("Location: articlepage.php?article=". $_GET['article']);
exit;
?>