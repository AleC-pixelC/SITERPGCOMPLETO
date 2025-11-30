<?php
    # Recebendo o ID do contato
    $idPersonagem = $_GET['id'];

    # Conexão com BD
    $ds = "mysql:host=localhost;dbname=rpgpersonagem";
    $bd = new PDO($ds, "root", "vertrigo");

    # SQL para remover 
    $sql = "DELETE FROM personagens WHERE idPersonagem = ?";
    $stm = $bd->prepare($sql);
    $stm -> bindParam(1, $idPersonagem);

    #executar o SQL
    if ($stm ->execute()){
        header("location: indexPersonagem.php");
    }
    else {
        print "<p>Erro ao remover!</p>";
    }

?>