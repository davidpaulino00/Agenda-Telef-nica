<?php
	require_once "cabecalho.php";
	if($_POST)
	{
		if($_POST["nome"] == "")
		{
			echo "<script>alert('Preencha o Nome')</script>";
		}
		if($_POST["telefone"] == "")
		{
			echo "<script>alert('Preencha o Telefone')</script>";
		}
		if($_POST["endereco"] == "")
		{
			echo "<script>alert('Preencha o Endereco')</script>";
		}
		else
		{
			require_once "../models/conexao.class.php";
			require_once "../models/dado.class.php";
			require_once "../models/dadoDAO.class.php";
			$dados= new dados(null,$_POST["nome"] ,$_POST["telefone"],$_POST["endereco"]);
			$dadoDAO = new dadoDAO();
			$dadoDAO->inserir($dados);
			header("Location:listarDados.php");
		}
	}
?>
		<div class="content">
			<div class="container">
				<h2>Agenda Telefônica</h2><br><br>
				<form action="#" method="POST">
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" name="nome" required>
						<label>Telefone:</label>
						<input type="text" name="telefone" required>
						<label>Endereco:</label>
						<input type="text" name="endereco" required>
					</div>
					<br><input type="submit" value="Enviar" class="btn btn-lg btn-success">
				</form>
			</div>
		</div>
	</body>
</html>