<?php
class Produtos{
	
	private $db;

	private $db_table = "tbProdutos";

	public $codigo;
	public $nome;
	public $descrição;
	public $quantidade;
	public $valor_unitario;
	public $data_entrada;
	public $imagem;
    
	public $result;
	
	public function __construct($db){
		$this->db = $db;
	}

	public function getProdutos(){
		
		$sqlQuery = "SELECT codigo, nome, descrição, quantidade, valor_unitario, data_entrada, imagem FROM " . $this->db_table . "";
		
		$this->result = $this->db->query($sqlQuery);
		
		return $this->result;
	}
	
	public function createProdutos(){
		

		$this->codigo=htmlspecialchars(strip_tags($this->codigo));
		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->descrição=htmlspecialchars(strip_tags($this->descrição));
		$this->quantidade=htmlspecialchars(strip_tags($this->quantidade));
		$this->valor_unitario=htmlspecialchars(strip_tags($this->valor_unitario));
		$this->data_entrada=htmlspecialchars(strip_tags($this->data_entrada));
		$this->imagem=htmlspecialchars(strip_tags($this->imagem));

		$sqlQuery = "INSERT INTO". $this->db_table ." SET codigo = '".$this->codigo."', nome = '".$this->nome."', descrição = '".$this->descrição."', quantidade = '".$this->quantidade."', valor_unitario = '".$this->valor_unitario."', data_entrada = '".$this->data_entrada."', imagem = '".$this->imagem."'";
	
		$this->db->query($sqlQuery);
	
		if($this->db->affected_rows > 0){
			return true;
		}
		return false;
	}

	public function getIDProdutos(){
		
		$sqlQuery = "SELECT codigo, nome, descrição, quantidade, valor_unitario, data_entrada, imagem FROM ". $this->db_table ." WHERE codigo = ".$this->codigo;
		
		$record = $this->db->query($sqlQuery);

		$dataRow=$record->fetch_assoc();
		
		$this->nome = $dataRow['nome'];
		$this->descrição = $dataRow['descrição'];
		$this->quantidade = $dataRow['quantidade'];
		$this->valor_unitario = $dataRow['valor_unitario'];
		$this->data_entrada = $dataRow['data_entrada'];
		$this->imagem = $dataRow['imagem'];
	}

	public function updateProdutos(){

		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->descrição=htmlspecialchars(strip_tags($this->descrição));
		$this->quantidade=htmlspecialchars(strip_tags($this->quantidade));
		$this->valor_unitario=htmlspecialchars(strip_tags($this->valor_unitario));
		$this->data_entrada=htmlspecialchars(strip_tags($this->data_entrada));
		$this->imagem=htmlspecialchars(strip_tags($this->imagem));

		$sqlQuery = "UPDATE ". $this->db_table ." SET nome = '".$this->nome."',descrição = '".$this->descrição."', quantidade = '".$this->quantidade."', valor_unitario = '".$this->valor_unitario."', data_entrada = '".$this->data_entrada."', imagem = '".$this->imagem."' WHERE codigo = ".$this->codigo;

		$this->db->query($sqlQuery);

		if($this->db->affected_rows > 0){
				return true;
		}
		return false;
	}
	function deleteProdutos(){

	$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE codigo = ".$this->codigo;
	
	$this->db->query($sqlQuery);
	
	if($this->db->affected_rows > 0){
			return true;
		}

		return false;
	}
}

?>