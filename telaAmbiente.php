
    <form name="cadAmbiante" id="cadAmbiante" method="post" action="">
        <h2> Cadastro de Ambientes </h2>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo">
        </div>
        
        <div>
            <label for="cap">Capacidade:</label>
            <input type="number" name="capacidade" id="capacidade" >
        </div>
        <div>
            <label for="bloco">Bloco:</label>
            <input type="text" name="bloco" id="bloco">
        </div>
       

        <button type="submit" name="enviar" value="cadastrar">Cadastrar</button>
        <button type="reset" name="limpar" value="resetar">Limpar</button>

    </form>
