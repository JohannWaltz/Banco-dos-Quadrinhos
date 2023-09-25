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


$query = "select * from administradores where status = true order by cod_pessoa";

$resultados=ConsultaSelectAll($query);


foreach($resultados as $linha) {

?>
<script src="funcoes.js"> </script>
<section>
<form action="controllers/controller_admin.php" method="post">
<p>ID: <?php echo $linha['cod_pessoa']; ?></p>
<input type ="hidden" name = "cod_pessoa" value="<?php echo $linha['cod_pessoa']?>">
<p>Nome:  <input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
<p>Email:<input type ="text" name = "email" value="<?php echo $linha['email']?>"></p>
<p>CPF:<input type ="text" name = "cpf" value="<?php echo $linha['cpf']?>"></p>
<p>CEP:<input type ="text" name = "cep" value="<?php echo $linha['cep']?>"></p>
<p>Logradouro:<input type ="text" name = "logradouro" value="<?php echo $linha['logradouro']?>"></p>
<p>Bairro:<input type ="text" name = "bairro" value="<?php echo $linha['bairro']?>"></p>
<p>Cidade:<input type ="text" name = "cidade" value="<?php echo $linha['cidade']?>"></p>
<p>Foto: <img src="imagens/<?php echo $linha['imagem'];?>" width='100px' height='100px'/></p>
<button type="submit" name="botao" value="Editar" onclick = "return confirma_edicao()"> Editar </button>
<button type="submit" name="botao" value="Excluir" onclick = "return confirma_excluir()"> Deletar </button> 
</form>                                                         
</section>

<?php
}
?>
<a href="index.php?p=form_cad_admin">Cadastrar novo Administrador</a>
<a href="index.php?p=listagem_usuario">Listagem de Usuário</a>
<a href="index.php?p=form_cad_quadrinho">Cadastro de Quadrinho</a>
<a href="index.php?p=listagem_quadrinhos_admin">Listagem de Quadrinhos</a>
<script type="text/javascript">
    <script src="funcoes_fetch.js"></script>
    <div id="texto"> </div>  



</script>
