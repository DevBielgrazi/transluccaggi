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
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
            </div>
        </div>
        <script>
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_rel = trim($_POST['ano_rel']);

$dat_rel = $ano_rel."-01-01";
$dat_rel2 = $ano_rel."-12-31";

require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO

$sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
$n = mysqli_num_rows($sql);

$fre_disg = 0;
for($i=1; $i<$n; $i++){
    $sql = mysqli_query($conn,"SELECT `porcentagem` as 'por' FROM $tab_dis WHERE `codigo` = '$i'");
    $sql = mysqli_fetch_array($sql);
    $por = (float) $sql['por'];
    if($i==1){
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `emissao` >= '$dat_rel' AND `emissao` <= '$dat_rel2'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `entrada` >= '$dat_rel' AND `entrada` <= '$dat_rel2'");
    }
    $sql = mysqli_fetch_array($sql);
    $val_mer = (float) $sql['val'];
    $fre_dis = ($por * $val_mer)/100;
    $fre_disg = $fre_disg+$fre_dis;
}
$fre_disg = number_format(($fre_disg), 2, '.', '');

$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'fre' FROM $tab_fre WHERE `data` >= '$dat_rel' AND `data` <= '$dat_rel2'");
$sql = mysqli_fetch_array($sql);
$fre_mot = number_format(($sql['fre']), 2, '.', '');

$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` >= '$dat_rel' AND `mes` <= '$dat_rel2'");
$sql = mysqli_fetch_array($sql);
$cus_men = number_format(($sql['cus']), 2, '.', '');
$cus_men = $cus_men+$fre_mot;

$sal_men = $fre_disg - $cus_men;
$sal_men = number_format(($sal_men), 2, '.', '');

?>
		<rf>
			<table border=1>
				<h1>RELATÓRIO ANUAL</h1>
				<tr>
					<td><h3>ANO</h3></td>
					<td><h3>VALOR FRETES</h3></td>
					<td><h3>CUSTOS</h3></td>
					<td><h3>SALDO</h3></td>
					<td><h3>STATUS</h3></td>
				</tr>
                <tr>
					<td><h4><nobr><?php echo $ano_rel;   ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$fre_disg;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$cus_men;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$sal_men;    ?><nobr></h4></td>
<?php if($sal_men<0){?><td><h6><nobr>NEGATIVO</nobr></h6></td><?php
        }else{?><td><h7><nonr>POSITIVO</nobr></h7></td><?php
        }?>
				</tr>
			</table>
        <form method="post" action="..\graficos/grafico_geral.php" target="_blank">
            <input type="hidden" name="dat_rel" value="<?php echo $dat_rel;?>">
            <td><nobr><input width="80" type="image" src="..\imagem/grafico.jpg" alt="submit"></td>
        </form>
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