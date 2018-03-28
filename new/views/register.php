<form id="form" action="registerphp.php" method="post">
    Email: <input type="email" maxlength="50" name="email"><br>
    Password: <input type="password" maxlength="50" name="password" required><br>
    first_name: <input type="text" maxlength="30" name="firstname" required><br>
    surname: <input type="text" maxlength="30" name="surname" required><br>
    phone: <input type="tel" maxlength="10" name="phone" required><br>
    place: <input type="text" maxlength="30" name="place" required><br>
    adress: <input type="text" maxlength="30" name="adress" required><br>
    house number: <input type="number" maxlength="5" name="housenumber" required><br>
    zip code: <input type="text" maxlength="7" name="zipcode" required><br>

    newspaper: <input name="newsletter" type="checkbox"><br>


    <input type="submit" name="submit">

    <a href="../index.php"> index </a>
    <script src="js\jquery.js"></script>
    <script src="js\jquery.validate.js"></script>
    <script>
        $("#form").validate();
    </script>
