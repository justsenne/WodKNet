
<?php

include_once('include/user.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $object = new User();
    $object->Login($email, $pass);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PC4U - dé online computer en elektronica specialist!</title>

    <!-- Bootstrap core CSS -->
<?php include 'include/bootstrap/css.php'; ?>
    <?php include 'include/bootstrap/js.php'; ?>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body>

<?php
    include 'include/nav.php';
?>
/////

<html>
<head>
</head>
<body>

<form method="post" action="loginpage.php">
    Email: <input type="text" name="email"/>
    Password: <input type="password" name="pass"/>
    <input type="submit" name="submit" value="Login">

    <a href="register.php">Nog geen account?</a>

</form>
</body>

</html>
/////

<div class="container">
    <div class="row">
        <div id="logregform" class="col-md-4 ml-auto mr-auto">
            <h2 class="text-center title">Inloggen</h2>
            <form class="contact-form">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">E-mail</label>
                            <input type="text" placeholder="Vul hier uw e-mail in." class="form-control" rows="1" id="exampleMessage">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Wachtwoord</label>
                            <input type="password" placeholder="Vul hier uw wachtwoord in." class="form-control" rows="1" id="exampleMessage">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto text-center">
                        <input type="submit" class="btn btn-round btn-raised" value="Inloggen" style="margin-top: 15px;font-size: 1.2em; background: #0094FE;">
                    </div>
                </div>
            </form>
        </div></div></div>
</body>
</html>


<style>
    body{
        background-color:#0094FE;
        background-image: url(background.png);
        background-position: 50% 0;
    }
    #logregform{
        background: white;
        padding: 20px;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.05);
    }
    redtxt{
         color: red;
    }

    .buttonblauw{
        color: red;
    }

    strong{
        color: #0094FE;
    }
    p{
        font-size: 1.2em;
    }
    h3{
        font-size: 2em;
        margin-bottom: 15px;
        line-height: 1.4em;
    }
</style>