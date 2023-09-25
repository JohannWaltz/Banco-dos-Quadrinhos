<?php
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}

echo "</div>";

?>
<form action="controllers/controller_usuario.php" method="POST">
        
        <input type="hidden" id='codusuario' name='codusuario' value="<?php echo $_SESSION['codusuario']; ?>">
        <p><label for="senha_antiga">Senha Antiga: </label><input type="password" name="senha_antiga" id="senha_antiga" required></p>
        <p><label for="senha_nova">Senha Nova: </label><input type="password" name="senha_nova" id="senha_nova" required></p>
        <p><label for="senha">Confirmação de Senha: </label><input type="password" name="senha" id="senha" required></p>
        <p> <input type="submit" name='botao' value="Alterar Senha">
       
</form>

<a href="index.php?p=alterar_senha_admin"> Se for Administrador clique aqui para alterar a Senha </a>
