<?php
if (isset($_GET['busca'])) {
    include("conexao.php");

    $busca = mysqli_real_escape_string($conexao, trim($_GET['busca']));
    $sql = "SELECT * FROM tb_ambiente WHERE nome LIKE '%$busca%'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Capacidade</th>
                <th>Ações</th>
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $id_ambiente = htmlspecialchars($row['id_ambiente']);
            $nome = htmlspecialchars($row['nome']);
            $tipo = htmlspecialchars($row['tipo']);
            $capacidade = htmlspecialchars($row['capacidade']);

            echo "<tr>
                    <td>$nome</td>
                    <td>$tipo</td>
                    <td>$capacidade</td>
                    <td>
                        <a href='alteraAmbiente.php?id=$id_ambiente' class='alterar-link' data-id='$id_ambiente'>Alterar</a> |
                        <a href='excluirAmbiente.php?id=$id_ambiente' onclick=\"return confirm('Deseja realmente excluir este ambiente?')\">Excluir</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum ambiente encontrado.</p>";
    }
}
?>

<script>
$(document).on('click', '.alterar-link', function(e){
    e.preventDefault();
    const id = $(this).data('id');
    $('#conteudo').load('alterarAmbiente.php?id=' + encodeURIComponent(id));
});
</script>
