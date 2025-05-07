
<?php

$servidor= "localhost";
$usuario= "root";
$senha="";
$dbname="db_ambiente";

$conexao= mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conexao){
die( " Falha na conexao do banco de dados"
.mysqli_connect_error());
}


 

?>