<nav class="navbar navbar-expand-md navbar-dark header">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/WodKNet2/index.php">PC4U</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/WodKNet2/index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/WodKNet2/views/producten.php">Producten</a>
                </li>
                <?php if (isset($_SESSION)) {
                if ($_SESSION["rank"] == '1') {
                    echo ""
                        ."<li class=\"nav-item\">"
                        ."<a class=\"nav-link\" href=\"http://localhost/WodKNet2/views/article.php\">Product-toevoegen</a>"
                        ."</li>";} else {}}
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/WodKNet2/views/vernietig.php?vernietig">Uitloggen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>