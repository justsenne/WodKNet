<?php

include_once('user.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $object = new User();
    $object->Login($email, $pass);
}

?>

<html>
<head>
    <?php
    include("include.php");
    ?>
</head>
<body>

<form method="post" action="login.php">
    Email: <input type="text" name="email"/>
    Password: <input type="password" name="pass"/>
    <input type="submit" name="submit" value="Login">

    <a href="register.php">Nog geen account?</a>

</form>
</body>

</html>