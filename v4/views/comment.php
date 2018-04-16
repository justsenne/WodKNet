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

    //strikte variabelen
    $comment = strip_tags($_POST['comment']);


    $stmt->bindParam(':user_id', $_SESSION["userid"], PDO::PARAM_STR);
    $stmt->bindParam(':article_id', $_GET['article'], PDO::PARAM_STR);
    $stmt->bindParam(':rating', $_POST['rating'], PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    if ($_POST['rating'] <= 10 && $_POST['rating'] >= 0) {
        $KLAP = $stmt->execute();
        header("Location: productpage.php?article=". $_GET['article']);
        exit;
    } else {
        echo "HACKERMEN <img src='http://i0.kym-cdn.com/entries/icons/original/000/021/807/4d7.png'>";
    }
}

?>