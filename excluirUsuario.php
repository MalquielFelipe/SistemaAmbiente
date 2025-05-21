

<?php
include ("conexao.php");

    if (isset($_GET['cpf'])){
      
        $cpf = intval($_GET['cpf']);

        $sql = " delete from tb_usuario where cpf = $cpf";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            o usuario possui cadastro na tela ambiente.');
            window.location.href = 'buscarAmbiente.php';";
        }else{
            echo " <script> alert('Erro ao excluir');
            windows.location.href = 'nom.php' </script>";
        }
    }else{
        echo " <script> alert('Id Inválido ');
        windows.location.href = 'nom.php' </script>";
    }
?>