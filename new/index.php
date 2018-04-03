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
            ."<a href='views/article.php'>Product toevoegen</a>"
            . "<a href='views/vernietig.php?vernietig'> Logout </a>";
    }
    ?>
</div>




<title> HomePage - GamerTrade </title>

<!-- Body -->
<div class="products">
    <h2>Nieuw in de webshop:</h2>
    <div class="nieuwgrid">
    <?php
    include_once("views/connection.php");

    $sql = $conn->prepare("SELECT * FROM articles ORDER BY created_at DESC LIMIT 4");
    $sql->execute();
    $result = $sql->fetchAll();

    foreach ($result as $row) {
        echo ""
            . "<div class='productitem'>"


            . "<a href='views/articlepage.php?article=" . $row['article_id'] . "'> "
            . "<img class='img' style='width: 100%; object-fit: cover;' src='data/img/"
            . $row['article_image']
            . "'></a>"


            . "<a href='views/articlepage.php?article=" . $row['article_id'] . "'> "
            . "<h3>"
            . $row['article_name']
            . "<br /> €"
            . $row['article_price']
            . "</h3></a>"

            . "</div>";
    }
    ?>
        </div>
</div>

<div class="products">
    <h2>Nieuw in de webshop:</h2>
    <div class="nieuwgrid">
        <?php
        include_once("views/connection.php");

        $sql = $conn->prepare("SELECT * FROM articles ORDER BY created_at DESC LIMIT 4");
        $sql->execute();
        $result = $sql->fetchAll();

        foreach ($result as $row) {
            echo ""
                . "<div class='productitem'>"


                . "<a href='views/articlepage.php?article=" . $row['article_id'] . "'> "
                . "<img class='img' style='width: 100%; object-fit: cover;' src='data/img/"
                . $row['article_image']
                . "'></a>"


                . "<a href='views/articlepage.php?article=" . $row['article_id'] . "'> "
                . "<h3>"
                . $row['article_name']
                . "<br /> €"
                . $row['article_price']
                . "</h3></a>"

                . "</div>";
        }
        ?>
    </div>
</div>




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
