<?php

if (!$_SESSION["logged"] == true) {
    header("Location: loginpage.php");
    exit;
}

echo "hier moet de index pagina slet" ;

?>

/////// indexxx