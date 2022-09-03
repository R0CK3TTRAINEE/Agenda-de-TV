<?php 

	class Conexao {
		private $host = 'localhost';
		private $dbname = 'rocket';
		private $user = 'root';
		private $password = '';

		public function conect(){

			try{

				$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->password");

				return $conexao;
				
			}catch(PDOException $e){

				echo '<p>' . $e->getMessage() . '</p>';
			}
		}
	}

?>