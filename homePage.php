<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ambiente </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <h1>Ambiente </h1>
        <p>Faça sua Reserva</p>
    </header>

    <nav>
        <a href="#" id="link-home">Home</a>
        <a href="#" id="link-ambiente">Ambiente</a>
        <a href="#" id="link-bloco">Bloco</a>
        <a href="#" id="link-reserva">Reserva</a>
        <a href="#" id="link-usuario">Usuario</a>
    </nav>

    <div id="conteudo">
        <h2>Bem-vindo!</h2>
        <p>Tenha uma esperiência única.</p>
    </div>

    <footer>
        &copy; 2025 Reserva de Ambiente
    </footer>

    <script>
        $(document).ready(function(){
            $('#link-home').click(function(e){
                e.preventDefault();
                $('#conteudo').html(`
                    <h2>Bem-vindo!</h2>
                    <p>tenha uma experiencia unica.</p>
                `);
            });

            $('#link-ambiente').click(function(e){
                e.preventDefault();
                $('#conteudo').load('telaAmbiente.php');
            });

            $('#link-bloco').click(function(e){
                e.preventDefault();
                $('#conteudo').load('telaBloco.php');
            });

            $('#link-reserva').click(function(e){
                e.preventDefault();
                $('#conteudo').load('telaReserva.php');
            });

            $('#link-usuario').click(function(e){
                e.preventDefault();
                $('#conteudo').load('telaUsuario.php');
            });
        });
    </script>
</body>
</html>