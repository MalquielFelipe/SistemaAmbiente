<?php
include("conexao.php");

if (!empty($_POST['descricao']) && !empty($_POST['id_bloco'])) {
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $id_bloco = mysqli_real_escape_string($conexao, $_POST['id_bloco']);
  
    $sql = "UPDATE tb_bloco_ambiente SET descricao = '$descricao' WHERE id_bloco = '$id_bloco'";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Dados alterados com sucesso!');</script>";
         
        
    } else {
        echo "Erro ao alterar: " . mysqli_error($conexao);
    }
} else {
    echo "Dados incompletos!";
}


    mysqli_close($conexao);

?>
