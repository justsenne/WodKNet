<?php
session_start();
Class Connection
{
    public function dbConnect()
    {
        return new PDO("mysql:host=localhost; dbname=wodknet", "root", "");
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
                $statement = $this->db->prepare("select * from users where email = :email");
                $statement->execute(array(
                    ":email" => $_POST['email']
                ));
                $result = $statement->fetchAll();
                foreach ($result as $var) {
                    $_SESSION["rank"] = $var["rank"];
                    var_dump($_SESSION["rank"]);
                    $_SESSION["user"] = $var["first_name"];
                    var_dump($_SESSION["user"]);
                }

                foreach ($result as $hash) {
                    $hashed = password_verify($pass, $hash["password"]);

                    $st = $this->db->prepare("select * from users where email=? and password=?");
                    $st->BindParam(1, $email);
                    $st->BindParam(2, $hashed);
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