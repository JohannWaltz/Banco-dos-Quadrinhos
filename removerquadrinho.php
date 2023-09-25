<?php
    session_start();
    include "conecta.php";

    $codusuario=$_GET['codusuario'];
    $cod_livro=$_GET['cod_livro'];

    $sql="delete from estante where cod_livro=$cod_livro and codusuario=$codusuario";
    $resultado = mysqli_query($conexao,$sql);

    if($resultado){
      echo "Quadrinho removido da estante com sucesso.<br>";
   }
   else{
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }
    
    ?>
<a href="index.php?p=estante">Voltar</a>