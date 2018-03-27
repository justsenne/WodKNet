<header class="header">
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
</header>
