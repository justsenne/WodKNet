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
<header class="header">
    <h1 class="title">PC4U</h1>
</header>

<div class="products">
<form style="text-align: center" method="post" action="login.php">
    <label>Email</label><br />
    <input class="inputveld" type="text" name="email"/><br><br>
    <label>Wachtwoord</label><br />
    <input class="inputveld" type="password" name="pass"/><br><br>
    <input type="submit" class="inputknop" name="submit" value="Login"><br><br>

    <a href="register.php">Nog geen account?</a>

</form>
</div>
</body>

</html>