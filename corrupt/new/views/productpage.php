<?php
session_start();
?>
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
    ?>
    <link rel="stylesheet" type="text/css" href="../layout/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../marktplaats-compass/stylesheets/style.css">
</head>
<body>

<!-- Header -->

<?php
include('../includes/nav.php');
?>




<div class="container">
    <div class="my-3 p-3 bg-white rounded box-shadow row">
        <?php
        include_once("../views/connection.php");

        $sql = $conn->prepare("SELECT * FROM articles WHERE article_id=?");
        $sql->BindParam(1, $_GET['article']);
        $sql->execute();
        $result = $sql->fetchAll();

        foreach ($result as $row) {
            echo ""
                ."<div class=\"card m-3\">"
                    ."<div class=\"row \">"
                        ."<div class=\"col-md-4\">"
                            ."<img class='card-img-top' style='width: 100%; height: 100%; object-fit: cover; position: relative;' src='../data/img/"
                            . $row['article_image']
                            . "'>"
                        ."</div>"
                        ."<div class=\"col-md-8 px-3\">"
                            ."<div class=\"card-block py-3\">"
                                ."<h4 class=\"card-title\">"
                                    . $row['article_name']
                                ."</h4>"
                                ."<p class=\"card-text\">"
                                    ."Prijs: €"
                                    . $row['article_price']
                                ."</p>"
                                ."<p class=\"card-text\">"
                                    ."Artikelnummer: "
                                    . $row['article_id']
                                ."</p>"
                                ."<p class=\"card-text\">"
                                    ."Product omschrijving: <br />"
                                    . $row['article_description']
                                ."</p>"
                            ."</div>"
                        ."</div>"
                    ."</div>"
                ."</div>";
        }
        ?>
    </div>
</div>

<?php
// dylan kan je ff die \" veranderen naar '
if ($_SESSION["rank"] == 1) {
    echo ""
        ."<div class=\"my-3  bg-white rounded box-shadow container\">"
        ."<div class=\"row p-3\">"
            ."<div class='col-sm-6'>"
                ."<a style='text-align: right;' href='http://localhost/WodKNet2/views/articleupdate.php?article="
                . $row['article_id']
                . "'><i class=\"fas fa-edit\"></i> Product aanpassen </a>"
            ."</div>"
            ."<div class='col-sm-6'>"
                . "<a style='text-align: center;' href='http://localhost/WodKNet2/views/articledelete.php?article="
                . $row['article_id']
                . "'><i style='color: darkred;' class=\"fas fa-times\"></i> Product verwijderen</a>"
            ."</div>"
        ."</div>"
        ."</div>";

        
//        ."<div class=\"my-3 p-3 bg-white rounded box-shadow container\">"
//        ."<div class='products' style=\"\"><a style='text-align: center;' href='http://localhost/WodKNet2/views/articleupdate.php?article="
//        . $row['article_id']
//        . "'><i class=\"fas fa-edit\"></i> Product aanpassen </a><br />"
//        . "<a style='text-align: center;' href='http://localhost/WodKNet2/views/articledelete.php?article="
//        . $row['article_id']
//        . "'><i style='color: darkred;' class=\"fas fa-times\"></i> Product verwijderen</a></div>"
//        ."</div>";
} else {
    echo "";
}
?>

<div class="my-3 p-3 bg-white rounded box-shadow container">
    <form class="p-3" action="comment.php?article=<?php echo $_GET['article']; ?>" method="POST">
        <h6 class="border-bottom border-gray pb-2 mb-0">Laat uw mening over dit product:</h6>
        <div class="row my-2">
            <div class="col-2">
                <label>Cijfer:</label>
                <select class="form-control form-control-md" name="rating" style="text-align: center">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option selected="selected">10</option>
                </select>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <label>Toelichting:</label><br />
                <input type="text" class="form-control form-control-md" name="comment" id="comment"></input>

            </div>
        </div>
        <div class="row my-2 ">
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="Recentie versturen" name="submit">
            </div>
        </div>
<!--        <label for="number"> rating:</label>-->
<!--        <input type="number" name="rating" max="10" min="0">-->
<!--        <textarea name="comment" maxlength="1500" id="comment" cols="30" rows="10"></textarea>-->
<!--        <input type="submit" name="submit" value="place comment">-->
    </form>
</div>
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

<div class="my-3 p-3 bg-white rounded box-shadow container">
    <h6 class="border-bottom border-gray pb-2 mb-0">Wat onze klanten vinden van dit product:</h6>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username geeft dit product een 10.</strong>
            bericht
        </p>
    </div>
</div>


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
</body>
</html>
