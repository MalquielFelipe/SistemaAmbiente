<form id="form-busca">
    <label for="busca">Buscar por nome:</label>
    <input type="text" name="busca" id="busca" />
    <button type="submit">Buscar</button>
</form>

<div id="resultado-usuario"></div>

<script>
    $('#form-busca').submit(function(e){
        e.preventDefault();
        const busca = $('#busca').val();
        $.get('buscarUsuario2.php', { busca: busca }, function(data){
            $('#resultado-usuario').html(data);
        });
    });
</script>
