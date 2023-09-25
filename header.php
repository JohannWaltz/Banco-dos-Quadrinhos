<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{

header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>
<h1> Título do Site </h1>
<h3> Bem Vindo <?php echo $_SESSION['nome']?> <a href="alterar_senha.php"> Alterar Senha </a> </h3>
<a href="index.php">Home</a>
<a href="index.php?p=listagem_usuario">Listagem de Usuário</a>
<a href="index.php?p=form_cad_produto">Cadastro de Produto</a>
<a href="index.php?p=listagem_produto">Listagem de Produto</a>
<a href="sair.php">Sair</a>