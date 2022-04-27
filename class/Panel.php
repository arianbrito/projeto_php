<?php

    Class Panel{

        public static $cargos = [
            '0' => 'Normal',
            '1' => 'Subadministrador',
            '2' => 'Administrador'
        ];
    

        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }
        
        public static function logout(){
            setcookie('remember',true,time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PANEL);
        }

        public static function loadPage(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    header('Location: '.INCLUDE_PATH_PANEL);
                }
            }else{
                include('pages/home.php');
            }

        }

        public static function alert($typeAlert, $message){
            if($typeAlert == 'sucesso'){
                echo '<div class="alert alert-success sucesso" role="alert"><i class="bi bi-person-check"></i>   '.$message.'</div>';
            }else if($typeAlert == 'erro' ){
                echo '<div class="erro alert alert-danger" role="alert"><i class="bi bi-person-x"></i>   '.$message.'</div>';
            }
        }

        public static function validImage($imguser){
            $imguser = $_FILES['imguser'];

            if($imguser ['type'] == 'image/jpeg' ||
                ['type'] == 'image/jpg' ||
                ['type'] == 'image/png'){
                
                $size = intval($imguser['size']/1024);
                if($size < 300)
                    return true;
                else
                    return false;
                }else{
                    return false;
                }
            
        }
        
        public static function uploadFile($file){
            $fileFormat = explode('.',$file['name']);
            $imgName = uniqid().'.'.$fileFormat[count($fileFormat) -1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PANEL.'/upload/'.$imgName))
                return $imgName;
            else
                return false;
        }

        public static function deleteFile($file){
            @unlink('../upload/'.$file);
        }
    }

?>