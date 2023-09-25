<?php
include("funcoes_db.php");
include("../email/envia_email.php");
session_start();
if($_POST['botao']=='Cadastrar'){
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$nome_arquivo=$_FILES['arquivo']['name'];  
	$tamanho_arquivo=$_FILES['arquivo']['size']; 
	$arquivo_temporario=$_FILES['arquivo']['tmp_name']; 
    $_SESSION["msg"]=''; //inicializa msg
	$array = array($email);

	$query ="select * from usuarios where email = ?";

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
		

	$array = array($nome, $email, $senha, $nome_arquivo);

	$query ="insert into usuarios (nome, email, senha, imagem) values (?, ?, ?, ?)";

	$retorno=fazConsulta($query,$array);
		
	if($retorno)
	{
             $hash=md5($email);
               $link="<a href='localhost/Johann_Atividade-Avaliativa-Etapa2/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
              $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";

               $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
               $assunto="Confirme seu cadastro";

               $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
        
               $_SESSION["msg"]= "Valide o Cadastro no email";

	}
	else
	{
		   $_SESSION["msg"].= 'Erro ao inserir <br>';
	}		

}

else
{

	$_SESSION["msg"].= 'Email já cadastrado <br>';
}

	header("Location:../login.php");
}

if($_POST['botao']=='Editar'){

    $codusuario= $_POST['codusuario'];
    $nome= $_POST['nome'];
    $email=$_POST['email'];
    
	  
    $query= "update usuarios set nome= ?, email = ? where codusuario = ?";
    
    $array = array($nome, $email, $codusuario);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]="Alteração Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]="Erro ao alterar";
	}


header("Location:../index.php?p=listagem_usuario");

}

 if($_POST['botao']=='Excluir'){

    $codusuario= $_POST['codusuario'];

    $query="delete from usuarios where codusuario = ?";


    $array = array($codusuario);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]= "Exclusão Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]= 'Erro ao excluir <br>';
	}

header("Location:../index.php?p=listagem_usuario");

}
#ALTERAR SENHA
// if(isset($_POST['alterarUsuarioSenha'])){
// 	$codusuario = $_POST['codusuario'];

// 	$senha = $_POST['senha']; 

// 	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);

// 	$array = array($senha_cript, $codusuario);
// 	alteraUusuarioSenha($conexao, $array);

// 	header('location:../../alterar_senha.php');
// }

if($_POST['botao']=='Logar')
{


	$email=$_POST["email"];
	$senha=$_POST["senha"];;

	if (!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios
	{
		 
	    $array = array($email);

		$query= "select * from usuarios where email=? and status=true";

		$resultado=ConsultaSelect($query,$array);
		if ($resultado) // testa se retornou uma linha de resultado da tabela usuario com email e senha válidos
		{
		if (password_verify($senha,$resultado['senha']))
		{
		$_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado
		$_SESSION["email"]=$email; // armazena na variável de sessão email o conteúdo do campo email do formulário
		$_SESSION["codusuario"]=$resultado['codusuario'];	

		$_SESSION["nome"]=$resultado['nome'];

		$data=date("d/m/Y h:i:s");

		 $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";
          $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

		   $mensagem.="Bem Vindo ".$_SESSION["nome"]." Seu login foi realizado em ".$data."</td></tr>";

		$assunto="checkin Sistema";

		$retorno= enviaEmail($email,$nome,$mensagem,$assunto);	
		header("Location:../index.php"); // direciona para o index
	     }
	     else
	     {
	     	$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela usuario com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../login.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
	     }
		}
		else
		{
			$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela usuario com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../login.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
		}
	}
	else // else correspondente ao resultado da função !empty 
	{
		$_SESSION["msg"]="Preencha campos email e senha"; // caso contrário, ou seja, os campos do formulário email e senha estejam vazios, a mensagem é armazenada na variável msg
		header("Location:../login.php"); // o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida
	}
}

if($_POST['botao'] == 'Alterar Senha'){
	
	$codusuario = $_POST['codusuario'];
	$senha_nova  = $_POST['senha_nova'];
	$senha_antiga = $_POST['senha_antiga'];


	$sql = 'select senha from usuarios where codusuario = ?';
	$array = array($codusuario);
	$resultado = ConsultaSelect($sql, $array);


	if($resultado){

		if(password_verify($senha_antiga,$resultado['senha'])){
			$sql = 'update usuarios set senha = ? where codusuario = ?';
			$senha_nova = password_hash($_POST['senha_nova'], PASSWORD_DEFAULT);
			$array = array($senha_nova,$codusuario);
			$retorno = fazConsulta($sql,$array);
		
		
			if($retorno){
				$_SESSION['msg'] = 'Alteração realizada com sucesso';
				header('location:../login.php');
			}
			else{
				$_SESSION['msg'] = 'Houve algum problema na alteração';
				header('location:../index.php?p=alterar_senha');
			}

		}

	}else{
		$_SESSION['msg'] = 'Senha errada';
		header('location:../index.php?p=alterar_senha');
	}

	



}


