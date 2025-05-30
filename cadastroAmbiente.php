<?php
include("conexao.php");

// Verificar se os campos foram enviados e não são nulos
if (
  isset($_POST['nome']) &&
  isset($_POST['tipo']) &&
  isset($_POST['capacidade']) &&
  isset($_POST['fk_bloco'])
) {
  // Escapar strings para segurança contra SQL Injection
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
  $capacidade = mysqli_real_escape_string($conexao, $_POST['capacidade']);

  // Garantir que o bloco seja um número inteiro
  $bloco = intval($_POST['fk_bloco']);

  echo "Processando inserção...<br>";

  // Montar e executar a query
  $sql = "INSERT INTO tb_ambiente (nome, tipo, capacidade, fk_bloco) VALUES ('$nome', '$tipo', '$capacidade', $bloco)";

  if (mysqli_query($conexao, $sql)) {
    echo "✅ Dados salvos com sucesso no banco de dados.";
  } else {
    echo "❌ Erro ao salvar: " . mysqli_error($conexao);
  }
} else {
  echo "⚠️ Campos obrigatórios não foram preenchidos.";
}

// Fechar a conexão
mysqli_close($conexao);
?>
