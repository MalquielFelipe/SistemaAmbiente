

<?php
include ("conexao.php");

    if (isset($_GET['cpf'])){
      
        $cpf = intval($_GET['cpf']);

        $sql = " delete from tb_usuario where cpf = $cpf";
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
                alert ('cpf inválido');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
    }
?>