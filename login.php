<?php
session_start();
include("conexao.php");

$erro = "";
// PROCESSA O LOGIN
if ($_SERVER["REQUEST_METHOD"] === "POST"  ) {
    
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

 
    $sql = "SELECT * FROM tb_usuario WHERE email = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
   
        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
         
            if (($email === $usuario['email']) and  ($senha === $usuario['senha'])) {
                header("Location: telaAmbiente.html"); // redireciona para outra tela após login bem-sucedido
                exit();
            } else {
                echo "<script>
                    alert('Senha incorreta! Tente novamente!');
                    window.location.href = 'loginPrincipal.html';
                </script>";
            exit();
            }
        } else {
            echo "<script>
                alert('Usuario não encontrado!');
                window.location.href = 'loginPrincipal.html';
        </script>";
        }

        $stmt->close();
    } else {
        $erro = "Erro na preparação da consulta.";
    }
}
?>