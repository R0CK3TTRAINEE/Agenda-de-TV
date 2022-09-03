<?php 
	
	require "../Model/conexao.php";
	require "../Model/admin_service.php";

	session_start();

	//variavel que verifica se a autenticação foi realizada
	$admin_atenticado = false;
	$admin_id = null;

	$conexao = new Conexao();
	$adminService = new AdminService($conexao);

	$admin = $adminService->getAdmin($_POST['login'], $_POST['senha']);

	if($admin){

		$admin_atenticado = true;
		$admin_login = $admin->LOGIN;

		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['login'] = $admin_login;
		header('Location: ../View/programacao.php');

	}else{

		$_SESSION['autenticado'] = 'NAO';
		header('Location: ../View/login.php?login=erro');
	}

?>