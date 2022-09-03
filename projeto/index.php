<?php 
  session_start();

?>

<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="View/css/estilo.css">

    <title>Sistema</title>
  </head>

  <body class="bkgHome">

    <header>
      <nav class="navbar">
        <div class="container">
          <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO'){ ?>
              <li class="nav-item">
                <a href="View/login.php" class="nav-link text-white">Admin</a>
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

    <section style="height:90%;">
      <div class="container text-white h-100">

        <div class="row h-100">
          <div class="col-md-6 d-flex h-100">
            <div class="align-self-center">
              <h1 class="display-4">Sistema</h1>

              <p class="par">Sua programação de TV em um só lugar.</p>

              <a href="View/home.php" class="btn btn-light mt-5">Iniciar</a>
            </div>
          </div>

          <div class="col-md-6 h-100">
            <img class="h-100 d-none d-md-block" src="View/img/rocket.jpg">
          </div>
        </div>
      </div>
    </section>
    
  </body>

</html>