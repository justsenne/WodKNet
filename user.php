<?php

include_once('connection.php');

Class User{

    private $db;

    public function __construct()
    {
        $this->db = new Connection();
        $this->db = $this->db->dbConnect();
    }

    public function Login($email, $pass){
        if(!empty($email) && !empty($pass)){
            $st = $this->db->prepare ("select * from users where email=? and password=?");
            $st->BindParam(1, $email);
            $st->bindParam(2, $pass);
            $st->execute();

            if($st->rowCount() == 1) {
                echo "is goeie";
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