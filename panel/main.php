<?php 
   if(isset($_GET['logout'])){
       Panel::logout();
   }
               
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Import de CSS -->
    <link href="<?php echo INCLUDE_PATH ?>css/style.css" rel="stylesheet">
    <title>Painel de Controle</title>
</head>
<body>
    <!-- Primeira Coluna -->    
    <!-- Info usuário -->
    <div class="menu-lateral col-sm-auto">
        <div class="menu-lateral-wraper"
            <div class="row"> 
                <div class="box-usuario">
                    <?php
                        if($_SESSION['imguser'] == ''){ 
                    ?>
                    <div class="avatar-usuario container">
                        <i class="bi bi-person-fill mx-auto"></i>
                    </div>
                    <?php }else{ ?>
                    <div class="imagem-usuario container">
                        <img src="<?php echo INCLUDE_PATH ?>upload/<?php echo $_SESSION['imguser']; ?>" />
                    </div>
                    <?php } ?>
                    <div class="nome-usuario">
                        <p><?php echo $_SESSION['name']; ?></p>
                        <p><?php echo pegaPosition($_SESSION['position']); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Itens do Menu -->
            <div class="row itens-menu" id="menu-lateral">
                <h2>CADASTRO</h2>
                <a <?php selectMenu('register-item'); ?> href="<?php echo INCLUDE_PATH_PANEL ?>register-item">Item</a>
                <a <?php selectMenu('register-services'); ?> href="<?php echo INCLUDE_PATH_PANEL ?>register-services">Cadastro de Serviços</a>
                <a <?php selectMenu('list-services'); ?> href="<?php echo INCLUDE_PATH_PANEL ?>list-services">Listar Serviços</a>
                <h2>ADMINISTRAÇÃO</h2>
                <a <?php selectMenu('edit-user'); ?> href="<?php echo INCLUDE_PATH_PANEL ?>edit-user">Editar Usuário</a>
                <a <?php selectMenu('add-user'); ?> <?php menuPermissionVerification(2); ?> href="<?php echo INCLUDE_PATH_PANEL ?>add-user">Adicionar Usuários</a>
            </div>
        </div>        
    </div>
    <!-- Segunda coluna  e Content -->
    <!-- Barra Menu Topo -->
    <div class="col-lg-12">
        <div class="row"> 
            <div class="barra-topo">
                <div class="barra-topo-menu-btn">
                    <i class="bi bi-list"></i></div>

                    <a href="<?php echo INCLUDE_PATH_PANEL ?>?logout"><i class="bi bi-box-arrow-right"></i></a>  
                    
                    <a href="<?php echo INCLUDE_PATH_PANEL ?>"><i class="bi bi-house"></i></a>

                    
            </div>
                
            <div class="clear"></div>
        </div>    
            <!-- Conteúdo -->
        <div class="row">    
            <div class="content">
                
                <?php Panel::loadPage(); ?>

            </div>
        </div>
    </div>       
     
 <!--JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.min.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/main.js"></script>
</body>
</html>