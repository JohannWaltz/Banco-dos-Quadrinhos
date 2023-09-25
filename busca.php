<?php
if (!isset($_GET['nome_quadrinho'])) {
	header("Location: index_busca.php");
	exit;
}
 
$nome = "%".trim($_GET['nome_quadrinho'])."%";
 
$dbh = new PDO('mysql:host=127.0.0.1;dbname=johanndb', 'root', '');
 
$sth = $dbh->prepare('SELECT * FROM `quadrinhos` WHERE `nome` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();
 
$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Resultado da busca</title>
</head>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
    ?>
    <div><img src="imagens/<?php echo $Resultado['imagem'];?>" width='100px' height='150px'/> - <?php echo $Resultado['cod_livro']; ?> - <?php echo $Resultado['nome']; ?> - <?php echo $Resultado['preço']; ?></div>
    <br>
    <?php
} }else{
?>
<label>Não foram encontrados resultados pelo termo buscado.</label>
<?php
}
?>


<a href='index.php?p=index_busca'>Voltar</a></br>
</body>
</html>