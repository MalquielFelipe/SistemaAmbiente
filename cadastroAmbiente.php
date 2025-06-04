<?php
include("conexao.php");

// Verificar se os campos foram enviados e não são nulos
if (
  isset($_POST['nome']) &&
  isset($_POST['tipo']) &&
  isset($_POST['capacidade']) &&
  isset($_POST['id_bloco'])
) {
  // Escapar strings para segurança contra SQL Injection
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
  $capacidade = mysqli_real_escape_string($conexao, $_POST['capacidade']);
  $fk_bloco = intval($_POST['id_bloco']);

  echo "Processando inserção...<br>";

  // Montar e executar a query
  $sql = "INSERT INTO tb_ambiente (nome, tipo, capacidade, fk_bloco) VALUES ('$nome', '$tipo', '$capacidade', $fk_bloco)";

  if (mysqli_query($conexao, $sql)) {
     echo "<script>
                alert ('✅ Dados salvos com sucesso');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
   
  } else {
      echo "<script>
                alert ('❌ Erro ao salvar:');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>" . mysqli_error($conexao);
  }
} else {
  echo "⚠️ Campos obrigatórios não foram preenchidos.";
}

// Fechar a conexão
mysqli_close($conexao);
?>


