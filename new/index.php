<html>
<head>
    <script type="text/javascript" src="layout/scripts/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="layout/scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="layout/scripts/modernizr-2.6.2.js"></script>
    <script type="text/javascript" src="layout/scripts/bootstrap.js"></script>
    <script type="text/javascript" src="layout/scripts/respond.min.js"></script>
    <script type="text/javascript" src="layout/scripts/script.js"></script>
    <script type="text/javascript" src="layout/scripts/ajax.js"></script>
    <script defer src="layout/scripts/fontawesome-all.js"></script>

    <link rel="stylesheet" type="text/css" href="layout/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="layout/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="marktplaats-compass/stylesheets/screen.css">

</head>
<body>


<!-- Header -->
<header class="header">

    <?php
    session_start();
    if (!isset($_SESSION["logged"])) {
        echo "<a href='views/login.php'>login</a>";
    } else {
        echo "welkom " . $_SESSION["user"] . "!"
            ."<a href='views/product.php'>Product toevoegen</a>"
            . "<a href='views/vernietig.php?vernietig'> Logout </a>";
    }
    ?>
</header>


<title> HomePage - GamerTrade </title>

<!-- Body -->
<?php
include_once("views/connection.php");

$sql = $conn->prepare("SELECT * FROM game_desc");
$sql->execute();
$result = $sql->fetchAll();

foreach ($result as $row) {
    echo "<a href='views/productpage.php?product=" . $row['game_id'] . "'><div class='game-item'><h1>"
        . strip_tags($row['game_name'], '')
        . " - $"
        . strip_tags($row["game_price"], '')
        . "</h1><img style='width: 100%; height: 100%;' src='data/img/"
        . $row['game_image']
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
