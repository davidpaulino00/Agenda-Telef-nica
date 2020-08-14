<?php
	if($_GET)
	{
		require_once "../models/conexao.class.php";
		require_once "../models/dado.class.php";
		require_once "../models/dadoDAO.class.php";
		//excluir
		$dados = new dados($_GET["id"], null,);
		$dadoDAO = new dadoDAO();
		$dadoDAO->excluir($dados);
		header("Location:listarDados.php");
	}
?>