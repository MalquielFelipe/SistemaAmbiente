<?php   
include ("conexao.php");

    if (isset($_GET['id_ambiente'])){
      
        $id = intval($_GET['id_ambiente']);

        $sql = " delete from tb_ambiente where id_ambiente = $id";

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