<?php
include_once("lib/adm.php");
sessao();
logsys('Priplan - Receituario controle especial');
$tpl=new Template(DIR."tpl/relatorio_teste.html");
$tpl->id=$_GET['id'];
$tpl->show();
?>
