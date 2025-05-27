<?php
include("conexao.php");

if (
      !empty($_POST['descricao']) && !empty($_POST['descricao'])){
       
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
      
         $sql = "UPDATE tb_bloco_ambiente SET 
                descricao = '$descricao', 
              
            WHERE id_bloco = '$id_bloco'";
        
        if( mysqli_query($conexao, $sql) ){
          echo " <script> alert ('dados alterados com sucesso!' ); </script>";
            header("Location: buscarBloco.php");
        }else{
            echo " Erro ao alterar:" . mysqli_error($conexao);
        }
    }else{
        echo " Dados incompletos!";
    }

    mysqli_close($conexao);

?>
