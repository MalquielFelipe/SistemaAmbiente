<?php
include("conexao.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM tb_reserva WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $reserva = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Reserva não encontrada.</p>";
        exit;
    }
} else {
    echo "<p>ID da reserva não fornecido.</p>";
    exit;
}

// Carrega os ambientes
$result_ambiente = mysqli_query($conexao, "SELECT * FROM tb_ambiente");

// Carrega os usuários
$result_cpf = mysqli_query($conexao, "SELECT * FROM tb_usuario");
?>
 <h2>Alterar Reserva</h2>

<form id="form-alterar-reserva" method="post" action="updateReserva.php">


    <div>
        <label for="horario">Horário:</label>
        <input name="horario" id="horario" type="time" value="<?php echo htmlspecialchars($reserva['horario']); ?>" required />
    </div>

    <div>
        <label for="horario_fim">Horário Fim:</label>
        <input name="horario_fim" id="horario_fim" type="time" value="<?php echo htmlspecialchars($reserva['horario_fim']); ?>" required />
    </div>

    <div>
        <label for="fk_ambiente">Ambiente:</label>
        <select name="fk_ambiente" id="fk_ambiente" required>
            <option value="">Selecione um ambiente</option>
            <?php
            if ($result_ambiente && mysqli_num_rows($result_ambiente) > 0) {
                while ($row = mysqli_fetch_assoc($result_ambiente)) {
                    $selected = ($row['id_ambiente'] == $reserva['fk_ambiente']) ? "selected" : "";
                    echo "<option value='" . $row['id_ambiente'] . "' $selected>" . htmlspecialchars($row['nome']) . "</option>";
                }
            }
            ?>
        </select>
    </div>

    <div>
        <label for="fk_cpf">Usuário (CPF):</label>
        <select name="fk_cpf" id="fk_cpf" required>
            <option value="">Selecione um CPF</option>
            <?php
            if ($result_cpf && mysqli_num_rows($result_cpf) > 0) {
                while ($row = mysqli_fetch_assoc($result_cpf)) {
                    $selected = ($row['cpf'] == $reserva['fk_cpf']) ? "selected" : "";
                    echo "<option value='" . $row['cpf'] . "' $selected>" . htmlspecialchars($row['nome']) . " (" . $row['cpf'] . ")</option>";
                }
            }
            ?>
        </select>
    </div>

    <div>
        <button type="submit">Salvar Alterações</button>
    </div>
</form>

<div id="mensagem-alterar"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#form-alterar-reserva').submit(function(e){
    e.preventDefault();
    const dados = $(this).serialize();

    $.post('updateReserva.php', dados, function(resposta){
        $('#mensagem-alterar').html(resposta);
    });
});
</script>
