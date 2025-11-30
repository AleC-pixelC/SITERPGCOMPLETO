<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Personagem de RPG</title>
    <link rel="stylesheet" href="../style1.css">
</head>
<body>
    <nav class="menu">
        <a href="../index.php">Inicial</a>
        <a href="../sobre.php">Sobre</a>
        <a href="../campanhas.php">Campanhas</a>
        <a href="../players.php">Players</a>
        <a href="indexPersonagem.php">Criação de personagem</a>
        <a href="../midia.php">Mídia</a>
    </nav>
    <main>
        <a href='../index.php' class="link">Home</a>
        <a href='pesquisaPersonagem.php' class="link">Pesquisar</a>
        <h3>Cadastro dos personagens</h3>
        <form action='inserePersonagem.php' method='post'>
            <label>Nome: </label>
            <input name="nomePersonagem"><br>
            <label>Sistema jogado: </label>
            <input name="sistemaPersonagem"><br>
            <label>Player do personagem: </label>
            <input name="playerPersonagem"><br>
            <button>Cadastrar</button>
        </form>
        <h3>Listagem de Personagens</h3>
        <table border>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sistema</th>
                <th>Player</th>
                <th>Ações</th>
    </main>
        <?php
            # Conexão BD
            $ds = "mysql:host=localhost;dbname=rpgpersonagem";
            $bd = new PDO($ds, "root", "vertrigo");

            # SQL para listagem
            $sql = "SELECT * FROM personagens";
            $stm = $bd->prepare($sql);

            # Executa o SQL
            if($stm->execute()){
                while($row = $stm->fetch()){
                    $idPersonagem = $row['idPersonagem'];
                    $nomePersonagem = $row['nomePersonagem'];
                    $sistemaPersonagem = $row['sistemaPersonagem'];
                    $playerPersonagem = $row['playerPersonagem'];
                        print "<tr>
                            <td>$idPersonagem</td>
                            <td>$nomePersonagem</td>
                            <td>$sistemaPersonagem</td>
                            <td>$playerPersonagem</td>
                            <td>
                                <a href='deletePersonagem.php?id=$idPersonagem'>Delete</a>
                                <a href='editaPersonagem.php?id=$idPersonagem'>Edita</a>
                            </td>
                        </tr>";
                }
            }

        ?>
</body>
</html>