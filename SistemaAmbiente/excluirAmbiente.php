<?php   
include ("conexao.php");

    if (isset($_GET['id_ambiente'])){
      
        $id = intval($_GET['id_ambiente']);

        $sql = " delete from tb_ambiente where id_ambiente = $id";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            o autor tem ambiente cadastrados.');
            window.location.href = 'buscarAmbiente.php';";
        }else{
            echo " <script> alert('Erro ao excluir');
            windows.location.href = 'buscarambiente.php' </script>";
        }
    }else{
        echo " <script> alert('Id Inválido ');
        windows.location.href = 'buscarAmbiente.php' </script>";
    }
?>