<?php
  session_start();
  require "../Model/conexao.php";
  require "../Model/prog_service.php";

  if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'SIM'){
    $conexao = new Conexao();
    $progService = new ProgService($conexao);

    $listaProg = $progService->getProg();
  }else{
    header('Location: home.php');
  }

    

?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <title>Sistema</title>

  </head>

  <body>

    <header>
      <nav class="navbar bg-dark">
        <div class="container">
          <ul class="navbar-nav ml-auto">

            <?php if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO'){ ?>
              <li class="nav-item">
                <a href="login.php" class="nav-link text-white">Admin</a>
              </li>
            <?php }else if($_SESSION['autenticado'] == 'SIM'){ ?>
              <li class="nav-item">
                <span class="nav-link text-white">Bem vindo <?php echo $_SESSION['login'] ?></span>
              </li>
            <?php } ?>

          </ul>
        </div>
      </nav>
    </header>

    <section>
      <div class="container mt-5">
        

        <div class="row">
          <div class="col-md-12">
            <h4 class="text-white">Programação Semanal</h4>
            <a href="registro_programacao.php?acao=salvar" class="btn btn-success mt-3">Novo +</a>
            <table class="table table-dark table-hover table-striped">
              <thead>
                <tr>
                  <th>Próximo programa</th>
                  <th>Hora</th>
                  <th>Dia</th>
                  <th>Ação</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($listaProg as $prog){?>
                  <tr>
                    <td><?php echo $prog->NOME_PROG ?></td>
                    <td><?php echo $prog->HR_INICIO ?> às <?php echo $prog->HR_FIM ?></td>
                    <td><?php echo $prog->DIA_PROG ?></td>
                    <td>
                      <i class="fas fa-trash-alt fa-lg text-danger"></i>
                      <a href="registro_programacao.php?acao=editar&id=<?php echo $prog->COD_PROG ?>"><i class="fas fa-edit fa-lg text-info"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </section>
  </body>
</html>