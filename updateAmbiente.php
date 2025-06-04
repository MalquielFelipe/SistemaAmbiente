
<?php
include("conexao.php");

if (
    isset($_POST['capacidade']) && !empty($_POST['capacidade']) &&
    isset($_POST['fk_bloco']) && !empty($_POST['fk_bloco']) &&
    isset($_POST['id_ambiente']) && !empty($_POST['id_ambiente']) &&
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    !empty($_POST['tipo']) && !empty($_POST['tipo'])){
       
        $capacidade = mysqli_real_escape_string($conexao, $_POST['capacidade']);
        $fk_bloco = mysqli_real_escape_string($conexao, $_POST['fk_bloco']);
        $id_ambiente = mysqli_real_escape_string($conexao, $_POST['id_ambiente']);
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
               
               $sql = "UPDATE tb_ambiente SET 
                capacidade = '$capacidade', 
                fk_bloco = '$fk_bloco',
                tipo = '$tipo'
                WHERE id_ambiente = '$id_ambiente'";
        
      if (mysqli_query($conexao, $sql)) {
        echo  "<script>
                alert ('Alterado com sucesso');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
         
        
    } else {
        echo "<script>
                alert ('Erro ao Alterar');
                setTimeout(function() {
                    window.location.href = 'homePage.php';
                }, 800);
              </script>";
        
        mysqli_error($conexao);
    }
} else {
    echo "Dados incompletos!";
}


    mysqli_close($conexao);
?>






