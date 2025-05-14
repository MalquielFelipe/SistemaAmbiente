codigo CadastroAmbiente.php

<?php

//verificar se os campos não nulos
    if(isset($_POST['nome']) && isset($_POST['capacidade']) &&
        isset($_POST['Bloco']) && isset($_POST['Ambiente']) &&
        isset($_POST['nome'])&& isset($_POST['tipo']) ){
            $capacidade = $_POST['capacidade'];
            $Bloco = $_POST['Bloco'];
            $ambiente = $_POST['Ambiente'];
            $tipo = $_POST['tipo'];
        
        }
    echo "<h3> Dados do Ambiente </h3>";
    echo "<ul> <li> <b> Nome:</b> $nome </li>";      
    echo " <li> <b> capacidade:</b> $cpf </li>";  
    echo " <li> <b> ambiente:</b> $salambiente </li>";  
    echo " <li> <b> bloco:</b> $blocco </li>";  
    
        

?>