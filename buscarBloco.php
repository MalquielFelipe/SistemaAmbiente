<form id="form-busca">
    <label for="busca">Buscar por bloco:</label>
    <input type="text" name="busca" id="busca" />
    <button type="submit">Buscar</button>
</form>

<div id="resultado-bloco"></div>

<script>
    $('#form-busca').submit(function(e){
        e.preventDefault();
        const busca = $('#busca').val();
        $.get('buscarBloco2.php', { busca: busca }, function(data){
            $('#resultado-bloco').html(data);
        });
    });
</script>
