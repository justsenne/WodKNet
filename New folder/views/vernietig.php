<?php
session_start();
if (isset($_GET['vernietig'])){
    session_destroy();
    header("Location: ../index.php");
} else{
    header("Location: ../index.php");
}
?>