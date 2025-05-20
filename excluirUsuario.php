

<?php
include ("conexao.php");

    if (isset($_GET['id_usuario'])){
      
        $id = intval($_GET['id_usuario']);

        $sql = " delete from tb_autor where id_usuario = $id";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            o usuario possui cadastro na tela ambiente.');
            window.location.href = 'buscarAmbiente.php';";
        }else{
            echo " <script> alert('Erro ao excluir');
            windows.location.href = 'buscarAutor.php' </script>";
        }
    }else{
        echo " <script> alert('Id Inválido ');
        windows.location.href = 'buscarAutor.php' </script>";
    }
?>