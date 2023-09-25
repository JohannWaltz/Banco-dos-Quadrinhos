<?php
$conexao = mysqli_connect('localhost', 'root', '','johanndb');// conexão pelo método procedural - pela utilização de uma função
mysqli_set_charset($conexao,"utf8");

if (!$conexao) {
    die('Não foi possível conectar: ' . mysql_error()); // função que mostra os erros de sql da conexão
}
?>