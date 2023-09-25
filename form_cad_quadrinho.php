<h1> Banco dos Quadrinhos </h1>
<form action="controllers/controller_quadrinho.php" method="POST" enctype="multipart/form-data">
<p>Nome do quadrinho : <input type="text" name="nome" required></p>
<p>Sinopse : <input type="text" name="sinopse" required></p>
<p>Autor : <input type="text" name="autor" required></p>
<p>Preço : <input type="text" name="preço" required></p>
<p>Capa : <input type="file" name="arquivo" required></p>
<p><input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Cadastrar"></p>
</form>

<a href="index.php?p=form_cad_admin">Cadastrar novo Administrador</a>
<a href="index.php?p=listagem_usuario">Listagem de Usuário</a>
<a href="index.php?p=listagem_quadrinhos_admin">Listagem de Quadrinhos</a>
<?php
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}
?>