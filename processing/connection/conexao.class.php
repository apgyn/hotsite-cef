<?php
/*
* Classe de conexão Mysql - usando padrão singleton
*/
error_reporting(0);
class Conexao{
	
	//Parametros de conexÃ£o ao banco de dados
	const DB_SERVER = "187.52.105.133";
	const DB_PORT = "53306";
	const DB_USER = "apgyn_web";
	const DB_PASS = "wS5SuH8hGQ6p4zDh";
	const DB_NAME = "cef";
	const DB_CHARSET = "utf8";
	
	//Atributo para conexão
	private $connection;
	private $status;
	
	//Este atributo guarda uma instância da classe
	private static $instance;
	
	//O construtor privado evita que o objeto seja criado diretamente
	private function __construct(){
		try {
			$this->connection = new mysqli (self::DB_SERVER, self::DB_USER, self::DB_PASS, self::DB_NAME, self::DB_PORT);
			$this->connection->set_charset('utf8');
			/*$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE); 
			$this->connection = new PDO("mysql:host=" . self::DB_SERVER . "; dbname=" . self::DB_NAME . "; charset=" . self::DB_CHARSET . ";", self::DB_USER, self::DB_PASS, $opcoes);*/
			if($this->connection->connect_error){
				throw new Exception ("CONEXAO AO BANCO DE DADOS RECUSADA: ". self::$instance->connect_error);
				$this->status = false;
			}
			else{
				$this->status = true;
			}
		}
		catch (Exception $err) {
			echo $err->getMessage();
			die();
		}
	}
	
	//Método Singleton
	public static function getInstance(){
		if (self::$instance){ 
			return self::$instance;
		}
		else {
			self::$instance = new Conexao();
			return self::$instance;
		}
	}
	
	//Método que destroi a classe
	public function __destruct(){
		$this->fecharConexao();
	}
	
	//Método que fecha a conexão com o banco de dados
	public function fecharConexao(){
		if($this->status){
			$this->connection->close();
			self::$instance = null;
			$this->status = false;
		}
	}
	
	//Método mágico que previne conexões duplicadas
	private function __clone() {}
	
	//Recupera status da conexão
	public function getStatus(){
		return $this->status;	
	}
	
	//Método que executa uma query e retorna o resultado
	public function selectQuery($query){
		if ($this->status){
			try{
				$sql = $this->connection->query($query);
				return $sql;
			}
			catch(Exception $err){
				echo $err->getMessage("ERRO AO CONSULTAR BANCO DE DADOS");
			}
			
		}
		else {
			echo "SISTEMA ENCONTRA-SE DESCONECTADO DA BASE DE DADOS";
		}
		
	}
	
}
?>