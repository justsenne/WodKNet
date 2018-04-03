<html>
<head>
    <script type="text/javascript" src="../layout/scripts/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../layout/scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../layout/scripts/bootstrap.js"></script>
    <script type="text/javascript" src="../layout/scripts/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="../layout/scripts/fontawesome-all.js"></script>

    <link rel="stylesheet" type="text/css" href="../layout/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="./marktplaats-compass/stylesheets/style.css">
</head>
<body>


<!-- Header -->
<header class="header">
    <h1 class="title">PC4U</h1>
</header>
<div class="phpheader">
    <?php
    echo "<a href='../index.php'>homepage</a>";
    session_start();
    if (!isset($_SESSION["logged"])) {
        echo "<a href='login.php'>login</a>";
    } else {
        echo "welkom " . $_SESSION["user"] . "!"
            ."<a href='product.php'>Product toevoegen</a>"
            . "<a href='vernietig.php?vernietig'> Logout </a>";
    }
    ?>
</div>




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
        . "</h1><img style='width: 100%;' src='data/img/"
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
