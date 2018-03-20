<?php

include_once('connection.php');

$yes = 1;
$no = 0;

$sql = "INSERT INTO users(email,
                          password,
                          first_name,
                          surname,
                          phone,
                          place,
                          adress,
                          house_number,
                          zip_code,
                          newsletter) VALUES (
                          :email,
                          :password,
                          :firstname,
                          :surname,
                          :phone,
                          :place,
                          :adress,
                          :housenumber,
                          :zipcode,
                          :newsletter)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindParam(':surname', $_POST['surname'], PDO::PARAM_STR);
$stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
$stmt->bindParam(':place', $_POST['place'], PDO::PARAM_STR);
$stmt->bindParam(':adress', $_POST['adress'], PDO::PARAM_STR);
$stmt->bindParam(':housenumber', $_POST['housenumber'], PDO::PARAM_STR);
$stmt->bindParam(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
if(isset($_POST['newsletter']) && $_POST['newsletter'] == 'Yes') {
    $stmt->bindParam(':newsletter', $yes, PDO::PARAM_STR);
} else {
    $stmt->bindParam(':newsletter', $no, PDO::PARAM_STR);
}

$stmt->execute();
?>