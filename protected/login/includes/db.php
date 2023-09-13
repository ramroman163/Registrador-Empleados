<?php
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'id20239808_bd_ingreso_personas';
        $this->user     = 'id20239808_ingreso_personas';
        $this->password = 'Uf-(4!@XE9XmVvIB';
        $this->charset  = 'utf8mb4';
    }

    function connect(){
        try{
            
            $connection = 'mysql:host='.$this->host.';dbname='.$this->db.';charset='.$this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}

?>