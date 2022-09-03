<?php 

	class ProgService {
		private $conexao;

		function __construct($conexao){
			$this->conexao = $conexao->conect();
		}

		public function salvar($nome, $dia, $inicio, $fim){
			$query = '
					insert into tb_programa(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
					values (?,?,?,?)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $nome);
			$stmt->bindValue(2, $dia);
			$stmt->bindValue(3, $inicio);
			$stmt->bindValue(4, $fim);
			$stmt->execute();
		}

		public function editar($id, $nome, $inicio, $fim){
			$query = '
					update tb_programa
					set NOME_PROG = ?, HR_INICIO = ?,HR_FIM = ?
					where COD_PROG = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $nome);
			$stmt->bindValue(2, $inicio);
			$stmt->bindValue(3, $fim);
			$stmt->bindValue(4, $id);
			$stmt->execute();
		}

		public function pesquisarProg($semana, $hora){
			$query = '
					select NOME_PROG as nome, HR_INICIO as inicio, HR_FIM as fim
					from tb_programa 
					where DIA_PROG = ? and HR_INICIO = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $semana);
			$stmt->bindValue(2, $hora);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getProg(){
			$query = 'select * from tb_programa';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getProgById($id){
			$query = '
					select COD_PROG as id, NOME_PROG as nome, HR_INICIO as inicio, HR_FIM as fim
					from tb_programa 
					where COD_PROG = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $id);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
	}

?>