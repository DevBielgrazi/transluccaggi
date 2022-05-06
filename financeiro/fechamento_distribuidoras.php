<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table class="tableb">
                <tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                <tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
                <tr><td><h2>CADASTROS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>PESQUISAS</h2></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>MOTORISTAS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
                <tr><td><h2>FINANCEIRO</h2></td></tr>
                <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
            </table>
        </menu>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_fec = trim($_POST['ano_fec']);
$mes_fec= trim($_POST['mes_fec']);
$dis_fec= trim($_POST['dis_fec']);

$dat_fec = $ano_fec."-".$mes_fec."-01";
$dat_fec2 = $ano_fec."-".$mes_fec."-31";

require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
if($dis_fec>1){
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$dis_fec' AND `entrada` >= '$dat_fec' AND `entrada` <= '$dat_fec2'");
}
else{
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$dis_fec' AND `emissao` >= '$dat_fec' AND `emissao` <= '$dat_fec2'");
}
$sql = mysqli_fetch_array($sql);
#VARIÁVEL DO BANCO
$val_mes = number_format(($sql['val']), 2, '.', '');

$sql2 = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$dis_fec'");
$sql2 = mysqli_fetch_array($sql2);
#VARIÁVEL DO BANCO
$nom_dis = $sql2['nome'];
?>
		<rf>
			<table border=1>
				<h1>FECHAMENTO DISTRIBUIDORAS</h1>
				<tr>
					<td><h3>DATA</h3></td>
					<td><h3>DISTRIBUIDORA</h3></td>
					<td><h3>VALOR</h3></td>
				</tr>
                <tr>
					<td><h4><nobr><?php echo $mes_fec."/".$ano_fec;   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $nom_dis;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo $val_mes;    ?><nobr></h4></td>
				</tr>
			</table>
</rf>
	</body>
</html>
<?php
    }
    
    else
    {
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
    }
}
?>