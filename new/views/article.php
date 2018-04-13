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

        <div class="my-3 p-3 bg-white rounded box-shadow container">
            <form class="p-3" id="form" action="../views/articlephp.php" method="POST" enctype="multipart/form-data">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Nieuw product toevoegen:</h6>
                <div class="row my-2">
                    <div class="col-12">
                        <label>Naam van het product</label>
                        <input class="form-control" type="text" maxlength="15" name="articlename">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12">
                        <label>Beschrijving van het product</label>
                        <input class="form-control" type="text" maxlength="300" name="articledesc" required>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12">
                        <label>Prijs van het product</label>
                        <input class="form-control" type="text" maxlength="6" name="articleprice" required>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12">
                        <label>Product afbeelding:</label>
                        <label class="custom-file">
                            <input type="file" id="file" name="articleimage" class=" btn btn-primary">
                        </label>
                    </div>
                </div>
                <div class="row my-2 ">
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary" value="Product toevoegen" name="submit">
                    </div>
                </div>
                <!--        <label for="number"> rating:</label>-->
                <!--        <input type="number" name="rating" max="10" min="0">-->
                <!--        <textarea name="comment" maxlength="1500" id="comment" cols="30" rows="10"></textarea>-->
                <!--        <input type="submit" name="submit" value="place comment">-->
            </form>
        </div>
    </body>
</html>