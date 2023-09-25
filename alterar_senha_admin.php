<?php
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}

echo "</div>";

?>
<form action="controllers/controller_admin.php" method="POST">
        
        <input type="hidden" id='cod_pessoa' name='cod_pessoa' value="<?php echo $_SESSION['cod_pessoa']; ?>">
        <p><label for="senha_antiga">Senha Antiga: </label><input type="password" name="senha_antiga" id="senha_antiga" required></p>
        <p><label for="senha_nova">Senha Nova: </label><input type="password" name="senha_nova" id="senha_nova" required></p>
        <p><label for="senha">Confirmação de Senha: </label><input type="password" name="senha" id="senha" required></p>
        <p> <input type="submit" name='botao' value="Alterar Senha">
       
</form>