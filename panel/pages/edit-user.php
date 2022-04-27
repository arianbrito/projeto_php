<div class="box-content container">
    <div class="titulo-pag">
    <h2><i class="bi bi-pen"></i>   Editar Usuário</h2>
    </div>
    <form method="post" enctype="multipart/form-data">

        <?php
                
            require_once __DIR__.'/../../class/User.php';
            require_once __DIR__.'/../../class/MySql.php';
            
            if(isset($_POST['action'])){
                
                  $name = $_POST['name'];
                  $password = $_POST['password'];
                  $imguser = $_FILES['imguser'] ?? '';
                  $imguserNow = $_POST['imguserNow'];
                  $user = new User();
                  
                    if($imguser['name'] != ''){
                        if(Panel::validImage($imguser)){
                            Panel::deleteFile($imguserNow);
                            $imguser = Panel::uploadFile($imguser);
                            if($user->updateUser($name,$password,$imguser)){
                                $_SESSION['imguser'] = $imguser;
                                Panel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
                              }else{
                                Panel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
                              }
                        }else{
                            Panel::alert('erro','O formato da imagem não é válido ou a imagem é muito grande');
                        }
                  }else{
                      $imguser = $imguserNow;
                      if($user->updateUser($name,$password,$imguser)){
                        Panel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
                      }else{
                        Panel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
                      }
                  } 
            }
                
        ?>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" aria-label="Disabled input example" disabled id="floatingInputEmail" placeholder="name@example.com" name="email" required value="<?php echo $_SESSION['email']; ?>">
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputName" placeholder="José da Silva" name="name" required value="<?php echo $_SESSION['name']; ?>">
        <label for="floatingInput">Nome do Usuário</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="password" required value="<?php echo $_SESSION['password']; ?>">
        <label for="floatingPassword">Senha</label>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label" ></label>
        <input class="form-control" type="file" name="imguser" id="formFile">
        <input type="hidden" name="imguserNow" value="<?php echo $_SESSION['imguser']; ?>">
    </div>
    <div class="box-content">
    <button type="submit" name="action" class="btn btn-primary">Atualizar</button>
    </div>
    
</div>
