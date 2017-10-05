# Configuração Inicial

Antes de iniciar é necessário ajustar algumas constantes para conexão com banco de dados e URL base do sistema no script App\\Core\\Config.php.

## Definição das Constantes

| Campo | Descrição | Uso |
| :---- | :---- | :---- |
| BASE_URL | URL base do sistema (localmente ou no servidor WEB) | Idêntifica a base onde o framework começa a procurar dos scripts |
| CONTROLLER_DEFAULT | Controller padrão | Se nada for informado após a URL base esse controller será executado |
| METHOD_DEFAULT | Método (ou Action) Padrão | Se nada for informado após a URL base o controller será executado e o método padrão também |
| SGBD | Sistema Gerenciador de Banco de Dados | O framework utiliza a engine PDO aceitando os sgbds mysql, postgre e sqlserver |
| HOST | Hostname ou IP do servidor SGBD | Endereço do servidor onde está rodando o Banco de Dados |
| schemes | Nome da pasta onde estão os schemas | Fundamental para as validações das mensagens com a versão correta do layout |
| DBNAME | Nome do Banco de Dados | Nome do Banco de Dados que será usado pelo Framework |
| CHARSET | Charset da Conexão | No caso do MySQL é possível setar um charset já no momento da Conexão |
| USER | Usuário do Banco de Dados | Usuário que tem acesso ao banco de dados |
| PASSWORD | Senha do Banco de Dados | Senha do usuário que tem acesso ao banco de dados |
| SERVER | S.O. no Servidor de Banco de Dados  | Sistema Operacional no servidor que roda o banco de dados, extensão para SQL Server muda entre Linux e Windows |

> NOTA: É necessário verificar se o PHP instalado possui a respectiva versão da extensão PDO para o banco de dados escolhido, caso não tenha é necessário em alguns casos instalar e posteriormente habilitar a extensão. [Documentação PDO](http://php.net/manual/pt_BR/book.pdo.php)

