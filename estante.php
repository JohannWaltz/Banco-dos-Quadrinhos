<?php
require("controllers/funcoes_db.php");
$conexao=fazconexao();
include "includes/conecta.php";
echo "<div id='msg'>";

if(isset($_SESSION['msg']))
{ 
    echo "<br><br>".$_SESSION['msg']."<br><br>";
    unset($_SESSION['msg']);
}

echo "</div>";
    
    
    $codusuario= $_SESSION["codusuario"];

    $aux=0;

    $sql="select * from estante join quadrinhos using (cod_livro) where codusuario=$codusuario";

    $resultado = $conexao->query($sql);
    while($linha=mysqli_fetch_assoc($resultado)){
        $aux++;
        ?>
        <fieldset>
        <form action="controllers/controller_quadrinho.php" method="post">
            <input type="text" name = "codestante" value="<?php echo $linha['codestante']?>">
            <p>Quadrinho: <?php echo $linha['nome']?></p>
            <p><img src="imagens/<?php echo $linha['imagem'];?>" width='200px' height='400px'/></p>
            <p>Preço: <?php echo $linha['preço']?></p>
            <button type="submit" name="botao" value="Removeritem"> Remover </button>
        </form>
        </fieldset>
        
        <?php    
    }
    if($aux==0){
        echo "Estante vazia";
    }
?>