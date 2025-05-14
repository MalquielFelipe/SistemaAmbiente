<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Login do Ambiente</h2>

<?php if (!empty($erro)): ?>
    <p style="color:red;"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif;?>

    <form method="post" action = "login.php">
       <label> Email: </label>
        <input type ="email" name="email" required><br><br>

        <label>Senha:</label>
        <input type="password"name="senha" required><br><br>
       
        <input type="hidden" name="acao" value="login">
        <button type = "submit"> Entrar</button>
        
    </form>
    <p>Nao tem conta? <a href= "TelaAmbiente.html">Cadastre-se </a></p>

</body>
</html>