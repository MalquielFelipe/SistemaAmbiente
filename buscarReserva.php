<form id="form-busca">
    <label for="busca">Buscar por Reserva:</label>
    <input type="text" name="busca" id="busca" />
    <button type="submit">Buscar</button>
</form>

<div id="resultado-Reserva"></div>

<script>
    $('#form-busca').submit(function(e){
        e.preventDefault();
        const busca = $('#busca').val();
        $.get('buscarReserva2.php', { busca: busca }, function(data){
            $('#resultado-Reserva').html(data);
        });
    });
</script>
