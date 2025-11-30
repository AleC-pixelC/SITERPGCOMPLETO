<?php
    # Recebe o ID via GET
    $idPersonagem = $_GET['id'];

    # Conexão com BD
    $ds = 'mysql:host=localhost;dbname=rpgpersonagem';
    $bd = new PDO($ds, "root", "vertrigo");

    # Busca dados atuais
    $sql = "SELECT * FROM personagens WHERE idPersonagem = ?";
    $stm = $bd->prepare($sql);
    $stm->bindParam(1, $idPersonagem);

    # Dados atuais
    $stm->execute();
    if($row = $stm->fetch()){
        $nomePersonagem = $row['nomePersonagem'];
        $sistemaPersonagem = $row['sistemaPersonagem'];
        $playerPersonagem = $row['playerPersonagem'];
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Personagens</title>
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
        <h3>Listagem de Personagens</h3>
        <form action='atualizaPersonagem.php' method='POST'>
            <input type='hidden' name='idPersonagem' value='<?php print $idPersonagem ?>'>
            <label>Nome: </label>
            <input name='nomePersonagem' value="<?php print $nomePersonagem ?>"><br>
            <label>Sistema jogado: </label>
            <input name='sistemaPersonagem' value="<?php print $sistemaPersonagem ?>"><br>
            <label>Player do personagem: </label>
            <input name='playerPersonagem' value="<?php print $playerPersonagem ?>"><br>
            <button>Cadastrar</button>
        <form>
    </main> 
</body>
</html>