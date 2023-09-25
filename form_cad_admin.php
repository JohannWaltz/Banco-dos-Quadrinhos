
<!DOCTYPE html>
<html>
<head>
<script src="javascript.js"> </script>
<script src="funcoes.js"> </script>
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/app.css">
</head>
<form action="controllers/controller_admin.php" method="POST" enctype="multipart/form-data">
<p>Nome: <input type="text" name="nome" required></p>
<p>Email : <input type="text" name="email" required></p>
<p>CPF : <input type="text" name="cpf" required></p>
<p>CEP : <input type="text" name="cep" id="cep" required></p>
<p>Logradouro : <input type="text" name="logradouro" id="logradouro" required></p>
<p>Bairro : <input type="text" name="bairro" id="bairro" required></p>
<p>Cidade : <input type="text" name="cidade" id="cidade" required></p>
<p>Senha : <input type="password" name="senha" required></p>
<p>Capa : <input type="file" name="arquivo" required></p>
<p><input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Cadastrar"></p>
</form>

<?php
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}
?>