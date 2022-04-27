<?php
    require '../class/MySql.php';
    class User{
        
        public function updateUser($name,$password,$imguser){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET `name` = ?, `password` = ?, `imguser` = ? WHERE `email` = ?");
            if($sql->execute(array($name,$password,$imguser,$_SESSION['email']))){
                return true;
            }else{
                return false;
            }
        }

        public static function userExists($user){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE email=?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1)
                return true;
            else
                return false;   
        }

        public static function addUser($email,$name,$password,$imguser,$position){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($email,$name,$password,$imguser,$position));
        }
    }

?>