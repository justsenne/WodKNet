<!DOCTYPE html>
<html>

<head>
    <?php
    include("include.php");
    ?>
</head>

<body>

<?php
include("header.php");
?>

<div class="products">
<form style="text-align: center" id="form" action="articlephp.php" method="POST" enctype="multipart/form-data">
    <label>Naam van het product</label><br />
    <input class="inputveld" type="text" maxlength="15" name="articlename"><br><br>

    <label>Beschrijving van het product</label><br />
    <input class="inputveld" type="text" maxlength="300" name="articledesc" required><br><br>

    <label>Prijs van het product</label><br />
    <input class="inputveld" type="text" maxlength="6" name="articleprice" required><br><br>

    <label>Afbeelding van het product</label><br />
    <input class="inputveld" type="file" name="articleimage"><br><br>


    <input class="inputknop" type="submit" value="Product toevoegen" name="submit">

</form>
</div>

<a href="../index.php"> index </a>

<script src="js\jquery.js"></script>
<script src="js\jquery.validate.js"></script>
<script>
    $("#form").validate();
</script>
</body>

</html>