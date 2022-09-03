<?php

	class AdminService {
		private $conexao;

		public function __construct($conexao){
			$this->conexao = $conexao->conect();
		}

		public function getAdmin($login, $senha){
			$query = 'select * from tb_administrador where login = ? and senha = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $login);
			$stmt->bindValue(2, $senha);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
	}

?>