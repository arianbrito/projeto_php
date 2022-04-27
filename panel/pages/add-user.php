<?php 
    pagePermissionVerification(2);

?>

<div class="box-content container">
    <div class="titulo-pag">
    <h2><i class="bi bi-person-plus"></i>   Adicionar Usuário</h2>
    </div>
    <form method="post" enctype="multipart/form-data">

        <?php

            require_once __DIR__.'/../../class/User.php';
            require_once __DIR__.'/../../class/MySql.php';
            
            if(isset($_POST['action'])){
                $email = $_POST['email'];
                $name = $_POST['name'];
                $password = $_POST['password'];
                $imguser = $_FILES['imguser'] ?? '';
                $position = $_POST['position'];

                if($email == ''){
                    Panel::alert('erro','E-mail está vazio');
                }else if($name== ''){
                    Panel::alert('erro','Nome está vazio');
                }else if($password== ''){
                    Panel::alert('erro','Senha está vazia');
                }else if($position== ''){
                    Panel::alert('erro','O cargo preciser ser selecionado');
                }else if($imguser['name']== ''){
                    Panel::alert('erro','A Imagem preciser ser carregada');
                }else{
                    if($position >= $_SESSION['position']){
                    Panel::alert('erro','Selecione um cargo menor que o seu!');
                }else if(Panel::validImage($imguser) == false){
                    Panel::alert('erro','A imagem precisa ser em .png ou .jpeg ou .jpg com tamanho máximo de 300kb');
                }else if(User::userExists($email))
                {
                    Panel::alert('erro','Usuário já cadastrado com o e-mail informado.');
                }else{
                    $user = new User();
                    $imguser = Panel::uploadFile($imguser);
                    $user->addUser($email,$name,$password,$imguser,$position);
                    Panel::alert('sucesso','Cadastro do usuário '.$name.' realizado com sucesso!');
                }
            }
        }               
        ?>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="email" required >
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputName" placeholder="José da Silva" name="name" required >
        <label for="floatingInput">Nome do Usuário</label>
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="password" required >
        <label for="floatingPassword">Senha</label>
    </div>
    <div class="form-floating mb-2">
    <select class="form-select form-control" name="position" aria-label="Default select example">
        <option selected>Cargo:</option>
        <?php 
            foreach (Panel::$cargos as $key => $value){
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
        ?>
        
    </select>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label" ></label>
        <input class="form-control" type="file" name="imguser" id="formFile">
    
    </div>
    <div class="box-content">
    <button type="submit" name="action" class="btn btn-primary">Adicionar</button>
    </div>
    
</div>