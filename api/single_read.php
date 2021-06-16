<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once '../Conexao.php';
	include_once '../Produtos.php';

	$conexao = new Conexao();
	
	$db = $conexao->getConnection();

	$item = new Produtos($db);

	$item->id = isset($_GET['codigo']) ? $_GET['codigo'] : die();

	$item->getSingleProdutos();

	if($item->name != null){
		$emp_arr = array(
			"codigo" => $item->codigo,
			"nome" => $item->nome,
			"descrição" => $item->descrição,
			"quantidade" => $item->quantidade,
			"valor_unitario"=> $item->valor_unitario,
			"data_entrada" => $item->data_entrada,
			"imagem" => $item->imagem
        );
            
	http_response_code(200);

	echo json_encode($emp_arr);
	
	}
	else{
		http_response_code(404);
		echo json_encode("Erro ao buscar produtos.");
}
?>