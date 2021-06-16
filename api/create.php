<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../Conexao.php';
	include_once '../Empregados.php';

	$conexao = new Conexao();
	$db = $conexao->getConnection();
	$item = new Empregados($db);

	$item->codigo = $_GET['codigo'];
	$item->nome = $_GET['nome'];
	$item->descrição = $_GET['descrição'];
	$item->quantidade = $_GET['quantidade'];
	$item->valor_unitario = $_GET['valor_unitario'];
	$item->data_entrada = date('d-m-Y');
    $item->imagem = $_FILES['imagem']['tmp_name'];

	if($item->createEmpregados()){
		echo 'Empregado criado com sucesso.';
	} else{
		echo 'Erro ao criar empregado.';
	}
?>