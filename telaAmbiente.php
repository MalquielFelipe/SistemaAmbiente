
   <?php
include("conexao.php");

$tiposSala = ['SALA_DE_AULA', 'LABORATORIO', 'BIBLIOTECA', 'AUDITORIO', 'SALA_DE_REUNIAO'];
$sql = "SELECT id_bloco, descricao FROM tb_bloco_ambiente";
$result = $conexao->query($sql);


?>
   <form name="cadAmbiante" id="cadAmbiante" method="post" action="cadastroAmbiente.php">
        <h2> Cadastro de Ambiente </h2>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
         <label for="tipo">Tipo de Sala:</label>
    <select name="tipo" id="tipo">
        <?php foreach ($tiposSala as $tipo): ?>
            <option value="<?= $tipo ?>"><?= ucwords(strtolower(str_replace('_', ' ', $tipo))) ?></option>
        <?php endforeach; ?>
    </select>
        
        <div>
            <label for="cap">Capacidade:</label>
            <input type="number" name="capacidade" id="capacidade" >
        </div>
        
       <div>
        <label for="id_bloco">Bloco:</label>
        <select name="id_bloco" id="id_bloco" required>
            <option value="">Selecione um Bloco</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row["id_bloco"]) . "'>" . htmlspecialchars($row["descricao"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
        </select>
    </div>


<br>    <button type="submit" name="enviar" value="cadastrar">Cadastrar</button>
        <button type="reset" name="limpar" value="resetar">Limpar</button>

    </form>
