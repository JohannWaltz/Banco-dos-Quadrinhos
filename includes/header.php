<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{

header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>
<object data="imagens/Logo.svg" width="200"> </object>
<h3> Bem Vindo <?php echo $_SESSION['nome']?> <a href="index.php?p=alterar_senha"> Alterar Senha </a> </h3>
<a href="index.php">Home</a>
<a href="index.php?p=listagem_quadrinho">Listagem de Quadrinho</a>
<a href="index.php?p=estante">Estante Virtual</a>
<a href="index.php?p=index_busca">Buscar Quadrinho</a>
<a onclick="history.back()" href="#">Voltar</a>
<a href="sair.php">Sair</a>