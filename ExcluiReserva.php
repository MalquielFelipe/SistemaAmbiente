
<?php
include ("conexao.php");

    if (isset($_GET['id'])){
      
        $id_reserva = intval($_GET['id']);

        $sql = " delete from tb_reserva where id = $id_reserva";

        if ($conexao->query($sql) === true){
            echo " <script>  alert('Não é possível excluir: 
            A reserva possui cadastro na tela ambiente.');
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