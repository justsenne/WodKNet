<?php
include_once('connection.php');
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO account_info(email,
                          password,
                          first_name,
                          last_name,
                          phone,
                          place,
                          adress,
                          house_number,
                          zip_code) VALUES (
                          :email,
                          :password,
                          :firstname,
                          :surname,
                          :phone,
                          :place,
                          :adress,
                          :housenumber,
                          :zipcode)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $stmt->bindParam(':surname', $_POST['surname'], PDO::PARAM_STR);
    $stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
    $stmt->bindParam(':place', $_POST['place'], PDO::PARAM_STR);
    $stmt->bindParam(':adress', $_POST['adress'], PDO::PARAM_STR);
    $stmt->bindParam(':housenumber', $_POST['housenumber'], PDO::PARAM_STR);
    $stmt->bindParam(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);

    try {
        $stmt->execute();
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
