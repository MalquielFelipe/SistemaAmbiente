
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
if (isset($_GET['busca'])) {
    include("conexao.php");
    $busca = mysqli_real_escape_string($conexao, trim($_GET['busca']));
    $sql = "SELECT * FROM tb_reserva WHERE fk_cpf LIKE '%$busca%'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>cpf</th>
                <th>fk_ambiente</th>
                <th>horario</th>
                <th>horario_fim</th>
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $id_reserva = htmlspecialchars($row['id']);
            $cpf = htmlspecialchars($row['fk_cpf']);
            echo "<tr>
                    <td>{$cpf}</td>
                    <td>" . htmlspecialchars($row['fk_ambiente']) . "</td>
                    <td>" . htmlspecialchars($row['horario']) . "</td>
                    <td>" . htmlspecialchars($row['horario_fim']) . "</td>
                    <td>
                    <td> <a href='AlterarReserva.php' class='alterar-link' data-id='" . htmlspecialchars($id_reserva) . "'>Alterar</a></td>

                    <td><a href='ExcluiReserva.php?id=" . urlencode($id_reserva) . "' onclick=\"return confirm('Deseja realmente excluir esta reserva?')\">Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhuma reserva encontrada.</p>";
    }
}
?>



<script>
$(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // Impede o redirecionamento
    const id = $(this).data('id'); // Usa o id_reserva correto

    $('#conteudo').load('AlterarReserva.php?id=' + encodeURIComponent(id));
});
</script>
