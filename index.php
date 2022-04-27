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
    <link href="css/style.css" rel="stylesheet">

    <title>Projeto PHP</title>
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
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-box-arrow-right"></i>  Sair</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2><i class="bi bi-gear"></i>  Painel de Controle</h2>
                </div>
                <div class="col-md-3">
                    <p><i class="bi bi-stopwatch"></i>  Seu último login foi em: 10/10/10</p>
                </div>
            </div>
        </div>
    </header>

    <section class="bread">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="principal">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item active cor-padrao" aria-current="true" href="#">An active item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3>Teste</h3>
                        </div>
                        <div class="card-body"><p>Teste</p></div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h3>Cadastrar Equipe</h3>
                        </div>
                        <div class="card-body"><p>Teste</p></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!--JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>