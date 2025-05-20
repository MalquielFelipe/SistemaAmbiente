<?php
include("conexao.php");

if (isset($_GET['cpf']) && !empty($_GET['cpf'])) {
    $cpf = mysqli_real_escape_string($conexao, $_GET['cpf']);
    $sql = "SELECT * FROM tb_usuario WHERE cpf = '$cpf'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "CPF não fornecido.";
    exit;
}
?>

<h2>Alterar Usuário</h2>

<form method="post" action="updateUsuario.php">
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" readonly>
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

    <button type="submit" name="enviar" value="atualizar">Atualizar</button>
    <button type="reset">Limpar</button>
</form>
