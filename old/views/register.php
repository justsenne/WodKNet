<html>
<head>
    <?php
    include("include.php");
    ?>
</head>
<body>
<header class="header">
    <h1 class="title">PC4U</h1>
</header>

<div class="products">
<form style="text-align: center" id="form" action="registerphp.php" method="post">
    <label>Email</label><br />
    <input  class="inputveld" type="email" maxlength="50" name="email"><br><br>

    <label>Wachtwoord</label><br />
    <input  class="inputveld" type="password" maxlength="50" name="password" required><br><br>

    <label>Voornaam</label><br />
    <input  class="inputveld" type="text" maxlength="30" name="firstname" required><br><br>

    <label>Achternaam</label><br />
    <input  class="inputveld" type="text" maxlength="30" name="surname" required><br><br>

    <label>Telefoon nummer</label><br />
    <input  class="inputveld" type="tel" maxlength="10" name="phone" required><br><br>

    <label>Woonplaats</label><br />
    <input class="inputveld"  type="text" maxlength="30" name="place" required><br><br>

    <label>Staatnaam</label><br />
    <input  class="inputveld" type="text" maxlength="30" name="adress" required><br><br>

    <label>Huisnummer</label><br />
    <input class="inputveld"  type="text" maxlength="5" name="housenumber" required><br><br>

    <label>Postcode</label><br />
    <input class="inputveld"  type="text" maxlength="7" name="zipcode" required><br><br>


    <input name="newsletter" type="checkbox"><label> aanmelden voor de nieuwsbrief?</label><br><br>


    <input class="inputknop" type="submit" name="submit"><br><br>
    <a href="login.php">Heb jij al een account?</a>
</form>
</div>
    <script src="js\jquery.js"></script>
    <script src="js\jquery.validate.js"></script>
    <script>
        $("#form").validate();
    </script>
</body>
</html>