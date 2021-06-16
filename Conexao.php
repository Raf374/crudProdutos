<?php
class Conexao {
	
	public $db;
	public $DB_NAME ="crudprodutos";
	public $DB_USER ="root";
	public $DB_PASS ="123";
	public $DB_LOCAL ="localhost";
	
	public function getConnection(){
	
		$this->db = null;
	
		try{
	
			$this->db = new mysqli($DB_LOCAL,$DB_USER,$DB_PASS,$DB_NAME);
	
		}catch(Exception $e){
	
			echo "Erro ao conectar o banco de dados: " . $e->getMessage();
	
		}
	
		return $this->db;
	}
}
?>