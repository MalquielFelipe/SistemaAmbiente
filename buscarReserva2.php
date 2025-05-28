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
            $cpf = htmlspecialchars($row['fk_cpf']);
            echo "<tr>
                    <td>{$cpf}</td>
                    <td>" . htmlspecialchars($row['fk_ambiente']) . "</td>
                    <td>" . htmlspecialchars($row['horario']) . "</td>
                    <td>" . htmlspecialchars($row['horario_fim']) . "</td>
                    <td>
                    <td> <a href='alterarReserva.php' class='alterar-link' data-cpf='" . htmlspecialchars($cpf) . "'>Alterar</a></td>

                    <td><a href='excluirReserva.php?cpf=" . urlencode($cpf) . "' onclick=\"return confirm('Deseja realmente excluir esta reserva?')\">Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhuma reserva encontrada.</p>";
    }
}
?>
<script>
    // evento delegado para garantir que funcione em conteúdo carregado dinamicamente
    $(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const cpf = $(this).data('cpf');

    $('#conteudo').load('alterarReserva.php?cpf=' + encodeURIComponent(cpf));
});
</script>