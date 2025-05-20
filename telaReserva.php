
<?php
    include("conexao.php");
    $sql = "select fk_ambiente, nome from tb_reserva";
    $result = $conexao->query($sql);
    ?>

    <form name="Tela Reserva" id="Tela de Reserva" method="post" action="">
        <h2> Cadastro de Reserva </h2>
        
        <div>
            <label for="Horario incial">Horário Inicial:</label>
            <input type="date" name="HorarioInicial" id="HorarioInicial" >
        </div>
        <div>
            <label for="Horario final">Horário final:</label>
            <input type="date" name="Horariofinal" id="Horariofinal">
        </div>
        fk_ambiente	fk_cpf
        <div>
            <label for="fk_ambiente">:</label>
            <select name="fk_ambiente" id="fk_ambiente" required>
            <option value="">Selecione um Ambiente</option>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row["id_autor"] . "'>" . htmlspecialchars($row["nome"]) . "</option>";
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
