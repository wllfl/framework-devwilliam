<?php 

Namespace App\Core; 

class Model{

	protected $table;
	protected $conn;

	public function __construct(){
		try{
			$this->conn = Conexao::getInstance();
		} catch (Exception $e) {
            Erro::redirectErro($e->getMessage());
        }
	}

	public function insert($dados=[]){
		try{
			$campos = implode(',', array_keys($dados));
			$params = ':' . implode(',:', array_keys($dados));
			$campos = trim($campos);
			$params = trim($params);

			$sql = "INSERT INTO {$this->table} ({$campos})VALUES({$params})";
			$stm = $this->conn->prepare($sql);
			foreach($dados as $key => $valor):
				$stm->bindValue(':' . trim($key), trim($valor));
			endforeach;

			return $stm->execute();
		}catch(Exception $e){
			Erro::redirectErro($e->getMessage());
		}
	}

	public function update($condicao=[], $dados=[]){

		try{
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
		}catch(Exception $e){
			Erro::redirectErro($e->getMessage());
		}
	}

	public function delete($condicao=[]){
		try{
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
		}catch(Exception $e){
			Erro::redirectErro($e->getMessage());
		}
	}

	public function selectCustom($sql, $params=[], $fetchAll=true){
		try{
			$stm = $this->conn->prepare($sql);

			foreach($params as $key => $valor):
				$stm->bindValue(':'.$key, $valor);
			endforeach;

			$stm->execute();

			if ($fetchAll)
				return $stm->fetchAll(PDO::FETCH_OBJ);
			else
			    return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			Erro::redirectErro($e->getMessage());
		}
	}
}