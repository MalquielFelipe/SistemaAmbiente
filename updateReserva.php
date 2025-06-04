<?php
include("conexao.php");

if (
    isset($_POST['horario']) && !empty($_POST['horario']) &&
    isset($_POST['horario_fim']) && !empty($_POST['horario_fim']) &&
    isset($_POST['fk_ambiente']) && isset($_POST['fk_ambiente']) &&
    isset($_POST['fk_cpf']) && isset($_POST['fk_cpf']) &&
    isset($_POST['id']) && !empty($_POST['id'])
) {
    $horario = mysqli_real_escape_string($conexao, $_POST['horario']);
    $horario_fim = mysqli_real_escape_string($conexao, $_POST['horario_fim']);
    $ambiente = mysqli_real_escape_string($conexao, $_POST['fk_ambiente']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['fk_cpf']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = "UPDATE tb_reserva SET 
                horario = '$horario', 
                horario_fim = '$horario_fim',
                fk_ambiente = '$ambiente',
                fk_cpf = '$cpf'
            WHERE id = '$id'";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>
                alert ('Alterado com sucesso');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";

    } else {
      echo "<script>
                alert ('Erro ao Alterar');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";

        mysqli_error($conexao);
    }
} else {
    echo "Dados incompletos!";
}

mysqli_close($conexao);
?>
