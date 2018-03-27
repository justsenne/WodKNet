<?php
Class Connection{
    public function dbConnect(){
    return new PDO("mysql:host=localhost; dbname=gamertrade", "root", "");
}
}
Class User{

    private $db;
    public function __construct()
    {
        $this->db = new connection();
        $this->db = $this->db->dbConnect();
    }

    public function Login($email, $pass){
        if(!empty($email) && !empty($pass)){
            $st = $this->db->prepare ("select * from account_info where email=? and password=?");
            $st->BindParam(1, $email);
            $st->bindParam(2, $pass);
            $st->execute();

            if($st->rowCount() == 1) {
                header("Location: ../loginpage.php");
                exit;
            }
            else{
                echo "incorrecte mail of wachtwoord";
            }


        }
        else {
            echo "vul email en wachtwoord in";
        }
    }

}

?>