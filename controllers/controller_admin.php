<?php
include("funcoes_db.php");
include("../email/envia_email.php");
session_start();
if($_POST['botao']=='Cadastrar'){
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$cpf=$_POST['cpf'];
	$cep=$_POST['cep'];
	$logradouro=$_POST['logradouro'];
	$bairro=$_POST['bairro'];
	$cidade=$_POST['cidade'];
	$nome_arquivo=$_FILES['arquivo']['name'];  
	$tamanho_arquivo=$_FILES['arquivo']['size']; 
	$arquivo_temporario=$_FILES['arquivo']['tmp_name']; 
    $_SESSION["msg"]=''; //inicializa msg
	$array = array($email);

	$query ="select * from administradores where email = ?";

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
		

	$array = array($nome, $email, $senha, $cpf, $cep, $logradouro, $bairro, $cidade, $nome_arquivo);

	$query ="insert into administradores (nome, email, senha, cpf, cep, logradouro, bairro, cidade, imagem) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$retorno=fazConsulta($query,$array);
		
	if($retorno)
	{
             $hash=md5($email);
               $link="<a href='localhost/Johann_Atividade-Avaliativa-Etapa2/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
              $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";

               $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
               $assunto="Confirme seu cadastro com Admin";

               $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
        
               $_SESSION["msg"]= "O novo administrador deve validar o Cadastro no email";

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

	header("Location:../index.php?p=listagem_admin");
}

if($_POST['botao']=='Editar'){

    $cod_pessoa= $_POST['cod_pessoa'];
    $nome= $_POST['nome'];
    $email=$_POST['email'];
    
	  
    $query= "update administradores set nome = ?, email = ? where cod_pessoa = ?";
    
    $array = array($nome, $email, $cod_pessoa);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]="Alteração Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]="Erro ao alterar";
	}


header("Location:../index.php?p=listagem_admin");

}

 if($_POST['botao']=='Excluir'){

    $cod_pessoa= $_POST['cod_pessoa'];

    $query="delete from administradores where cod_pessoa = ?";


    $array = array($cod_pessoa);

	$resultado=fazConsulta($query,$array);
	
	if($resultado)
	{
	   $_SESSION["msg"]= "Exclusão Efetuada com sucesso";
	}
	else
	{
	   $_SESSION["msg"]= 'Erro ao excluir <br>';
	}

header("Location:../index.php?p=listagem_admin");

}

if($_POST['botao']=='Logar'){


	$email=$_POST["email"];
	$senha=$_POST["senha"];;

	if (!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios
	{
		 
	    $array = array($email);

		$query= "select * from administradores where email=? and status=true";

		$resultado=ConsultaSelect($query,$array);
		if ($resultado) // testa se retornou uma linha de resultado da tabela administrador com email e senha válidos
		{
		if (password_verify($senha,$resultado['senha']))
		{
		$_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado
		$_SESSION["email"]=$email; // armazena na variável de sessão email o conteúdo do campo email do formulário
		$_SESSION["cod_pessoa"]=$resultado['cod_pessoa'];	

		$_SESSION["nome"]=$resultado['nome'];

		$data=date("d/m/Y h:i:s");

		 $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";
          $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

		   $mensagem.="Bem Vindo ".$_SESSION["nome"]." Seu login foi realizado em ".$data."</td></tr>";

		$assunto="checkin Sistema";

		$retorno= enviaEmail($email,$nome,$mensagem,$assunto);	
		header("Location:../index.php?p=listagem_admin"); // direciona para o index do admin
	     }
	     else
	     {
	     	$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela administradores com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../login_admin.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
	     }
		}
		else
		{
			$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela administridares com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
			header("Location:../login_admin.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
		}
	}
	else // else correspondente ao resultado da função !empty 
	{
		$_SESSION["msg"]="Preencha campos email e senha"; // caso contrário, ou seja, os campos do formulário email e senha estejam vazios, a mensagem é armazenada na variável msg
		header("Location:../login_admin.php"); // o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida
	}

	if($_POST['botao'] == 'Alterar Senha'){
	
		$cod_pessoa = $_POST['cod_pessoa'];
		$senha_nova  = $_POST['senha_nova'];
		$senha_antiga = $_POST['senha_antiga'];
	
	
		$sql = 'select senha from administradores where cod_pessoa = ?';
		$array = array($cod_pessoa);
		$resultado = ConsultaSelect($sql, $array);
	
	
		if($resultado){
	
			if(password_verify($senha_antiga,$resultado['senha'])){
				$sql = 'update administradores set senha = ? where cod_pessoa = ?';
				$senha_nova = password_hash($_POST['senha_nova'], PASSWORD_DEFAULT);
				$array = array($senha_nova,$cod_pessoa);
				$retorno = fazConsulta($sql,$array);
			
			
				if($retorno){
					$_SESSION['msg'] = 'Alteração realizada com sucesso';
					header('location:../login_admin.php');
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
}