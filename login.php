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

<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell aa">
          <object data="imagens/Logo.svg" width="200"></object>
        </div>
      </div>
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
      <div class="translucent-form-overlay">
        <form action="controllers/controller_usuario.php" method="POST">
          <h3>Login de Usuário</h3>
          <div class="row columns">
            <label>Email
              <input type="text" name="email" placeholder="Email" required>
            </label>
          </div>
          <div class="row columns">
            <label>Senha
              <input type="password" name="senha" placeholder="Senha" required>
            </label>
          </div>
          <input class="button" type="reset" name="botao" value="Limpar">
        <input class="button" type="submit" name="botao" value="Logar">
      </form>
      <script type="text/javascript">
      </script>
	  <a class="secondary button" href="form_cad_usuario.php">Novo Usuário</a>
      <a class="secondary button" href='login_admin.php'>Logar como Administrador </a>
      </div>
    </div>
  </div>  
</div>



<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>

<div id='msg'>
<?php 
if(isset($_SESSION['msg']))
{ 
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
?>
</div>