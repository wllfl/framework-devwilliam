# MODEL

Para criar um novo model é necessário que o mesmo seja extendido da classe **Model**, o nome do script e da classe deve seguir o padrão **lowerCamelCase**: 
- Exemplo nome do script: **usuarioModel.php**
- Exemplo nome da classe: **usuarioModel**

A ideia é que seja escrito um Model para cada tabela, nesse caso no método **construct()** é necessário informar o nome da tabela para o propriedade **$this->table**.

## Exemplo
```
Use App\Core\Model;

class usuarioModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'NOME_TABELA';
	}

}

```


## Método INSERT
Para inserir um registro é usado o método **$this->insert()** passando como parâmetro um Array() associativo, onde a chave é o nome do respectivo campo na tabela.

## Exemplo
```
Use App\Core\Model;

class usuarioModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'NOME_TABELA';

		$dados = [
			'nome'  => 'João',
			'email' => 'teste@teste.com'
		];

		$this->insert($dados);
	}

}

```

## Método UPDATE
Para atualizar um registro é usado o método **$this->update()** passando como primeiro parâmetro um Array() associativo contendo o nome do campo chave e valor, o segundo parâmetro é um Array() com dados que serão atualizado onde a chave é o nome do respectivo campo na tabela.

## Exemplo
```
Use App\Core\Model;

class usuarioModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'NOME_TABELA';

		$dados = [
			'nome'  => 'João',
			'email' => 'teste@teste.com'
		];

		$this->update(['id' => 1], $dados);
	}

}

```

## Método DELETE
Para excluir um registro é usado o método **$this->delete()** passar como parâmetro um Array() associativo contendo o nome do campo chave e valor.

## Exemplo
```
Use App\Core\Model;

class usuarioModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'NOME_TABELA';

		$this->delete(['id' => 1]);
	}

}

```

> NOTA: Todos os parâmetros passados para os métodos do **Model** são enviados para engine PDO em forma de **PDOStatement::bindValue**, ou seja, são protegidos contra ataques de SQL **Injection**.

