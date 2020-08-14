<?php
	require_once "cabecalho.php";
?>
		<div class="content">
			<div class="container">
				<h2>Agenda Telefônica</h2><br><br>
				<table class="table-striped" id="dados">
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Endereco</th>
					    <th style="text-align:center">Ações</th>
					</tr>
					<?php
						require_once "../models/conexao.class.php";
						require_once "../models/dadoDAO.class.php";
						
						$dadoDAO = new dadoDAO();
						$retorno = $dadoDAO->buscarTodosDados();
						if(count($retorno) > 0)
						{
							foreach($retorno as $dados)
							{
								echo "<tr>";
								echo "<td>{$dados->nome}</td>";
								echo "<td>{$dados->telefone}</td>";
								echo "<td>{$dados->endereco}</td>";
							    echo "<td><a class='btn btn-warning btn-sm'href='alterarDados.php?id={$dados->id}'>Alterar</a>&nbsp;";
								echo "<a class='btn btn-danger btn-sm' href='excluirDados.php?id={$dados->id}'>Excluir</a>&nbsp;";
								echo "</tr>";
							}
						}
					?>
				</table>
				<br><a href="dado.php" class="btn btn-lg btn-success">Nova Dados</a>
			</div>
		</div>