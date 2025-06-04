
<?php
include ("conexao.php");

    if (isset($_GET['id'])){
      
        $id_reserva = intval($_GET['id']);

        $sql = " delete from tb_reserva where id = $id_reserva";
  if ($conexao->query($sql) === true){
           echo "<script>
                alert ('Excluido com sucesso');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
        }else{
            echo "<script>
                alert ('Erro ao excluir');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
        }
    }else{
         echo "<script>
                alert ('ID inválido');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
    }
?>