<form id="form-busca">
    <label for="busca">Buscar Ambiente:</label>
    <input type="text" name="busca" id="busca" />
    <button type="submit">Buscar</button>
</form>

<div id="resultado-ambiente"></div>

<script>
    $('#form-busca').submit(function(e){
        e.preventDefault();
        const busca = $('#busca').val();
        $.get('buscarAmbiente2.php', { busca: busca }, function(data){
            $('#resultado-ambiente').html(data);
        });
    });
</script>


