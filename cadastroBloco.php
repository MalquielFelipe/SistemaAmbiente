<?php
include("conexao.php");

    if(isset($_POST['descricao'])){
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
        
        echo "!k";

    $sql = " insert into tb_bloco_ambiente (descricao) value ('$descricao')";
    if (mysqli_query($conexao, $sql)){
        echo " <br> Dados salvos no banco de dados";
    }else{
        echo " <br> Erro ao salvar!" . mysqli_error($conexao);
    }
    }else{
    echo " Preencha todos os dados";
    }
mysqli_close($conexao);
?>