
<?php

include_once 'gerenciador/controle/GerenciadorPerfil.php';
include_once 'entidade/controle/EntidadePerfil.php';


$dsPerfil = $_POST['dsPerfil'];
$flAtivo = $_POST['flAtivo'];

$entPerfil = new EntidadePerfil();

$entPerfil->setDsPerfil($dsPerfil);
$entPerfil->setFlPerfil($flAtivo);

//echo "Descricao: ".$entPerfil->getDsPerfil()."<br/>";
//echo "FlAtivo: ".$entPerfil->getFlPerfil()."<br/>";

$gerPerfil = new GerenciadorPerfil();
//echo 'Testando gerneciador ...';
$gerPerfil->inserir($entPerfil);
//echo "Testando<br/>";
//echo $dsPerfil."<br/>";
//echo $flAtivo."<br/>";



/*


$entPerfil->setDsPerfil($_POST[dsPerfil]);
$entPerfil->setFlPerfil($_POST[flAtivo]);

$gerPerfil->inserir($entPerfil);

 */

?>
