
    <form name="TealUsuario" id="TelaUsuario" method="post" action="cadastroUsuario.php">

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

    </form>
