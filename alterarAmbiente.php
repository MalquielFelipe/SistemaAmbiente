 <?php
include("conexao.php");

$tiposSala = ['SALA_DE_AULA', 'LABORATORIO', 'BIBLIOTECA', 'AUDITORIO', 'SALA_DE_REUNIAO'];

// Verifica se o ID foi passado
if (isset($_GET['id_ambiente']) && !empty($_GET['id_ambiente'])) {

    $id_ambiente = mysqli_real_escape_string($conexao, $_GET['id_ambiente']);
    $sql = "SELECT * FROM tb_ambiente WHERE id_ambiente = '$id_ambiente'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $ambiente = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Ambiente não encontrado.</p>";
        exit;
    }

    // Puxa os blocos para preencher o select
    $sqlBlocos = "SELECT id_bloco, descricao FROM tb_bloco_ambiente";
    $resultBlocos = $conexao->query($sqlBlocos);

} else {
    echo "<p>ID do ambiente não fornecido.</p>";
    exit;
}
?>

<h2>Alterar Ambiente:</h2>

<form id="form-alterar-ambiente" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($ambiente['nome']) ?>">
    </div>

    <div>
        <label for="tipo">Tipo de Sala:</label>
        <select name="tipo" id="tipo" required>
            <option value="">Selecione o tipo</option>
            <?php foreach ($tiposSala as $tipo): ?>
                <option value="<?= $tipo ?>" <?= ($ambiente['tipo'] === $tipo) ? 'selected' : '' ?>>
                    <?= ucwords(strtolower(str_replace('_', ' ', $tipo))) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="capacidade">Capacidade:</label>
        <input type="number" name="capacidade" id="capacidade" value="<?= htmlspecialchars($ambiente['capacidade']) ?>">
    </div>

    <div>
        <label for="fk_bloco">Bloco:</label>
        <select name="fk_bloco" id="fk_bloco" required>
            <option value="">Selecione um Bloco</option>
            <?php
            if ($resultBlocos->num_rows > 0) {
                while ($row = $resultBlocos->fetch_assoc()) {
                    $selected = ($row['id_bloco'] == $ambiente['fk_bloco']) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row["id_bloco"]) . "' $selected>" . htmlspecialchars($row["descricao"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
        </select>
    </div>

    <!-- Campo oculto para ID -->
    <input type="hidden" name="id_ambiente" value="<?= htmlspecialchars($ambiente['id_ambiente']) ?>">

    <br><br>
    <button type="submit">Atualizar</button>
    <button type="reset">Limpar</button>
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
