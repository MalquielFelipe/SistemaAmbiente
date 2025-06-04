<?php
include("conexao.php");

// Verificar se os campos foram enviados e não são nulos
if (
  isset($_POST['cpf']) &&
  isset($_POST['nome']) &&
  isset($_POST['email']) &&
  isset($_POST['telefone']) &&
  isset($_POST['tipo_usuario']) &&
  isset($_POST['senha'])
) {
  // Escapar strings para segurança contra SQL Injection
  $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
  $tipo_usuario = mysqli_real_escape_string($conexao, $_POST['tipo_usuario']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

  echo "Processando inserção...<br>";

  // Corrigido: coluna 'cpf' estava faltando e vírgula extra no final da lista de colunas
  $sql = "INSERT INTO tb_usuario (cpf, nome, email, telefone, tipo_usuario, senha)
          VALUES ('$cpf', '$nome', '$email', '$telefone', '$tipo_usuario', '$senha')";

  if (mysqli_query($conexao, $sql)) {
    echo "<script>
                alert ('✅ Dados salvos com sucesso');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
  } else {
    "<script>
                alert ('Erro ao Salvar');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>"; 
    
    mysqli_error($conexao);
  }
} else {
  echo "⚠️ Campos obrigatórios não foram preenchidos.";
}

// Fechar a conexão
mysqli_close($conexao);
?>
