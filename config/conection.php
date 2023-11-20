<?php

$servidor = "srv1078.hstgr.io";
$usuario = "u780901284_aquarela";
$senha = "Qm:Mdt:]3[";
$dbname = "u780901284_aquarela";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
} else {
    //echo "Conexao realizada com sucesso";
}
