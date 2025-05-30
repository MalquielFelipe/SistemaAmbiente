<?php

include("conexao.php");

 echo "to aquii";
if (isset($_GET['id_bloco']) && !empty($_GET['id_bloco'])) {
    $id_bloco = mysqli_real_escape_string($conexao, $_GET['id_bloco']);
    $sql = "SELECT * FROM tb_bloco_ambiente WHERE id_bloco = '$id_bloco'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $bloco = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Bloco não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>id do bloco não fornecido.</p>";
    exit;
}
?>

<h2>Alterar bloco</h2>

<form id="form-alterar-bloco">
    <input type="hidden" name="id_bloco" value="<?php echo htmlspecialchars($bloco['id_bloco']); ?>">
    <div>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="<?php echo htmlspecialchars($bloco['descricao']); ?>" >
    </div>
    <button type="submit">Atualizar</button>
    <button type="reset">Limpar</button>
</form>


<div id="mensagem-alterar"></div>

<script>
$('#form-alterar-bloco').submit(function(e){
    e.preventDefault();

    const dados = $(this).serialize();

    $.post('updateBloco.php', dados, function(resposta){
        $('#mensagem-alterar').html(resposta);
    });
});
</script>

 <script>
// Evento delegado para garantir que funcione em conteúdo carregado dinamicamente
$(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // Impede o redirecionamento padrão
    const id_bloco = $(this).data('id_bloco');

    // Usa o nome correto do parâmetro: id_bloco
    $('#conteudo').load('alterarBloco.php?id_bloco=' + encodeURIComponent(id_bloco));
});
</script>
