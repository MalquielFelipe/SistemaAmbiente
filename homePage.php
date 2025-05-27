<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ambiente</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Ambiente</h1>
        <p>Faça sua Reserva</p>
    </header>

    <nav>
        <a href="#" id="link-home">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Cadastros</button>
            <div class="dropdown-content">
                <a href="#" id="link-ambiente">Ambiente</a>
                <a href="#" id="link-bloco">Bloco</a>
                <a href="#" id="link-reserva">Reserva</a>
                <a href="#" id="link-usuario">Usuário</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Consultas</button>
            <div class="dropdown-content">
                <a href="#" id="link-buscarReserva">Reserva</a>
                <a href="#" id="link-buscarAmbientes">Ambiente</a>
                <a href="#" id="link-buscarUsuario">Usuário</a>
                <a href="#" id="link-buscarBloco">Bloco</a>
            </div>
        </div>
    </nav>

    <div id="conteudo">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagens/senac1.jpg" class="d-block w-100" alt="Imagem 1">
                </div>
                <div class="carousel-item">
                    <img src="imagens/senac2.jpg" class="d-block w-100" alt="Imagem 2">
                </div>
                <div class="carousel-item">
                    <img src="imagens/senac3.jpg" class="d-block w-100" alt="Imagem 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
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
                    <p>Tenha uma experiência única.</p>
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

           
            $('#link-buscarBloco').click(function(e){
                e.preventDefault();
                $('#conteudo').load('buscarBloco.php');
            });
            $('#link-buscarUsuario').click(function(e){
                e.preventDefault();
                $('#conteudo').load('buscarUsuario.php');
            });
                $('#link-buscarAmbiente').click(function(e){
                e.preventDefault();
                $('#conteudo').load('buscarAmbiente.php');
            });
              $('#link-buscarReserva').click(function(e){
                e.preventDefault();
                $('#conteudo').load('buscarReserva.php');
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
