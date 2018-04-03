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
