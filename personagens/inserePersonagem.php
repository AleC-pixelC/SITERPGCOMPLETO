<?php
    # Recebe parâmetros
    $nomePersonagem = $_POST['nomePersonagem'];
    $sistemaPersonagem = $_POST	['sistemaPersonagem'];
    $playerPersonagem = $_POST['playerPersonagem'];

    # Conexão BD
    $ds = "mysql:host=localhost;dbname=rpgpersonagem";
    $bd = new PDO($ds, "root", "vertrigo");

    # SQL para inserção
    $sql = "INSERT INTO personagens (nomePersonagem, sistemaPersonagem, playerPersonagem) VALUES (?,?,?)";
    $stm = $bd->prepare($sql);
    $stm->bindParam(1, $nomePersonagem);
    $stm->bindParam(2, $sistemaPersonagem);
    $stm->bindParam(3, $playerPersonagem);

    # Executa o SQL
    if ($stm->execute()){
        header("location:indexPersonagem.php");
    }
    else{
        print "<p>Erro ao inserir</p>";
    }

?>