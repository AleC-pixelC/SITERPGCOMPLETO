<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro dos personagens</title>
		<link rel="stylesheet" href="../style1.css">
	</head>
	<body>
		<main>
			<nav class="menu">
				<a href="../index.php">Inicial</a>
				<a href="../sobre.php">Sobre</a>
				<a href="../campanhas.php">Campanhas</a>
				<a href="../players.php">Players</a>
				<a href="indexPersonagem.php">Criação de personagem</a>
				<a href="../midia.php">Mídia</a>
			</nav>
			<h2>Pesquisa de Contatos</h2>
			<form method="post" action="pesquisaPersonagem.php">
				<label>Nome parcial:</label>
				<input type="text" name="nomePersonagem" />
				<button type="submit">Pesquisar</button>
			</form>

			<h2>Listagem de Personagens</h2>
			<?php
				$nomePersonagem = '';
				if (isset($_POST['nomePersonagem'])){
					$nomePersonagem = $_POST['nomePersonagem'];
				}
			
				/* Conectando com o banco de dados para listar registros */
				$datasource = 'mysql:host=localhost;dbname=rpgpersonagem';
				$user = 'root';
				$pass = 'vertrigo';
				$db = new PDO($datasource, $user, $pass);
		
				$query = "SELECT * FROM personagens WHERE nomePersonagem LIKE '%$nomePersonagem%'";
				$stm = $db -> prepare($query);
				
				if ($stm -> execute()) {
					print "<table border>
								<tr>
									<th>Nome</th>
									<th>Sistema</th>
									<th>Player</th>
									<th>Ações</th>
								</tr>";
					while ($row = $stm -> fetch()) {
						$idPersonagem = $row['idPersonagem'];
						$nomePersonagem = $row['nomePersonagem'];
						$sistemaPersonagem = $row['sistemaPersonagem'];
						$playerPersonagem = $row['playerPersonagem'];
		
						print "<tr>
									<td>$nomePersonagem</td>
									<td>$sistemaPersonagem</td>
									<td>$playerPersonagem</td>
									<td>
									<a href='delete.php?id=$idPersonagem'>Delete</a>
									<a href= 'edita.php?id=$idPersonagem'>Edita</a>
								</td>
								</tr>";				
					}
					print "</table>";
				} else {
					print '<p>Erro ao listar!</p>';
				}
			?>
			<a href='indexPersonagem.php'>Voltar</a>
			</main>
	</body>
</html>