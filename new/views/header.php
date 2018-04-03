<header class="header">
    <h1 class="title">PC4U</h1>
</header>
<script>
    $(document).ready(function(){
        $(".phpheader").click(function(){
            $(".menuding").slideToggle(500);
        });
    });
</script>
<div class="phpheader">
        <h1>menu</h1>

        <div class="menuding"
        <?php
            echo ""
                ."<a href='../index.php'>homepage</a>";
        session_start();
        if (!isset($_SESSION["logged"])) {
            echo "<a href='login.php'>login</a>";
        } else {
            echo "welkom " . $_SESSION["user"] . "!"
                ."<a href='article.php'>Product toevoegen</a>"
                . "<a href='vernietig.php?vernietig'> Logout </a>";
        }
        ?>
</div>

</div>


<header class="header">
    <h1 class="title">PC4U</h1>
</header>
<script>
    $(document).ready(function(){
        $(".phpheader").click(function(){
            $(".menuding").slideToggle(250);
        });
    });
</script>
<div class="phpheader">
    <h2>menu</h2>

    <div class="menuding" style="display: none; text-align: center">
        <?php
        echo ""
            ."<a href='../index.php'>Voorpagina</a><br>"
            ."<a href='../index.php'>Producten</a><br>"
            ."<a href='../index.php'>Recenties</a><br>"
            ."<a href='article.php'>Product toevoegen</a><br>"
            ."<a href='vernietig.php?vernietig'> Logout </a><br>";
        session_start();
        ?>
    </div>

</div>












<!---->
<!--<header class="header">-->
<!--    <h1 class="title">PC4U</h1>-->
<!--</header>-->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $(".phpheader").click(function(){-->
<!--            $(".menuding").slideToggle(250);-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--<div class="phpheader">-->
<!--    <h2>menu</h2>-->
<!---->
<!--    <div class="menuding" style="display: none; text-align: center">-->
<!--        --><?php
//        echo ""
//            ."<a href='../index.php'>Voorpagina</a><br>"
//            ."<a href='../index.php'>Producten</a><br>"
//            ."<a href='../index.php'>Recenties</a><br>"
//            ."<a href='article.php'>Product toevoegen</a><br>"
//            ."<a href='vernietig.php?vernietig'> Logout </a><br>";
//        session_start();
//        ?>
<!--    </div>-->
<!---->
<!--</div>-->
