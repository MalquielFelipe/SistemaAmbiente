<?php
include("conexao.php");

if (
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['tipo']) && !empty($_POST['tipo']) &&
    isset($_POST['capacidade']) && !empty($_POST['capacidade']) &&
    isset($_POST['id_bloco']) && !empty($_POST['id_bloco']) ){
        $id_ambiente = mysqli_real_escape_string($conexao, $_POST['id_ambiente']);
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
        $capacidade = mysqli_real_escape_string($conexao, $_POST['capacidade']);
 
         $sql = "UPDATE tb_ambiente SET 
                nome = '$nome', 
                tipo = '$tipo',
                capacidade = '$capacidade'
                WHERE id_ambiente = '$id_ambiente'";
        
        if( mysqli_query($conexao, $sql) ){
             echo "<script>
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 1500);
              </script>";
        }else{
            echo " Erro ao alterar:" . mysqli_error($conexao);
        }
    }else{
        echo " Dados incompletos!";
    }

    mysqli_close($conexao);

?>
