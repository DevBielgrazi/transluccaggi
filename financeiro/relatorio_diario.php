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
        <back>
        	<a href="form_relatorio_diario.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
#VARIÁVEIS DO FORMULÁRIO
$dat_rel = trim($_POST['dat_rel']);

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
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `emissao` = '$dat_rel'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `entrada` = '$dat_rel'");
    }
    $sql = mysqli_fetch_array($sql);
    $val_mer = (float) $sql['val'];
    $fre_dis = ($por * $val_mer)/100;
    $fre_disg = $fre_disg+$fre_dis;
}
$fre_disg = number_format(($fre_disg), 2, '.', '');

$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'fre' FROM $tab_fre WHERE `data` = '$dat_rel'");
$sql = mysqli_fetch_array($sql);
$fre_mot = number_format(($sql['fre']), 2, '.', '');

$sal_men = $fre_disg - $fre_mot;
$sal_men = number_format(($sal_men), 2, '.', '');
?>
		<rf>
			<table border=1>
				<h1>RELATÓRIO DIÁRIO</h1>
				<tr>
					<td><h3>DATA</h3></td>
					<td><h3>VALOR FRETES</h3></td>
					<td><h3>CUSTO</h3></td>
					<td><h3>SALDO</h3></td>
					<td><h3>STATUS</h3></td>
				</tr>
                <tr>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $dat_rel));   ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$fre_disg;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$fre_mot;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$sal_men;    ?><nobr></h4></td>
<?php if($sal_men<0){?><td><h6><nobr>NEGATIVO</nobr></h6></td><?php
        }else{?><td><h7><nonr>POSITIVO</nobr></h7></td><?php
        }?>
				</tr>
			</table>
            <form method="post" action="..\graficos/grafico_mensal.php" target="_blank">
                <input type="hidden" name="dat_rel" value="<?php echo $dat_rel;?>">
                <td><nobr><input width="80" type="image" src="..\imagem/grafico.jpg" alt="submit"></td>
            </form>
        </rf>
        <fdc>
            <h1>FILTROS POR CIDADE</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_diario.php">
                            <input type="hidden" name="dat_rel" value="<?php echo $dat_rel;?>">
							<table>
                                <tr>
									<td><h4>DISTRIBUIDORA:<input type="radio" name="opc" value="dis"></h4></td>
									<td><select name="cod_dis">
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO REGISTROS DO BANCO
	while($i!=$n){
#CADASTROS POR COLUNA
		$v = mysqli_fetch_array($sql);
		?><option value=<?php	echo $v['codigo']	?>><?php	echo	$v['nome']	?></option><?php
#SOMANDO AO CONTADOR
		$i=$i+1;
	}
?>
                                        </select></td>
                                </tr>
							</table>
                            <tr>
                                <td><input class="inputb" type=submit value=VISUALIZAR></td>
                            </tr>
						</form>
					</td>
				</tr>
			</table>
        </fdc>
        <rdc>
			<table border=1>
				<h1>RELATÓRIO POR CIDADE</h1>
				<tr>
					<td><h3>CIDADE</h3></td>
					<td><h3>VALOR</h3></td>
					<td><h3>PORCENTAGEM</h3></td>
					<td><h3>VALOR KG</h3></td>
					<td><h3>VALOR VOLUME</h3></td>
				</tr>
                <tr>
<?php
    if(isset($_POST['opc'])){
        $cod_dis=$_POST['cod_dis'];
        if($cod_dis==1){
            $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `emissao`='$dat_rel' ORDER BY `cidade_cliente`");
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `emissao`='$dat_rel'");
        }else{
            $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `entrada`='$dat_rel' ORDER BY `cidade_cliente`");
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `entrada`='$dat_rel'"); 
        }
    }else{
        $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`!=1 AND `entrada`='$dat_rel' OR `cod_distribuidora`=1 AND `emissao`='$dat_rel' ORDER BY `cidade_cliente`");
        $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`!=1 AND `entrada`='$dat_rel' OR `cod_distribuidora`=1 AND `emissao`='$dat_rel'");
    }
        $sql2 = mysqli_fetch_array($sql2);
        $val_tot = number_format(($sql2['val']), 2, '.', '');
        #TRANSFORMANDO RESULTADO EM NÚMEROS
        $n = mysqli_num_rows($sql);
        #INICIANDO CONTADOR
        $i=0;
        #APRESENTANDO REGISTROS DO BANCO
        while($i!=$n){
        #CADASTROS POR COLUNA
            $v = mysqli_fetch_array($sql);
            $cid_nf = $v['cidade_cliente'];
            if(isset($_POST['opc'])){
                if($cod_dis==1){
                    $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`='$dat_rel'");  
                }else{
                    $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`='$dat_rel'");  
                }
            }else{
                $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`='$dat_rel' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`='$dat_rel'");
            }
            $sql3 = mysqli_fetch_array($sql3);
            $val_cid = number_format(($sql3['val']), 2, '.', '');
            $por_val = ($val_cid/$val_tot)*100;
            $por_val = number_format(($por_val), 2, '.', '');

            if(isset($_POST['opc'])){
                if($cod_dis==1){
                    $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`='$dat_rel'");  
                }else{
                    $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`='$dat_rel'");  
                }
            }else{
                $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`='$dat_rel' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`='$dat_rel'");
            }
            $sql4 = mysqli_fetch_array($sql4);
            $pes_cid = number_format(($sql4['pes']), 2, '.', '');
            $val_pes = $val_cid/$pes_cid;
            $val_pes = number_format(($val_pes), 2, '.', '');

            if(isset($_POST['opc'])){
                if($cod_dis==1){
                    $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`='$dat_rel'");  
                }else{
                    $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`='$dat_rel'");  
                }
            }else{
                $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`='$dat_rel' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`='$dat_rel'");
            }
            $sql5 = mysqli_fetch_array($sql5);
            $vol_cid = $sql5['vol'];
            $val_vol = $val_cid/$vol_cid;
            $val_vol = number_format(($val_vol), 2, '.', '');
    ?>
                    <td><h4><nobr><?php echo $cid_nf;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo "R$".$val_cid;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo $por_val."%";    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo "R$".$val_pes;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo "R$".$val_vol;    ?><nobr></h4></td>
                </tr>
<?php
            $i++;
        }
?>
            </table>
        </rdc>
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