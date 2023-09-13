<?php
    include_once 'db.php';

    class User extends DB
    {
        private $user;

        public function userExists($user, $pass){
            $query = $this->connect()->prepare('SELECT * FROM Tb_Usuarios WHERE username = :user');
            $query->execute(['user' => $user]);

            foreach($query as $userBD) {
                if(password_verify($pass, $userBD['password'])){
                    return true;
                }
            }
            
            return false;
        }

        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM Tb_Usuarios WHERE username = :user');
            $query->execute(['user' => $user]);

            foreach ($query as $currentUser) {
                $this->user = $currentUser['username'];
            }
        }
    }
    
?>