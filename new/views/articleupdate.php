<?php
include_once('connection.php');
session_start();

if (isset($_POST['submit'])) {

    if ($_SESSION['rank'] == 1) {

        $sql = "UPDATE game_desc WHERE game_id=?, userid=? SET game_name=?, game_description=?, game_price=?";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_GET['product'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_SESSION['userid'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['gamename'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['gamedesc'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['gameprice'], PDO::PARAM_STR);
        $stmt->execute();

        header("Location: ../index.php");
        exit;
    }
}
?>

<?php
$sql = $conn->prepare("SELECT * FROM game_desc WHERE game_id=?");
$sql->BindParam(1, $_GET['product']);
$sql->execute();
$result = $sql->fetchAll();

foreach ($result as $row) {
    $userid = $row['userid'];
    $name = $row['game_name'];
    $desc = $row['game_description'];
    $price = $row['game_price'];

    echo "<form id='form' action='productupdate.php?product=" . $_GET['product'] . "' method='POST' enctype='multipart/form-data'>
           Game name: <input type='text' maxlength='15' name='gamename' value='"
        . $name
        . "' required><br> Game description (staat etc): <input type='text' maxlength='300' name='gamedesc' value='"
           . $desc
           ."' required><br> Price: <input type='number' maxlength='6' name='gameprice' value='"
           . $price
           ."' required><br> <input type='submit' name='submit'> </form>";
} ?>
<button onclick="goBack()">Go Back</button>

<a href="../index.php"> index </a>
<script src="js\jquery.js"></script>
<script src="js\jquery.validate.js"></script>
<script>
    $("#form").validate();
    function goBack() {
        window.history.back();
    }
</script>