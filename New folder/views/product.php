<form id="form" action="productphp.php" method="POST" enctype="multipart/form-data">
    Game name: <input type="text" maxlength="15" name="gamename"><br>
    Game description (staat etc): <input type="text" maxlength="300" name="gamedesc" required><br>
    Price: <input type="number" maxlength="6" name="gameprice" required><br>
    Game Image: <input type="file" name="gameimage"><br>


    <input type="submit" name="submit">

</form>

    <a href="../index.php"> index </a>

    <script src="js\jquery.js"></script>
    <script src="js\jquery.validate.js"></script>
    <script>
        $("#form").validate();
    </script>