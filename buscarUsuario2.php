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
                <th>Tipo</th>
                <th>Senha</th>
                <th>Alterar</th>
                <th>Excluir</th>
              </tr>";

        while ($row = $resultado->fetch_assoc()) {
            $cpf = htmlspecialchars($row['cpf']);
            echo "<tr>
                    <td>{$cpf}</td>
                    <td>" . htmlspecialchars($row['nome']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['telefone']) . "</td>
                    <td>" . htmlspecialchars($row['tipo_usuario']) . "</td>
                    <td>" . htmlspecialchars($row['senha']) . "</td> 
                    <td>
                    <td> <a href='alterarUsuario.php' class='alterar-link' data-cpf='" . htmlspecialchars($cpf) . "'>Alterar</a></td>

                    <td><a href='excluirUsuario.php?cpf=" . urlencode($cpf) . "' onclick=\"return confirm('Deseja realmente excluir este usuário?')\">Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum cliente encontrado.</p>";
    }
}
?>
<script>
    // evento delegado para garantir que funcione em conteúdo carregado dinamicamente
    $(document).on('click', '.alterar-link', function(e){
    e.preventDefault(); // impede o redirecionamento
    const cpf = $(this).data('cpf');

    $('#conteudo').load('alterarUsuario.php?cpf=' + encodeURIComponent(cpf));
});
</script>