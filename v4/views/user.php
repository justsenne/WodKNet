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

                foreach ($result as $hash) {
                    $hashed = password_verify($pass, $hash["password"]);

                    $st = $this->db->prepare("select * from users where email=? and password=?");
                    $st->BindParam(1, $email);
                    $st->BindParam(2, $hashed);
                    $st->execute();
                if ($hashed == true) {
                    $_SESSION["logged"] = "true";
                    $_SESSION["rank"] = $hash["rank"];
                    $_SESSION["user"] = $hash["first_name"];
                    $_SESSION["userid"] = $hash["user_id"];
                    header("Location: ../index.php");
                    exit;
                } else {
                    echo "incorrecte mail of wachtwoord";
                }
                }

            } else {
                echo "vul email en wachtwoord in";
            }
        }
    }
}

?>