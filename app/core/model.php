<?php 

class Model{

	protected $table;
	protected $conn;

	public function __construct(){
		$this->conn = Conexao::getInstance();
	}

	public function insert($dados=[]){
		$campos = implode(',', array_keys($dados));
		$params = ':' . implode(',:', array_keys($dados));

		$sql = "INSERT INTO {$this->table} ({$campos})VALUES({$params})";
		$stm = $this->conn->prepare($sql);

		foreach($dados as $key => $valor):
			$stm->bindValue(':'.$key, $valor);
		endforeach;	

		return $stm->execute();
	}

	public function update($condicao=[], $dados=[]){

		$sql = "UPDATE {$this->table} SET ";
		foreach($dados as $key => $valor):
			$sql .= $key . '=:' . $key . ',';
		endforeach;	
		$sql = rtrim($sql, ',');

		$sql .= ' WHERE 1=1 ';
		foreach($condicao as $key => $valor):
			$sql .= 'AND ' . $key . '=:' . $key . ' ';
		endforeach;	

		$stm = $this->conn->prepare($sql);
		foreach($dados as $key => $valor):
			$stm->bindValue(':'.$key, $valor);
		endforeach;	

		foreach($condicao as $key => $valor):
			$stm->bindValue(':'.$key, $valor);
		endforeach;	

		return $stm->execute();
	}

	public function delete($condicao=[]){
		$sql = "DELETE FROM {$this->table} ";

		$sql .= ' WHERE 1=1 ';
		foreach($condicao as $key => $valor):
			$sql .= 'AND ' . $key . '=:' . $key . ' ';
		endforeach;

		$stm = $this->conn->prepare($sql);
		foreach($condicao as $key => $valor):
			$stm->bindValue(':'.$key, $valor);
		endforeach;	

		return $stm->execute();
	}

	public function selectCustom($sql, $params=[], $fetchAll=true){
		$stm = $this->conn->prepare($sql);

		foreach($params as $key => $valor):
			$stm->bindValue(':'.$key, $valor);
		endforeach;

		$stm->execute();

		if ($fetchAll)
			return $stm->fetchAll(PDO::FETCH_OBJ);
		else
		    return $stm->fetch(PDO::FETCH_OBJ);
	}
}