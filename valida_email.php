<?php
session_start();
include("controllers/funcoes_db.php");
if($_GET['h']){
	$h=$_GET['h'];
    $_SESSION["msg"]=''; //inicializa msg
	

	$array = array($h);

	$query ="select * from pessoa where md5(email) = ?";

	$linha=ConsultaSelect($query,$array);

	if($linha)
	{

		$array=array($linha['codpessoa']);

		$query ="update pessoa set status=true where codpessoa = ?";

		$retorno=fazConsulta($query,$array);
		
		if($retorno)
		{
			
		
			   $_SESSION["msg"]= "Cadastro Validado - Entre com seu email e senha";

		}
		else
		{
			   $_SESSION["msg"]= 'Problema na validação';
			   
		}	
	}

	else
	{
		$_SESSION["msg"]= 'Problema na validação';
	}	

header("Location:login.php");
	
}
