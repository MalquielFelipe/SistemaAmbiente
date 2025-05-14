<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ambiente</title>
    <link rel="stylesheet" href="estiloAmbiente.css"/>
</head>
<body>
<?php
    include("conexao.php");

    $sql = "SELECT * FROM tb_bloco_ambiente";
    $result = $conexao->query($sql);
?>
    <form name="ambiente" id="ambiente" method="post" action="cadastroAmbiente2.php">
        <h2>Cadastro de Ambiente</h2>

        <div>
            <label for="nome">Título:</label>
            <input name="nome" id="nome" type="text" placeholder="Digite o nome do ambiente" required/>
        </div>

        <div>
            <label for="tipo">Tipo de ambiente:</label>
            <input type="text" name="tipo" id="tipo" required/>
        </div>

        <div>
            <label for="capacidade">Capacidade da sala:</label>
            <input type="number" name="capacidade" id="capacidade" required min="1"/>
        </div>

        <div>
            <label for="id_bloco">Bloco:</label>
            <select name="id_bloco" id="id_bloco" required>
                <option value="">Selecione um bloco</option>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id_bloco"] . "'>" .
                            htmlspecialchars($row["descricao"]) . "</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum bloco encontrado</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <button type="submit" name="enviar" value="Cadastrar">Cadastrar</button>
            <button type="reset" name="limpar" value="Resetar">Limpar</button>
        </div>
    </form>
</body>
</html>
