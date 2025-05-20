<?php
include("conexao.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM tb_usuario WHERE id_usuario = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $cpf = num('Y-m-d', strtotime($cpf['cpf']));
    } else {
        echo "usuario não encontrado";
        exit;
    }
} else {
    echo "ID não fornecido";
    exit;
}
?>
 <h2> Tela do Usuario </h2>
        <div>
            <label for="cpf">cpf:</label>
            <input type="text" name="cpf" id="cpf">
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        
        <div>
            <label for="Email">Email:</label>
            <input type="email" name="email" id="email" >
        </div>
        <div>
            <label for="Telefone">Telefone:</label>
            <input type="tel" name="telefone" id="telefone">
        </div>
        <div>
            <label for="Tipo_usuario">Tipo:</label>
            <input type="text" name="tipo_usuario" id="tipo_usuario">
        </div>
        <div>
            <label for="senha">senha:</label>
            <input type="password" name="senha" id="senha">
        </div>

        <button type="submit" name="enviar" value="cadastrar">Cadastrar</button>
        <button type="reset" name="limpar" value="resetar">Limpar</button>

        <form></form>