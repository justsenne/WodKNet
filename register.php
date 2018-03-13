<?php

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $email = $_POST['first_name'];
    $pass = $_POST['surname'];
    $email = $_POST['phone'];
    $pass = $_POST['place'];
    $email = $_POST['adress'];
    $pass = $_POST['house_number'];
    $email = $_POST['zip_code'];

}

?>

<html>
<head>
</head>
<body>

<form method="post" action="register.php">
    Registreer <br />
    Email: <input type="text" name="email"/> <br />
    Password: <input type="password" name="pass"/> <br />
    First Name: <input type="text" name="first_name"/> <br />
    Surname: <input type="text" name="surname"/> <br />
    Phone Number: <input type="text" name="phone"/> <br />
    Place: <input type="text" name="place"/> <br />
    Adress: <input type="text" name="adress"/> <br />
    House Number: <input type="text" name="house_number"/> <br />
    Zip Code: <input type="text" name="zip_code"/> <br />

    newsletter


    <input type="submit" name="submit" value="Login">

</form>
</body>

</html>