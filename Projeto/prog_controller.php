<?php

	require "conexao.php";
  	require "prog_service.php";

	$acao = $_POST['acao'];
	
	$nome = $_POST['nomeProg'];
	$inicio = $_POST['inicioProg'];
	$fim = $_POST['fimProg'];

	$conexao = new Conexao();
  	$progService = new ProgService($conexao);

	if($acao == 'salvar'){
		$dia = $_POST['diaProg'];
		$progService->salvar($nome, $dia, $inicio, $fim);
	}

	if($acao == 'editar'){
		$id = $_POST['idProg'];
		$progService->editar($id, $nome, $inicio, $fim);
	}

	header('Location: programacao.php');

?>