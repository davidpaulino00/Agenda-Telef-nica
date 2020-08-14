<?php
	class dadoDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		function inserir($dados)
	    {
			//escrever frase sql para executar a operação no BD
			$sql = "INSERT INTO dados (id,nome,telefone,endereco) VALUES(?,?,?,?)";
			try
			{
				//preparando a frase SQL
				$stm = $this->db->prepare($sql);
				
				//substituindo os pontos de interrogação pelo conteudo do objeto produto recebido por parâmetro
				$stm->bindValue(1, $dados->getId());
				$stm->bindValue(2, $dados->getNome());
				$stm->bindValue(3, $dados->getTelefone());
				$stm->bindValue(4, $dados->getEndereco());
				
				//executar a frase sql no BD
				//$retorno = $stm->execute();
				$stm->execute();
				
		    
		    }
			catch (PDOException $e)
			{
			 die($e->getMessage());
			}
		}
			function buscarTodosDados()
		{
			$sql = "SELECT * FROM dados";
			try
			{
				//preparando a frase SQL
				$stm = $this->db->prepare($sql);
				$stm->execute();
				$resultado = $stm->fetchAll(PDO::FETCH_OBJ);
				$this->db = null;
				return $resultado;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
		}//buscarTodos
		function alterar($dados)
		{
			$sql = "UPDATE dados SET  id= ?, nome = ?, telefone = ?, endereco = ? WHERE id = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dados->getId());
				$stm->bindValue(2, $dados->getNome());
				$stm->bindValue(3, $dados->getTelefone());
				$stm->bindValue(4, $dados->getEndereco());
				$stm->bindValue(5, $dados->getId());
				$stm->execute();
				$this->db = null;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
		}//alterar
		function buscarUmDado($dados)
		{
			$sql = "SELECT * FROM dados WHERE id = ?";
			try
			{
				//preparando a frase SQL
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dados->getId());
				$stm->execute();
				$resultado = $stm->fetchAll(PDO::FETCH_OBJ);
				$this->db = null;
				return $resultado;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			} 
		}//buscarUmProduto
		function excluir($dados)
		{
			
			$sql = "DELETE FROM dados WHERE id = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dados->getId());
				$stm->execute();
				$this->db = null;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
		}//excluir
	}
?>
	