
<?php
    include("conexao.php");
    $sql = "select id_ambiente, nome from tb_ambiente";
    $result = $conexao->query($sql);

     $sql1 = "select cpf, nome from tb_usuario";
    $result = $conexao->query($sql1);
    ?>

    <form name="TelaReserva" id="TelaReserva" method="post" action="telaReserva.php">
        <h2> Cadastro de Reserva </h2>
          
        <div>
            <label for="cpf">Tipo:</label>
            <input type="text" name="tipo" id="tipo">
        </div>
        
        <div>
            <label for="Horario incial">Horário Inicial:</label>
            <input type="datetime-local" name="HorarioInicial" id="HorarioInicial" >
        </div>
        <div>
            <label for="Horario final">Horário final:</label>
            <input type="datetime-local" name="Horariofinal" id="Horariofinal">
        </div>
        
        
        <div>
            <label for="id_ambiente">Ambiente:</label>
            <select name="id_ambiente" id="id_ambiente" required>
            <option value="">Selecione um Ambiente</option>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row[""] . "'>" . htmlspecialchars($row["nome"]) . "</option>";
                }
            } else {
                echo "<option value=''>Nada encontrado!</option>";
            }
            ?>
            </select>
        </div>

        <div>
            <label for="cpf">Usuario:</label>
            <select name="cpf" id="cpf" required>
            <option value="">Selecione um Usuario</option>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row[""] . "'>" . htmlspecialchars($row["nome"]) . "</option>";
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
