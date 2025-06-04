
  <?php    $tipo_usuario = ['ESTUDANTE', 'PROFESSOR', 'ADMINISTRATIVO', 'PEDAGOGO', 'RECEPCAO'];?>
 <form name="formulario" id="TelaUsuario" method="post" action="cadastroUsuario.php" onsubmit="return validarFormulario()">

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
       
            <label for="tipo_usuario">Tipo de Usuário:</label>
    <select name="tipo_usuario" id="tipo_usuario">
        <?php foreach ($tipo_usuario as $tipo): ?>
            <option value="<?= $tipo ?>"><?= ucwords(strtolower(str_replace('_', ' ', $tipo))) ?></option>
        <?php endforeach; ?>
    </select>
        <div>
            <label for="senha">senha:</label>
            <input type="password" name="senha" id="senha">
        </div>

        <button type="submit" name="enviar" value="cadastrar">Cadastrar</button>
        <button type="reset" name="limpar" value="resetar">Limpar</button>

    </form>
    <script src="valida.js"></script>