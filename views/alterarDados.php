<?php
    require_once "cabecalho.php";
	require_once "../models/conexao.class.php";
	require_once "../models/dado.class.php";
	require_once "../models/dadoDAO.class.php";
	if($_GET)
	{
		$dados = new dados($_GET["id"],null ,null,null);
		$dadoDAO = new dadoDAO();
		$ret = $dadoDAO->buscarUmDado($dados);
		
	}
	if($_POST)
	{
		
		$erro = 0;
		if($_POST["nome"] == "")
		{
			echo "<script>alert('Preencha o seu nome :');</script>";
			$erro++;
		}
		if($_POST["telefone"] == "")
		{
			echo "<script>alert('Insira o seu telefone :');</script>";
			$erro++;
		}
		if($_POST["endereco"] == "")
		{
			echo "<script>alert('Insira o endereco:');</script>";
			$erro++;
		}
		
		if($erro == 0)
		{
			
			//inserir no BD o conta
			$dados = new dados($_POST["id"], $_POST["nome"], $_POST["telefone"], $_POST["endereco"]);
			$dadoDAO = new dadoDAO();
			$dadoDAO->alterar($dados);
			
			header("Location:listarDados.php");
		}
		
		
	}
	
?>
<div class="content">
			<div class="container">

				<h2>Alterar dados </h2>
				<form action="#" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $ret[0]->id;?>">
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" name="nome" value="<?php echo $ret[0]->nome;?>">
					</div>
					<div class="form-group">
						<label>Telefone</label>
						<input type="text" name="telefone" value="<?php echo $ret[0]->telefone;?>">
					</div>
					<div class="form-group">
						<label>Endereco:</label>
						<input type="text" name="endereco" value="<?php echo $ret[0]->endereco;?>">
					</div>
					
					
										
						
						<input type="submit" value="Enviar" class="btn btn-lg btn-success">
					</div>
					
		 
		       </form>
		</body>
</html>