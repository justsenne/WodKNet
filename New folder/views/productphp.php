<?php
include_once ('connection.php');
session_start();
if (isset($_POST['submit'])) {
        $file = $_FILES['gameimage'];
        $fileName = $file['name'];
        $fileTMPname = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileFile = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

                if ($fileSize < 5120000) {
                    $fileHash = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../data/img/'.$fileHash;
                    move_uploaded_file($fileTMPname, $fileDestination);

                    $sql = "INSERT INTO game_desc(userid, game_name, game_description, game_price, game_image) 
                            VALUES (
                          :userid,
                          :gamename,
                          :gamedesc,
                          :gameprice,
                          :gameimage)";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(':userid', $_SESSION["userid"], PDO::PARAM_STR);
                    $stmt->bindParam(':gamename', $_POST['gamename'], PDO::PARAM_STR);
                    $stmt->bindParam(':gamedesc', $_POST['gamedesc'], PDO::PARAM_STR);
                    $stmt->bindParam(':gameprice', $_POST['gameprice'], PDO::PARAM_STR);
                    $stmt->bindParam(':gameimage', $fileHash, PDO::PARAM_STR);
                    $stmt->execute();

                    header("Location: ../index.php");
                    exit;
                }
                else {
                    $filesizeMB = $fileSize / 1024;
                 echo "Your file is too big! (" + $filesizeMB + " / 50mb)";
                }

        }
        else {
                echo "There was an error uploading this file! please try again!";
        }

        }
        else {
            echo "You can only upload jpg, jpeg, pdf or gif files!";
        }
}
            ?>