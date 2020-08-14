<?php
	class dados
	{
		private $id;
		private $nome;
		private $telefone;
		private $endereco;
		
		
		function __construct($id = null, $nome = null, $telefone = null, $endereco = null)
		{
			$this->id = $id;
			$this->nome = $nome;
			$this->telefone = $telefone;
			$this->endereco = $endereco;
			
		}
		function getId()
		{
			return $this->id;
		}
		function getNome()
		{
			return $this->nome;
		}
		function getTelefone()
		{
			return $this->telefone;
		}
		function getEndereco()
		{
			return $this->endereco;
		}
		
	}//class
?>