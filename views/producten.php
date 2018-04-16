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

        $sql = $conn->prepare("SELECT * FROM articles ORDER BY article_id DESC");
        $sql->execute();
        $result = $sql->fetchAll();

        foreach ($result as $row) {
            echo ""
                ."<div class=\"col-lg-3 col-md-4 col-sm-6 my-3\">"
                    ."<a class='swiper-slide rounded box-shadow' style='width: 200px; height: 200px;' href='../views/productpage.php?article="
                    . $row['article_id'] . "'>"
                        ."<div class=\"card h-100\">"
                            ."<img class='card-img-top' style='width: 100%; height: 100%; object-fit: cover; position: relative;' src='../data/img/"
                            . $row['article_image']
                            . "'>"
                            ."<div class=\"card-body\">"
                                ."<h4 class=\"card-title\">"
                                    . $row['article_name']
                                ."</h4>"
                                ."<h5 class=\"card-price\"> €"
                                    . $row['article_price']
                                ."</h5>"

                            ."</div>"
                            ."<div class=\"card-footer\">"
                                ."<small class=\"text-muted\">★ ★ ★ ★ ☆</small>"
                            ."</div>"
                        ."</div>"
                    ."</a>"
                ."</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
