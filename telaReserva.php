<?php
include("conexao.php");

// Buscar ambientes
$sql = "SELECT id_ambiente, nome FROM tb_ambiente";
$result = $conexao->query($sql);

// Buscar usuários
$sql1 = "SELECT cpf, nome FROM tb_usuario";
$result1 = $conexao->query($sql1);
?>

<form name="formulario" id="TelaReserva" method="post" action="cadastroReserva.php" onsubmit="return validarHorario()">
    <h2>Cadastro de Reserva</h2>

    <div>
        <label for="HorarioInicial">Horário Inicial:</label>
        <input type="datetime-local" name="HorarioInicial" id="HorarioInicial">
    </div>

    <div>
        <label for="Horariofinal">Horário Final:</label>
        <input type="datetime-local" name="Horariofinal" id="Horariofinal">
    </div>

    <div>
        <label for="id_ambiente">Ambiente:</label>
        <select name="id_ambiente" id="id_ambiente" required>
            <option value="">Selecione um Ambiente</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row["id_ambiente"]) . "'>" . htmlspecialchars($row["nome"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="cpf">Usuário:</label>
        <select name="cpf" id="cpf" required>
            <option value="">Selecione um Usuário</option>
            <?php
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row["cpf"]) . "'>" . htmlspecialchars($row["nome"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="enviar" value="cadastrar">Cadastrar</button>
    <button type="reset" name="limpar" value="resetar">Limpar</button>
</form>

<script src="valida.js"></script>
