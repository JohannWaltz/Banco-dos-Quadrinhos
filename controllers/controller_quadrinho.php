<?php
include("funcoes_db.php");
include("../email/envia_email.php");
session_start();
if($_POST['botao']=='Cadastrar'){
	$nome=$_POST['nome'];
	$sinopse=$_POST['sinopse'];
	$autor=$_POST['autor'];
	$preço=$_POST['preço'];
	$nome_arquivo=$_FILES['arquivo']['name'];  
	$tamanho_arquivo=$_FILES['arquivo']['size']; 
	$arquivo_temporario=$_FILES['arquivo']['tmp_name']; 
    $_SESSION["msg"]=''; //inicializa msg
	$array = array($email);

    $query ="select * from quadrinhos where nome = ?";

	$linha=ConsultaSelect($query,$array);

	if(!$linha)
	{	

	if (move_uploaded_file($arquivo_temporario, "../imagens/$nome_arquivo"))
	{
			$_SESSION["msg"]= " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";
	}
	else
	{
		$_SESSION["msg"]= "Arquivo não pode ser copiado para o servidor.";
			$nome_arquivo='foto.png';

	}
		

	$array = array($nome, $sinopse, $autor, $preço, $nome_arquivo);

	$query ="insert into quadrinhos (nome, sinopse, autor, preço, imagem) values (?, ?, ?, ?, ?)";

	$retorno=fazConsulta($query,$array);
		
	if($retorno)
	{
            
        $_SESSION["msg"]= "Quadrinho cadastrado com sucesso";

	}
	else
	{
		   $_SESSION["msg"].= 'Erro ao inserir <br>';
	}		

}

else
{

	$_SESSION["msg"].= 'Quadrinho já cadastrado <br>';
}

	header("Location:../index.php?p=listagem_quadrinho");
}

if($_POST['botao']=='Editar'){

    $cod_livro= $_POST['cod_livro'];
    $nome= $_POST['nome'];
    $sinopse=$_POST['sinopse'];
	$autor=$_POST['autor'];
	$preço=$_POST['preço'];

    
	  
    $query= "update quadrinhos set nome= ?, sinopse = ?, autor = ?, preço = ?  where cod_livro = ?";
    
    $array = array($nome, $sinopse, $autor, $preço,  $cod_livro);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]="Alteração Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]="Erro ao alterar";
	}


header("Location:../index.php?p=listagem_quadrinho");

}

 if($_POST['botao']=='Excluir'){

    $cod_livro= $_POST['cod_livro'];

    $query="delete from quadrinhos where cod_livro = ?";

    $array = array($cod_livro);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]= "Exclusão Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]= 'Erro ao excluir <br>';
	}

header("Location:../index.php?p=listagem_quadrinho");

}

if ($_POST['botao']=='Adicionar Estante') {
    $codusuario= $_SESSION["codusuario"];
    $cod_livro=$_POST['cod_livro'];

    $query ="select * from estante where cod_livro = ?";

	$linha=ConsultaSelect($query);

	if(!$linha)
	{
    $array = array($codusuario, $cod_livro);
	$query="insert into estante (codusuario, cod_livro) values (?, ?)";
	$resultado=fazConsulta($query,$array);

    if($resultado)
	{
	   $_SESSION["msg"]="Quadrinho adicionado a estante com sucesso";
	}
	else
	{
	   $_SESSION["msg"]="Erro ao adicionar";
	}
}

else
{

	$_SESSION["msg"].= 'Quadrinho já cadastrado <br>';
}

    header("Location:../index.php?p=estante");
}

if ($_POST['botao']=='Removeritem') {
	$codestante=$_POST['codestante'];
    

    $query="delete from estante where codestante = ?";

    $array = array($codestante);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]= "Exclusão Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]= 'Erro ao excluir <br>';
	}

	header("Location:../index.php?p=estante");
}
?>


