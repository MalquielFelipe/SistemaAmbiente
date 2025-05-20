<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cliente</title>
    <link rel="stylesheet" href="estiloDeCadastro.css" />
</head>
<body>

    <h2>Busca de Cliente</h2>

    <form method="get" action="buscarUsuario.php">
        <label for="busca">Buscar por nome:</label>
        <input type="text" name="busca" id="busca" placeholder="Informe o nome do usuario" />
        <button type="submit">Buscar</button>
    </form>

    <?php 
    if (isset($_GET['busca'])) {
        include("conexao.php");

        $busca = mysqli_real_escape_string($conexao, trim($_GET['busca']));

        $sql = "SELECT * FROM tb_usuario WHERE nome LIKE '%$busca%'";
        $resultado = $conexao->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>tipo_usuario</th>
                      <th>senha</th> 
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>";

            while ($row = $resultado->fetch_assoc()) {
                $cpf = htmlspecialchars($row['cpf']);
                $nome = htmlspecialchars($row['nome']);
                $email = htmlspecialchars($row['email']);
                $telefone = htmlspecialchars($row['telefone']);
                $tipo_usuario = htmlspecialchars($row['tipo_usuario']);
                $senha = htmlspecialchars($row['senha']);
                     echo "<tr>
                        <td>{$cpf}</td>
                        <td>{$nome}</td> 
                        <td>{$email}</td>
                        <td>{$telefone}</td>
                        <td>{$tipo_usuario}</td>
                        <td>{$senha}</td>
                        <td><a href='alterausuario.php?cpf={$cpf}'>Alterar</a></td>
                        <td><a href='excluirusuario.php?cpf={$cpf}' onclick=\"return confirm('Deseja realmente excluir este usuario?')\">Excluir</a></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum cliente encontrado.</p>";
        }
    }
    ?>

</body>
</html>
