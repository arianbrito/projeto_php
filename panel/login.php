<?php 
    if(isset($_COOKIE['remember'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? and password = ?");
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['position'] = $info['position'];
            $_SESSION['name'] = $info['name'];
            $_SESSION['imguser'] = $info['imguser'];
            header('Location: '.INCLUDE_PATH_PANEL);
                    die();
        }
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
    <link href="../css/style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projeto PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="bi bi-gear"></i>  Login</h2>
                </div>
            </div>
        </div>
    </header>
    <?php
       require '../class/MySql.php';
    ?>
    
    <section class="principal">
        <?php 
            if(isset($_POST['acao'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE email = ? AND password = ?");
                $sql->execute(array($email,$password));
                if($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    //Logamos
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['position'] = $info['position'];
                    $_SESSION['name'] = $info['name'];
                    $_SESSION['imguser'] = $info['imguser'];
                    $_SESSION['id'] = $info['id'];
                    if(isset($_POST['remember'])){
                        setcookie('remember',true,time()+(60*60*24),'/');
                        setcookie('email',$email,true,time()+(60*60*24),'/');
                        setcookie('password',$password,true,time()+(60*60*24),'/');
                    }
                    header('Location: '.INCLUDE_PATH_PANEL);
                    die();
                }else{
                    //falhou
                    echo '<div class="container col-5 mx-auto alert alert-danger" role="alert"> Usuário ou senha incorreto </div>';
                }
            }
        ?>
        <div class="container">
            <div class="row">        
                <div class="col-6 mx-auto shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="row justify-content-center">
                    
                    <h3>FAÇA SEU LOGIN <br></h3>
                    </div>
                <form method="post">
                    <div class="row mb-3">
                          <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="row mb-3">
                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Senha">
                    </div>

                    <div class="row mb-3 form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="remember" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Manter conectado</label>
                    </div>
                    
                        <input type="submit" name="acao" class="btn btn-secondary" value="Entar">
                </form>
            </div>
        </div>
    </section>



 
 <!--JS Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>