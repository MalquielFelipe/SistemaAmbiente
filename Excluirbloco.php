
<?php
include ("conexao.php");

    if (isset($_GET['id_bloco'])){
      
        $id_bloco = intval($_GET['id_bloco']);

        $sql = " delete from tb_bloco_ambiente where id_bloco = $id_bloco";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            O bloco possui cadastro na tela ambiente.');
            window.location.href = 'buscarReserva.php';";
        }else{
            echo " <script> alert('Erro ao excluir');
            windows.location.href = 'nom.php' </script>";
        }
    }else{
        echo " <script> alert('Id Inválido ');
        windows.location.href = 'nom.php' </script>";
    }
?>