<html>
<head>
    <?php
    include_once("views/include.php");
    ?>
</head>
<body>


<!-- Header -->
<header class="header">

    <?php
    session_start();
    if (!isset($_SESSION["logged"])) {
        header("Location: views/login.php");
        exit;
    } else {
        echo "welkom " . $_SESSION["user"] . "!";
            if ($_SESSION["rank"] == 1) {
               echo "<a href='views/article.php'>article toevoegen</a>";
                }
            echo "<a href='views/vernietig.php?vernietig'> Logout </a>";
    }
    ?>
</header>


<title> HomePage - GamerTrade </title>

<!-- Body -->
<?php
include_once("views/connection.php");

$sql = $conn->prepare("SELECT * FROM articles");
$sql->execute();
$result = $sql->fetchAll();

foreach ($result as $row) {
    echo "<a href='views/articlepage.php?article=" . $row['article_id'] . "'><div class='game-item'><h1>"
        . strip_tags($row['article_name'], '')
        . " - $"
        . strip_tags($row["article_price"], '')
        . "</h1><img style='width: 100%; height: 100%;' src='data/img/"
        . $row['article_image']
        . "'> </div> </a>";
}
?>

<script type="text/javascript">
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    $(document).ready(
        alert("Hello! I am an alert box!!");
    )
    ;


</script>

</body>
</html>
