<form id="form" action="articlephp.php" method="POST" enctype="multipart/form-data">
    Article name: <input type="text" maxlength="15" name="articlename"><br>
    Article description (staat etc): <input type="text" maxlength="300" name="articledesc" required><br>
    Price: <input type="number" maxlength="6" name="articleprice" required><br>
    Article Image: <input type="file" name="articleimage"><br>


    <input type="submit" name="submit">

</form>

    <a href="../index.php"> index </a>

    <script src="js\jquery.js"></script>
    <script src="js\jquery.validate.js"></script>
    <script>
        $("#form").validate();
    </script>