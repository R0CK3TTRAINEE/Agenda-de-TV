<?php

  session_start();

  require "../Model/conexao.php";
  require "../Model/prog_service.php";

  //print_r($_SESSION);

  date_default_timezone_set ("America/Sao_Paulo");

  $diaDaSemana = strftime("%A", strtotime(date("Y-m-d")));
  $hora = date("H") + 1;
  $hora .= ':00';

  if($_POST){
    $diaDaSemana = strftime("%A", strtotime($_POST['data'])) ;
    $hora = $_POST['hora'] + 1;
    $hora .= ':00';
  }

  switch ($diaDaSemana) {
    case 'Monday':
      $diaDaSemana = 'SEGUNDA';
      break;

    case 'Tuesday':
      $diaDaSemana = 'TERCA';
      break;

    case 'Wednesday':
      $diaDaSemana = 'QUARTA';
      break;

    case 'Thursday':
      $diaDaSemana = 'QUINTA';
      break;

    case 'Friday':
      $diaDaSemana = 'SEXTA';
      break;

    case 'Saturday':
      $diaDaSemana = 'SABADO';
      break;

    case 'Sunday':
      $diaDaSemana = 'DOMINGO';
      break;
  }

  $conexao = new Conexao();
  $progService = new ProgService($conexao);

  $proximaProg = $progService->pesquisarProg($diaDaSemana,$hora);

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
          <div class="col-md-6">
            <h4 class="text-light">Programação Seguinte</h4>
          </div>

          
          <div class="col-md-6">
            <form class="mb-3" action="home.php" method="post">
              <input type="date" name="data" required>

              <input type="number" name="hora" placeholder="hora" required>

              <input type="submit" value="Pesquisar">
            </form>
          </div>

        </div>
          
        

        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark table-hover table-striped">
              <thead>
                <tr>
                  <th>Próximo programa</th>
                  <th>Hora</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $proximaProg->nome ?></td>
                  <td><?php echo $proximaProg->inicio ?> às <?php echo $proximaProg->fim ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section>
  </body>
</html>