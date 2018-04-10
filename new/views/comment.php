<?php
session_start();
if (isset($_POST["submit"])) {
    include("connection.php");
    $sql = "INSERT INTO comments(user_id, product_id, rating, comment) 
                            VALUES (:user_id, 
                             :product_id, 
                             :rating, 
                             :comment)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':user_id', $_SESSION["userid"], PDO::PARAM_STR);
    $stmt->bindParam(':product_id', $_GET['article'], PDO::PARAM_STR);
    $stmt->bindParam(':rating', $_POST['rating'], PDO::PARAM_STR);
    $stmt->bindParam(':comment', $_POST['comment'], PDO::PARAM_STR);
    $stmt->execute();
}
echo $_SESSION["userid"]. $_GET['article']. $_POST['rating']. $_POST['comment'];
?>