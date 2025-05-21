<?php
include("conexao.php");

if (
    isset($_POST['cpf']) && !empty($_POST['cpf']) &&
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario']) &&
    isset($_POST['senha']) && !empty($_POST['senha']) &&
    !empty($_POST['telefone']) && !empty($_POST['telefone'])){
       
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        $tipo_usuario = mysqli_real_escape_string($conexao, $_POST['tipo_usuario']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
         $sql = "UPDATE tb_usuario SET 
                nome = '$nome', 
                email = '$email',
                telefone = '$telefone',
                tipo_usuario = '$tipo_usuario',
                senha = '$senha'
            WHERE cpf = '$cpf'";
        
        if( mysqli_query($conexao, $sql) ){
            header("Location: buscarUsuario.php");
        }else{
            echo " Erro ao alterar:" . mysqli_error($conexao);
        }
    }else{
        echo " Dados incompletos!";
    }
    mysqli_close($conexao);

?>