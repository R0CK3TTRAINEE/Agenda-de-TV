<?php
	session_start();
	require "conexao.php";
	require "prog_service.php";

	if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'SIM'){

		$conexao = new Conexao();
		$progService = new ProgService($conexao);

		if(isset($_GET['id'])){
			$prog = $progService->getProgById($_GET['id']);
		}

		$acao = $_GET['acao'];
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
	<link rel="stylesheet" type="text/css" href="estilo.css">

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
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-white align-self-right">
						<h3 class="mt-5">Alterar Dados</h3>
						<form class="mt-3" action="prog_controller.php" method="post">
							<?php if(isset($prog) && $prog){ ?>
								<input class="form-control w-50" type="hidden" name="idProg" value="<?php echo $prog->id ?>">
								<input type="hidden" name="acao" value="<?php echo $acao ?>">

								<div class="form-group">
									<label>Nome da Programação</label>
									<input class="form-control w-50" type="text" name="nomeProg" value="<?php echo $prog->nome ?>">
								</div>

								<div class="form-group">
									<label>Inicio</label>
									<input class="form-control w-50" type="text" name="inicioProg" value="<?php echo $prog->inicio ?>">
								</div>

								<div class="form-group">
									<label>Fim</label>
									<input class="form-control w-50" type="text" name="fimProg" value="<?php echo $prog->fim ?>">
								</div>
							<?php }else{ ?>
								<input type="hidden" name="acao" value="<?php echo $acao?>">
								<div class="form-group">
									<label>Nome da Programação</label>
									<input class="form-control w-50" type="text" name="nomeProg">
								</div>

								<div class="form-group">
									<select class="form-control w-50" name="diaProg">
										<option value="SEGUNDA">Segunda</option>
										<option value="TERCA">Terça</option>
										<option value="QUARTA">Quarta</option>
										<option value="QUINTA">Quinta</option>
										<option value="SEXTA">Sexta</option>
										<option value="SABADO">Sábado</option>
										<option value="DOMINGO">Domingo</option>
									</select>
								</div>

								<div class="form-group">
									<label>Inicio</label>
									<input class="form-control w-50" type="text" name="inicioProg">
								</div>

								<div class="form-group">
									<label>Fim</label>
									<input class="form-control w-50" type="text" name="fimProg">
								</div>
							<?php } ?>

							<input type="submit" value="Salvar" class="btn btn-success">
							<a href="programacao.php" class="btn btn-secondary">Voltar</a>
						</form>
					</div>
				</div>
			</div>
						
		</section>
	</body>

</html>