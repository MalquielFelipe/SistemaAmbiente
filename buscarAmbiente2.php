<?php
if (isset($_GET['busca'])) {
  
    include("conexao.php");
    $busca = mysqli_real_escape_string($conexao, trim($_GET['busca']));
    $sql = "SELECT * FROM tb_ambiente WHERE id_ambiente LIKE '%$busca%'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>capacidade</th>
                <th>fk_bloco</th>
                <th>id_ambiente</th>
                <th>nome</th>
                 <th>tipo</th>
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $id_ambiente = htmlspecialchars($row['id_ambiente']);
            echo "<tr>
                    <td>{$id_ambiente}</td>
                    <td>" . htmlspecialchars($row['capacidade']) . "</td>
                    <td>" . htmlspecialchars($row['fk_bloco']) . "</td>
                    <td>" . htmlspecialchars($row['nome']) . "</td>
                     <td>" . htmlspecialchars($row['tipo']) . "</td>
                    <td>
                    <td> <a href='alterarAmbiente.php' class='alterar-link' data-id_ambiente='" . htmlspecialchars($id_ambiente) . "'>Alterar</a></td>

                    <td><a href='excluirAmbiente.php?id_ambiente=" . urlencode($id_ambiente) . "' onclick=\"return confirm('Deseja realmente excluir este Ambiente?')\">Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum Ambiente encontrado.</p>";
    }
}
?>
<script>
$(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const id_ambiente = $(this).data('id_ambiente');

    $('#conteudo').load('alterarAmbiente.php?id_ambiente=' + encodeURIComponent(id_ambiente));
});
</script>