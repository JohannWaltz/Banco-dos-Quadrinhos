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


$query = "select * from quadrinhos order by cod_livro";

$resultados=ConsultaSelectAll($query);


foreach($resultados as $linha) {

?>

<section>
<form action="controllers/controller_quadrinho.php" method="post">
<p>ID: <?php echo $linha['cod_livro']; ?></p>
<input type ="hidden" name = "cod_livro" value="<?php echo $linha['cod_livro']?>">
<p>Nome:  <input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
<p>Sinopse:<input type ="text" name = "sinopse" value="<?php echo $linha['sinopse']?>"></p> 
<p>Autor: <input type ="text" name = "autor" value="<?php echo $linha['autor']?>"></p>
<p>Preço: <input type="text" name="preço" value= "<?php echo $linha['preço']?>"></p> 
<p>Capa: <img src="imagens/<?php echo $linha['imagem'];?>" width='100px' height='200px'/></p>
<button type="submit" name="botao" value="Adicionar Estante"> Adicionar a Estante </button>

</form>                                                         
</section>
<?php
}
?>
<script type="text/javascript">
<script src="funcoes_fetch.js"></script>
<div id="texto"> </div>  
</script>