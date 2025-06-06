<?php
include("conexao.php");

    if(isset($_POST['descricao'])){
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
        
        echo "!k";

    $sql = " insert into tb_bloco_ambiente (descricao) value ('$descricao')";
    if (mysqli_query($conexao, $sql)){
        echo"<script>
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
              </script>"; 
              mysqli_error($conexao);
    }
    }else{
    echo " Preencha todos os dados";
    }
mysqli_close($conexao);
?>