<?php
if (isset($_GET['busca'])) {
    include("conexao.php");
    $busca = mysqli_real_escape_string($conexao, trim($_GET['busca']));
    $sql = "SELECT * FROM tb_bloco_ambiente WHERE id_bloco LIKE '%$busca%'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>Descricao</th> 
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $id_bloco = htmlspecialchars($row['id_bloco']);
            echo "<tr>
                 
                    <td>" . htmlspecialchars($row['descricao']) . "</td>
                   
                    <td> <a href='alterarBloco.php' class='alterar-link' data-id_bloco='" . htmlspecialchars($id_bloco) . "'>Alterar</a></td>

                    <td><a href='excluirBloco.php?descricao=" . urlencode($id_bloco) . "' onclick=\"return confirm('Deseja realmente excluir este Bloco?')\">Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum bloco encontrado.</p>";
    }
}
?>
<script>
    // evento delegado para garantir que funcione em conteúdo carregado dinamicamente
    $(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const descricao = $(this).data('descricao');

    $('#conteudo').load('alterarBloco.php?cpf=' + encodeURIComponent(id_bloco));
});
</script>