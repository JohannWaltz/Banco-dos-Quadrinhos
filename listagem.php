<?php

require("controllers/funcoes_db.php");
$conexao=fazconexao();

$sql = "select codpessoa,nome from pessoa order by codpessoa";


$resultado = $fazconexao->query($sql);

$registro= $resultado->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($registro);

echo 'funcionou';


?>

