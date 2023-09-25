<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<script src="javascript.js"> </script>
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/app.css">
<style>
body {
  background-image: url('imagens/desktop-wallpaper-modern-comic-book-superhero-pattern-black-white-grey-fabric-feminist-black-and-white.jpg');
}
</style>
</head>

<script src="funcoes.js"> </script>
<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell aa">
            <object data="imagens/Logo.svg" width="200"> </object>
        </div>
    </div>
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <div class="translucent-form-overlay">
                <form action="controllers/controller_usuario.php" method="POST" enctype="multipart/form-data">
                <h3>Cadastrar Usuário</h3>
                <div class="row columns">
                 <label>Nome 
                    <input type="text" name="nome" placeholder="Nome" required>
                 </label>
            </div>
            <div class="row columns">  
                <label>Email 
                    <input type="text" name="email" placeholder="Email" required></p>
                <label>
            </div>
            <div class="row columns">  
                <label>Senha
                    <input type="password" name="senha" placeholder="Senha" required></p>
                <label>
            </div>
            <div class="row columns">  
                <label>Foto 
                    <input type="file" name="arquivo" required></p>
                <label>
            </div>
            <input class="button" type="reset" name="botao" value="Limpar">
        <input class="button" type="submit" name="botao" value="Cadastrar">
      </form>
      <a class="secondary button" href="login.php">Voltar</a>
      <script type="text/javascript">
      </script>
      </div>
    </div>
  </div>  
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
<?php
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}
?>
