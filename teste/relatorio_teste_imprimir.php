<?php
include_once("lib/adm.php");
sessao();
$tpl=new Template(DIR."tpl/relatorio_teste_imprimir.html");
$logo=mysql_fetch_array(mysql_query("SELECT `logo` FROM `empresa` WHERE `id` LIKE '$empresa'"));
$tpl->logo=$logo[0];
/*$limite_pagina=30;
$c=1;//Numero do item atual
$p=1;//Numero da pagina
$sql=mysql_query("SELECT * FROM `cargo` WHERE `empresa` LIKE '$empresa' ORDER BY `nome` ASC");
$tot_itens=mysql_num_rows($sql);
$ultima=ceil($tot_itens/$limite_pagina);
while($cargo=mysql_fetch_array($sql)){
	$tpl->nome=utf8_decode($cargo['nome']);
	$tpl->semana=$cargo['carga_dia'];
	$tpl->sab=$cargo['carga_sab'];
	$tpl->block('BLOCK_TESTE');
	$tpl->folha=$p;
	if($c<$limite_pagina){$c++;}else{
		$c=1;
		$p++;
		if($p>1){
			$tpl->block('BLOCK_QUEBRA');
		}
		$tpl->block('BLOCK_PAGINA');
	}
}
if($c!=1){
	$tpl->block('BLOCK_PAGINA');
}
$tpl->data=date('d/m/Y');
$tpl->hora=date('H:i:s');
$conteudo=$tpl->parse();
$destino='I';//D=Download, I=Visualizar
$cabecalho=cabecalho_relatorio();
$rodape=rodape_relatorio(1);
include_once("pdf/mpdf.php");
$pdf=new mPDF('','A4',10,'sans-serif',15,15,45,16,5,-5);
$pdf->SetHTMLHeader($cabecalho);
$pdf->SetHTMLFooter($rodape);
$pdf->WriteHTML($conteudo);
$pdf->Output('Relatorio_cargo_funcoes.pdf',$destino);
exit;
*/
$tpl->show();
?>
