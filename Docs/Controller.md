# CONTROLLER

Para criar um novo controller é necessário que o mesmo seja extendido da classe "Controller", o nome do script e da classe deve seguir o padrão **lowerCamelCase**: 
- Exemplo nome do script: **usuarioController.php**
- Exemplo nome da classe: **usuarioController**

## Exemplo
```
Use App\Core\Controller;

class usuarioController extends Controller{

	public function __construct(){
		parent::__construct();
	}

}

```


## Carregando uma View
Sempre que for necessário chamar uma View usamos o método **$this->loader->view()**, passando 2 parâmetros:
- 1 - Endereço do script dentro da pasta **View**, não é necessário usar a extensão **.php** no final.
- 2 - Array que pode conter outros arrays com dados, por exemplo registros do banco de dados.

## Exemplo
```
Use App\Core\Controller;

class usuarioController extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->loader->view(
			'Usuario/index', 
			[ 
				'titulo' => 'Título da View',
				'registros' => $arrayDados
			]
		);
	}

}

```


## Capturando valores via GET
É necessário chamar a propriedade **$this->get[]** passando o indice correspondente a ordem do parâmetro na URL:
**$this->get[0]**

> NOTA: Os parâmetros via URL devem ser separados usando **/**, não será aceito **&**, **?** ou **=**, exemplo: http://meusistema.com.br/usuario/editar/1/10. Nesse exemplo a chamada do método **$this->get[0]** irá retorno **1** e **$this->get[1]** irá retornar **10**.

## Exemplo 
```
Use App\Core\Controller;

class usuarioController extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function gravar2(){
		$id = $this->get[0];

		// processa dados
	}

}

```


## Capturando valores via POST
É necessário chamar a propriedade **$this->post[]** passando o nome do campo que foi enviado pela requisição:
**$this->post['campo']**

## Exemplo
```
Use App\Core\Controller;

class usuarioController extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function gravar1(){
		$id = $this->post['nome_campo'];

		// processa dados
	}

}

```


## Carregando Script Helper
Dentro do Controller é possível chamar um arquivo **Helper** usando o método **$this->loader->helper()**, onde o script helper tem que estar dentro da pasta **App\\Helpers\\**, o nome do script deve ser em letra minúscula e finalizado com *_helper*, exemplo **funcoes_helper.php**.

## Exemplo
```
Use App\Core\Controller;

class usuarioController extends Controller{

	public function __construct(){
		parent::__construct();
		$this->loader->helper('funcoes');
	}

}

```


## Carregando Libs de Terceiros
É possível carregar Libs de terceiros usando o método **$this->loader->library()** desde que os scripts da Lib estejam dentro da pasta **App\\Libs\\**, se a biblioteca for apenas um script basta renomea-la seguindo o padrão **lowerCamelCase**.

## Exemplo 1
```
Use App\Core\Controller;

class usuarioController extends Controller{

	private $biblioteca;

	public function __construct(){
		parent::__construct();
		$this->loader->library('nomeBiblioteca');
		$this->biblioteca = new nomeBiblioteca();
	}

}

```

No segundo exemplo temos a chamada da biblioteca do PHPMailer que possui vários scripts, nesse todos scripts do PHPMailer devem ser colocados dentro de uma sub-pasta **App\\Libs\\PHPMailer\\** e na pasta **App\\Libs\\** será necessário criar um script para fazer o **require** do PHPMailer.

## Exemplo 2
```
class phpMailerLoad {

    function __construct() {
        require_once('PHPMailer/PHPMailerAutoload.php');
    }

}

```


```
Use App\Core\Controller;

class usuarioController extends Controller{

	private $PHPMailer;

	public function __construct(){
		parent::__construct();
		$this->loader->library('phpMailerLoad');
		$this->PHPMailer = new PHPMailer();
	}

}

```