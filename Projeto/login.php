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
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <title>Sistema</title>
  </head>

  <body>
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card shadow-md rounded-md mt-5">
            <div class="card-body">
              <h3 class="text-center">Faça seu login</h3>
            </div>
            <div class="card-body">

              <form action="valida_login.php" method="post">

                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>
                  <div class="form-group">
                    <div class="alert alert-danger">
                      Usuário ou senha inválido(s)!
                    </div>
                  </div>
                <?php } ?>

                <div class="form-group">
                  <Label>Login</Label>
                  <input type="text" class="form-control py-4" name="login" placeholder="Digite seu login" required>
                </div>

                <div class="form-group">
                  <Label>Senha</Label>
                  <input type="password" class="form-control py-4" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="form-group d-flex justify-content-center mt-4 mb-0">
                  <button type="submit" class="btn btn-primary">Entrar</button>
                  <a href="home.php" type="button" class="btn btn-secondary ml-1">Cancelar</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </body>

</html>