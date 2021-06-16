<?php
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	include_once '../Conexao.php';
	include_once '../Produtos.php';

	$conexao = new Conexao();
	$db = $conexao->getConnection();
	$items = new Produtos($db);

	$records = $items->getProdutos();
	$itemCount = $records->num_rows;

	echo json_encode($itemCount);

	if($itemCount > 0){
		
		$produtoArr = array();
        $produtoArr["body"] = array();
		$produtoArr["itemCount"] = $itemCount;

		while ($row = $records->fetch_assoc()){

			array_push($produtoArr["body"], $row);
		}
		echo json_encode($produtoArr);
	}
	else{
		
		http_response_code(404);
		
		echo json_encode(
			array("message" => "Nenhum registro encontrado."));
	}
?