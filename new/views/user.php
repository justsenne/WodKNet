<?php
session_start();
Class Connection
{
    public function dbConnect()
    {
        return new PDO("mysql:host=localhost; dbname=gamertrade", "root", "");
    }
}

Class User
{

    private $db;

    public function __construct()
    {
        $this->db = new connection();
        $this->db = $this->db->dbConnect();
    }

    public function Login($email, $pass)
    {
        if (isset($_POST['submit'])) {
            if (!empty($email) && !empty($pass)) {
                $hashed = false;
                $statement = $this->db->prepare("select * from account_info where email = :email");
                $statement->execute(array(
                    ":email" => $_POST['email']
                ));
                $result = $statement->fetchAll();
                foreach ($result as $balslet) {
                    $_SESSION["userid"] = $balslet["user_id"];
                    var_dump($_SESSION["userid"]);
                    $_SESSION["user"] = $balslet["first_name"];
                    var_dump($_SESSION["user"]);
                }

                foreach ($result as $hash) {
                    $hashed = password_verify($pass, $hash["password"]);

                    $st = $this->db->prepare("select * from account_info where email=? and password=?");
                    $st->BindParam(1, $email);
                    $st->BindParam(2, password_verify($pass, $hashed));
                    $st->execute();
                }
                if ($hashed == true) {
                    $_SESSION["logged"] = "true";
                    var_dump($_SESSION["logged"]);
                    header("Location: ../index.php");
                    exit;
                } else {
                    echo "incorrecte mail of wachtwoord";
                }


            } else {
                echo "vul email en wachtwoord in";
            }
        }
    }
}

?>