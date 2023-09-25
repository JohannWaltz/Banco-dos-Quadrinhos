<?php
require("controllers/funcoes_db.php");
$conexao=fazconexao();

echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}

echo "</div>";


$query = "select * from usuarios where status = true order by codusuario";

$resultados=ConsultaSelectAll($query);


foreach($resultados as $linha) {

?>

<section>
<form action="controllers/controller_usuario.php" method="post">
<p>ID: <?php echo $linha['codusuario']; ?></p>
<input type ="hidden" name = "codusuario" value="<?php echo $linha['codusuario']?>">
<p>Nome:  <input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
<p>Email:<input type ="text" name = "email" value="<?php echo $linha['email']?>"></p>
<p>Foto: <img src="imagens/<?php echo $linha['imagem'];?>" width='100px' height='100px'/></p>
<button type="submit" name="botao" value="Editar" onclick = "return confirma_edicao()"> Editar </button>
<button type="submit" name="botao" value="Excluir" onclick = "return confirma_excluir()"> Deletar </button> 
</form>                                                         
</section>
<?php
}
?>

<a href="index.php?p=form_cad_admin">Cadastrar novo Administrador</a>
<a href="index.php?p=listagem_admin">Listagem de Administradores</a>
<a href="index.php?p=form_cad_quadrinho">Cadastro de Quadrinho</a>
<a href="index.php?p=listagem_quadrinhos_admin">Listagem de Quadrinhos</a>

<script type="text/javascript">
    <script src="funcoes_fetch.js"></script>
    <div id="texto"> </div>  



</script>


