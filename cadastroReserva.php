<?php 

//incluir os dados da conexao.php
include("conexao.php");

//verificar se os campos não nulos
if(isset($_POST['ambiente']) && isset($_POST['cpf']) && isset($_POST['horarioInicio']) && isset($_POST['horarioFim']) &&
isset($_POST['id'])){
    $ambiente = mysqli_real_escape_string($conexao, $_POST['ambiente']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $horarioInicio = mysqli_real_escape_string($conexao, $_POST['horarioInicio']);
    $horarioFim = mysqli_real_escape_string($conexao, $_POST['horarioFim']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = " insert into tb_reserva (ambiente, cpf, horarioInicio, horarioFim, id) value ('$ambiente', '$cpf', '$horarioInicio', '$horarioFim'
                    '$id')";
    if (mysqli_query($conexao, $sql)){
        echo " <br> Dados salvos no banco de dados";
    }else{
        echo " <br> Erro ao salvar!" . mysqli_error($conexao);
    }
}else{
    echo " Preencha todos os dados";
}
mysqli_close($conexao);





