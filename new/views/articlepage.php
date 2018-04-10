<!DOCTYPE html>
<?php
session_start();
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
        echo "<div class='productitem'>
            <img class='img' style='width: 100%; object-fit: cover;' src='../data/img/"
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
    } else {
        header("Location: ../index.php");
    }
    ?></div>
<?php
// dylan kan je ff die \" veranderen naar '
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

<!-- comment form -->
<form action="comment.php?article=<?php echo $_GET['article']; ?>" method="POST">
    <label for="number"> rating:</label>
    <input type="number" name="rating" max="10" min="0">
    <textarea name="comment" maxlength="1500" id="comment" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" value="place comment">
</form> </br>

<?php
// deze code print de comments uit enzo (niet dit soort comment in de code je snapt me wel)
$commentsql = $conn->prepare("SELECT * FROM comments WHERE article_id=? ORDER BY rating DESC");
$commentsql->BindParam(1, $_GET['article']);
$commentsql->execute();
$result = $commentsql->fetchAll();

foreach ($result as $row) {
    // ik heb de wrapper ff de class products gegeven voor overzichtelijkheid
    echo "<div class='comment_wrapper products'>
    <div class='comment_header'>
    " . $row["user_id"] . " - rating: " . $row["rating"] . "
</div> <div class='comment_body'>
    " . $row["comment"];
        if ($row["user_id"] == $_SESSION["userid"]){
        // link naar updaten
        echo "<a href='commentupdate.php?id=" . $row["comment_id"] . "'> update </a>";
        // link naar verwijderen
        echo "<a href='commentdelete.php?id=" . $row["comment_id"] . "'> DELET </a>";

    } elseif ($_SESSION["rank"] == 1) {
        // link naar verwijderen als je admin bent
        echo "<a href='commentdelete.php?id=" . $row["comment_id"] . "'> DELET </a>";
    }
    echo "</div> </div>";
}
?>


