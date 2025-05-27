<?php
include("conexao.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM tb_ambiente WHERE id_ambiente = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $ambiente = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Ambiente não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID do ambiente não fornecido.</p>";
    exit;
}

// Carrega blocos
$sql_blocos = "SELECT * FROM tb_bloco_ambiente";
$result_blocos = $conexao->query($sql_blocos);
?>

<form id="form-alterar-ambiente" method="post" action="updateAmbiente.php">
    <h2>Alterar Ambiente</h2>
    <input type="hidden" name="id_ambiente" value="<?php echo $ambiente['id_ambiente']; ?>">

    <div>
        <label for="nome">Nome:</label>
        <input name="nome" id="nome" type="text" value="<?php echo htmlspecialchars($ambiente['nome']); ?>" required />
    </div>

    <div>
        <label for="tipo">Tipo:</label>
        <input name="tipo" id="tipo" type="text" value="<?php echo htmlspecialchars($ambiente['tipo']); ?>" required />
    </div>

    <div>
        <label for="capacidade">Capacidade:</label>
        <input name="capacidade" id="capacidade" type="number" value="<?php echo htmlspecialchars($ambiente['capacidade']); ?>" required />
    </div>

    <div>
        <label for="id_bloco">Bloco:</label>
        <select name="id_bloco" id="id_bloco" required>
            <option value="">Selecione um bloco</option>
            <?php
            if ($result_blocos && $result_blocos->num_rows > 0) {
                while ($row = $result_blocos->fetch_assoc()) {
                    $selected = ($row['id_bloco'] == $ambiente['id_bloco']) ? "selected" : "";
                    echo "<option value='" . $row['id_bloco'] . "' $selected>" . htmlspecialchars($row['descricao']) . "</option>";
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

<script>
$('#form-alterar-ambiente').submit(function(e){
    e.preventDefault();
    const dados = $(this).serialize();

    $.post('updateAmbiente.php', dados, function(resposta){
        $('#mensagem-alterar').html(resposta);
    });
});
</script>
