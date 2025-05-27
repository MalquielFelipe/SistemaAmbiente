<?php
include("conexao.php");

if (isset($_GET['cpf']) && !empty($_GET['cpf'])) {
    $cpf = mysqli_real_escape_string($conexao, $_GET['cpf']);
    $sql = "SELECT * FROM tb_usuario WHERE cpf = '$cpf'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Usuário não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>CPF não fornecido.</p>";
    exit;
}
?>

<h2>Alterar Usuário</h2>

<form id="form-alterar-usuario">
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" >
    </div>
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">
    </div>
    <div>
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>">
    </div>
    <div>
        <label for="tipo_usuario">Tipo:</label>
        <input type="text" name="tipo_usuario" id="tipo_usuario" value="<?php echo htmlspecialchars($usuario['tipo_usuario']); ?>">
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php echo htmlspecialchars($usuario['senha']); ?>">
    </div>

    <button type="submit">Atualizar</button>
    <button type="reset">Limpar</button>
</form>

<div id="mensagem-alterar"></div>

<script>
$('#form-alterar-usuario').submit(function(e){
    e.preventDefault();

    const dados = $(this).serialize();

    $.post('updateUsuario.php', dados, function(resposta){
        $('#mensagem-alterar').html(resposta);
    });
});
</script>

<script>
    // evento delegado para garantir que funcione em conteúdo carregado dinamicamente
    $(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const cpf = $(this).data('cpf');

    $('#conteudo').load('alterarUsuario.php?cpf=' + encodeURIComponent(cpf));
});
</script>