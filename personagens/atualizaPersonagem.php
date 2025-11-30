<?php
   # Recebe os parâmetros
   $idPersonagem = $_POST['idPersonagem'];
   $nomePersonagem = $_POST['nomePersonagem'];
   $sistemaPersonagem = $_POST['sistemaPersonagem'];
   $playerPersonagem = $_POST['playerPersonagem'];
  
   # Coneão com o BD
   $ds = "mysql:host=localhost;dbname=rpgpersonagem";
   $bd = new PDO($ds, "root", "vertrigo");

   # SQL para atualizar
    $sql = "UPDATE personagens SET nomePersonagem=?, sistemaPersonagem=?, playerPersonagem=? WHERE idPersonagem=?";
    $stm = $bd->prepare($sql);
    $stm->bindParam(1, $nomePersonagem);
    $stm->bindParam(2, $sistemaPersonagem);
    $stm->bindParam(3, $playerPersonagem);
    $stm->bindParam(4, $idPersonagem);

   # Executa o SQL
  if($stm->execute()){
    header("location: indexPersonagem.php");
  }
  else{
    print "<p>Erro ao remover!</p>";
  }

?>