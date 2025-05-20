

<?php
include ("conexao.php");

    if (isset($_GET['id_autor'])){
      
        $id = intval($_GET['id_autor']);

        $sql = " delete from tb_autor where id_autor = $id";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            o autor possui livros cadastrados.');
            window.location.href = 'buscarAutor.php';";
        }else{
            echo " <script> alert('Erro ao excluir');
            windows.location.href = 'buscarAutor.php' </script>";
        }
    }else{
        echo " <script> alert('Id Inválido ');
        windows.location.href = 'buscarAutor.php' </script>";
    }
?>