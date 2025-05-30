
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
                <th>horario_inicio</th>
                <th>horario_fim</th>
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $id_reserva = htmlspecialchars($row['id']);
            $cpf = htmlspecialchars($row['fk_cpf']);
            echo "<tr>
<<<<<<< HEAD
                    <td>{$cpf}</td>
                    <td>" . htmlspecialchars($row['fk_ambiente']) . "</td>
                    <td>" . htmlspecialchars($row['horario_inicio']) . "</td>
                    <td>" . htmlspecialchars($row['horario_fim']) . "</td>
                    <td>
                    <td> <a href='alterarReserva.php' class='alterar-link' data-cpf='" . htmlspecialchars($cpf) . "'>Alterar</a></td>

                    <td><a href='excluirReserva.php?cpf=" . urlencode($cpf) . "' onclick=\"return confirm('Deseja realmente excluir esta reserva?')\">Excluir</a></td>
                  </tr>";
=======
            <td>{$cpf}</td>
            <td>" . htmlspecialchars($row['fk_ambiente']) . "</td>
            <td>" . htmlspecialchars($row['horario']) . "</td>
            <td>" . htmlspecialchars($row['horario_fim']) . "</td>
            <td>
                <a href='AlterarReserva.php?id=$id_reserva' class='alterar-link' data-id_reserva='$id_reserva'>Alterar</a>
            </td>
            <td>
                <a href='excluirReserva.php?cpf=" . urlencode($cpf) . "' onclick=\"return confirm('Deseja realmente excluir esta reserva?')\">Excluir</a>
            </td>
          </tr>";
>>>>>>> 731779e3d1e9a10cd7abf6f2f45164d3eac4755a
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
    const id = $(this).data('id_reserva'); // Usa o id_reserva correto

    $('#conteudo').load('AlterarReserva.php?id=' + encodeURIComponent(id));
});
</script>
