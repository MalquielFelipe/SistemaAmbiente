<?php
include("conexao.php");

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
} else {
    echo "<p>id do ambiente não fornecido.</p>";
    exit;
}
?>

<h2>Alterar Ambiente:</h2>

<form id="form-alterar-ambiente">
    <div>
        <label for="capacidade">Capacidade:</label>
        <input type="text" name="capacidade" id="capacidade" value="<?php echo htmlspecialchars($ambiente['capacidade']); ?>" >
    </div>
    <div>
        <label for="fk_bloco">Bloco:</label>
        <input type="text" name="fk_bloco" id="fk_bloco" value="<?php echo htmlspecialchars($ambiente['fk_bloco']); ?>">
    </div>
    <div>
        <label for="id_ambiente">Ambiente:</label>
        <input type="id_ambiente" name="id_ambiente" id="id_ambiente" hidden value="<?php echo htmlspecialchars($ambiente['id_ambiente']);  ?>">
    </div>
    <div>
        <label for="nome">Nome:</label>
        <input type="nome" name="nome" id="nome" value="<?php echo htmlspecialchars($ambiente['nome']); ?>">
    </div>
    <div>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($ambiente['tipo']); ?>">
    </div>
  

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

<script>
    // evento delegado para garantir que funcione em conteúdo carregado dinamicamente
    $(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const id_ambiente = $(this).data('id_ambiente');

    $('#conteudo').load('alterarAmbiente.php?id_ambiente=' + encodeURIComponent(id_ambiente));
});
</script>