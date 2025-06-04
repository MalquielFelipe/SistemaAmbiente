<?php 

//incluir os dados da conexao.php
include("conexao.php");

//verificar se os campos não nulos
if(isset($_POST['id_ambiente']) && isset($_POST['cpf']) && isset($_POST['HorarioInicial']) && isset($_POST['Horariofinal']) ){
    $ambiente = mysqli_real_escape_string($conexao, $_POST['id_ambiente']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $horarioInicio = mysqli_real_escape_string($conexao, $_POST['HorarioInicial']);
    $horarioFim = mysqli_real_escape_string($conexao, $_POST['Horariofinal']);
     

    $sql = " insert into tb_reserva (fk_ambiente, fk_cpf, horario, horario_fim) values ('$ambiente', '$cpf', '$horarioInicio', '$horarioFim')";
    if (mysqli_query($conexao, $sql)){
        echo "<script>
                alert ('Dados salvos no banco de dados');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
    }else{
        echo "<script>
                alert ('Erro ao Salvar');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
        
        mysqli_error($conexao);
    }
}else{
    echo " Preencha todos os dados";
}
mysqli_close($conexao);





