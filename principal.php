
<?php

include_once 'util/Validadores.php';

$validador = new Validadores();
$cpf = "32176534561";
$cnpj = "17282647000100"; //17282647000156";

echo "CPF => ";
var_dump( $validador->validarCPF($cpf) );

echo "<br/><br/> CNPJ =>";
var_dump( $validador->validarCNPJ($cnpj));


?>
