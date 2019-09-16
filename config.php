<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$dbname   = "teste";
        //teste utilizando (MySQLi Object-Oriented)
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
       //validando para sucesso ou falha
if ($conn->connect_error) {
    die("Conexão Não Realizada: " . $conn->connect_error);
}
echo "Conexão Realizada com Sucesso";
?>