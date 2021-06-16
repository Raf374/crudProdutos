<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../Conexao.php';
	include_once '../Produtos.php';

	$conexao = new Conexao();
	$db = $conexao->getConnection();
	$item = new Produtos($db);

	$item->codigo = $_GET['codigo'];
	$item->nome = $_GET['nome'];
	$item->descrição = $_GET['descrição'];
	$item->quantidade = $_GET['quantidade'];
	$item->valor_unitario = $_GET['valor_unitario'];
	$item->data_entrada = date('d-m-Y');
    $item->imagem = $_FILES['imagem']['tmp_name'];
    
    echo 'Produto criado com sucesso.';
	if($item->createProdutos()){
	} else{
		echo 'Erro ao criar produto.';
	}
?>