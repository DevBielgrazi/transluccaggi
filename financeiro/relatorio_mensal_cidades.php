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
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
    <div class="bar">
			<div class="dropdown">
        		<img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
				<div id="myDropdown" class="dropdown-content">
					<a href="..\saida/form_saida_motorista.php"><img src=..\imagem/saida.png> >SAÍDA DE MOTORISTAS</img></a>
					<a href="..\saida/baixa_canhotos.php"><img src=..\imagem/baixa.png>>BAIXA DE CANHOTOS</a>
					<a href="..\saida/form_romaneio_cargas.php"><img src=..\imagem/romaneio.png>>ROMANEIO DE CARGAS</a>
					<a href="..\saida/registro_devolucao.php"><img src=..\imagem/devolucao.png>>REGISTRO DE DEVOLUÇÕES</a>
					<a href="..\saida/agendar_entrega.php"><img src=..\imagem/agendar.png>>AGENDAR ENTREGA</a>
					<a href="..\cadastro/cadastrar_nfs.php"><img src=..\imagem/cad_not.png>>CADASTRO NOTAS</a>
					<a href="..\cadastro/cadastrar_clientes.php"><img src=..\imagem/cad_cli.png>>CADASTRO CLIENTES</a>
					<a href="..\cadastro/cadastrar_distribuidoras.php"><img src=..\imagem/cad_dis.png>>CADASTRO DISTRIBUIDORAS</a>
					<a href="..\pesquisa/form_pesquisar_nfs.php"><img src=..\imagem/pes_not.png>>PESQUISAR NOTAS</a>
					<a href="..\pesquisa/form_pesquisar_clientes.php"><img src=..\imagem/pes_cli.png>>PESQUISAR CLIENTES</a>
					<a href="..\pesquisa/form_pesquisar_distribuidoras.php"><img src=..\imagem/pes_dis.png>>PESQUISAR DISTRIBUIDORAS</a>
					<a href="..\cadastro/cadastrar_motoristas.php"><img src=..\imagem/cad_mot.png>>CADASTRAR MOTORISTA</a>
					<a href="..\pesquisa/form_pesquisar_motoristas.php"><img src=..\imagem/pes_mot.png>>PESQUISAR MOTORISTA</a>
					<a href="..\financeiro/form_relatorio_diario.php"><img src=..\imagem/diario.png>>RELATÓRIO DIÁRIO</a>
					<a href="..\financeiro/form_relatorio_diario_cidades.php"><img src=..\imagem/cid_dia.png>>RELATÓRIO DIÁRIO CIDADES</a>
					<a href="..\financeiro/form_relatorio_mensal.php"><img src=..\imagem/mensal.png>>RELATÓRIO MENSAL</a>
					<a href="..\financeiro/form_relatorio_mensal_cidades.php"><img src=..\imagem/cid_mes.png>>RELATÓRIO MENSAL CIDADES</a>
					<a href="..\financeiro/form_relatorio_anual.php"><img src=..\imagem/anual.png>>RELATÓRIO ANUAL</a>
					<a href="..\financeiro/form_relatorio_anual_cidades.php"><img src=..\imagem/cid_ano.png>>RELATÓRIO ANUAL CIDADES</a>
					<a href="..\financeiro/form_frete_motoristas.php"><img src=..\imagem/fre_mot.png>>FRETE MOTORISTAS</a>
					<a href="..\financeiro/form_fechamento_distribuidoras.php"><img src=..\imagem/fec_dis.png>>FECHAMENTO DISTRIBUIDORAS</a>
					<a href="..\financeiro/form_fechamento_motoristas.php"><img src=..\imagem/fec_mot.png>>FECHAMENTO MOTORISTAS</a>
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
                <a href="form_relatorio_mensal_cidades.php"><img src="..\imagem/back.png" width=20%></a>
            </back>
            <logo>
                <a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
            </logo>
            <exit>
                <a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
            </exit>
		</div>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_rel = trim($_POST['ano_rel']);
$mes_rel = trim($_POST['mes_rel']);
$m = ltrim($mes_rel, '0');
$mes = [
    1 => "JANEIRO",
    2 => "FEVEREIRO",
    3 => "MARÇO",
    4 => "ABRIL",
    5 => "MAIO",
    6 => "JUNHO",
    7 => "JULHO",
    8 => "AGOSTO",
    9 => "SETEMBRO",
    10 => "OUTUBRO",
    11 => "NOVEMBRO",
    12 => "DEZEMBRO",
    ];

$dat_rel = $ano_rel."-".$mes_rel."-01";
$dat_rel2 = $ano_rel."-".$mes_rel."-31";

require('../connect.php');
?>
		<rd>
            <h1>FILTROS POR CIDADE</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_mensal_cidades.php">
                            <input autocomplete="off" type="hidden" name="ano_rel" value="<?php echo $ano_rel;?>">
                            <input autocomplete="off" type="hidden" name="mes_rel" value="<?php echo $mes_rel;?>">
							<table>
                                <tr>
									<td><h4>DISTRIBUIDORA:<input type="radio" name="opc" value="dis" checked></h4></td>
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
                                <td><input autocomplete="off" class="inputb" type=submit value=VISUALIZAR></td>
                            </tr>
						</form>
                        <form method="post" action="relatorio_mensal_cidades.php">
                            <input autocomplete="off" type="hidden" name="dat_rel" value="<?php echo $dat_rel;?>">
                            <input autocomplete="off" type="hidden" name="mes_rel" value="<?php echo $mes_rel;?>">
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value="VISUALIZAR DE TODAS AS DISTRIBUIDORAS"></td>
                            </tr>
                        </form>
					</td>
				</tr>
			</table>
			<table class="tableb" border=1>
				<h1>RELATÓRIO POR CIDADE(<?php   if(isset($_POST['opc'])){
                    $cod_dis=$_POST['cod_dis'];
                    $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
                    $v = mysqli_fetch_array($sql);
                    $distribuidora = $v['nome'];
                }else{
                    $distribuidora = "TOTAL";
                }
                    echo $distribuidora;
                ?>) - <?php echo $mes[$m];    ?></h1>
				<tr>
					<th><h3>CIDADE</h3></th>
					<th><h3>VALOR</h3></th>
					<th><h3>PORCENTAGEM</h3></th>
					<th><h3>VALOR KG</h3></th>
					<th><h3>VALOR VOLUME</h3></th>
				</tr>
                <tr>
<?php
    if(isset($_POST['cod_dis'])){
        if($cod_dis==1){
            $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2' ORDER BY `cidade_cliente`");
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");
        }else{
            $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' ORDER BY `cidade_cliente`");
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`='$cod_dis' AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2'"); 
        }
    }else{
        $sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `cod_distribuidora`!=1 AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' OR `cod_distribuidora`=1 AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2' ORDER BY `cidade_cliente`");
        $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora`!=1 AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' OR `cod_distribuidora`=1 AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");
    }
        $sql2 = mysqli_fetch_array($sql2);
        $val_tot = number_format(($sql2['val']), 2, '.', '');
        #TRANSFORMANDO RESULTADO EM NÚMEROS
        $n = mysqli_num_rows($sql);
        #INICIANDO CONTADOR
        $i=0;
        $dad_cid = [];
        $dad_nom = [];
        #APRESENTANDO REGISTROS DO BANCO
        while($i!=$n){
        #CADASTROS POR COLUNA
            $v = mysqli_fetch_array($sql);
            $cid_nf = $v['cidade_cliente'];
            if(isset($_POST['cod_dis'])){
                if($cod_dis==1){
                    $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");  
                }else{
                    $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2'");  
                }
            }else{
                $sql3 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");
            }
            $sql3 = mysqli_fetch_array($sql3);
            $val_cid = number_format(($sql3['val']), 2, '.', '');
            $por_val = ($val_cid/$val_tot)*100;
            $por_val = number_format(($por_val), 2, '.', '');

            if(isset($_POST['cod_dis'])){
                if($cod_dis==1){
                    $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");  
                }else{
                    $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2'");  
                }
            }else{
                $sql4 = mysqli_query($conn,"SELECT SUM(`peso`) as 'pes' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");
            }
            $sql4 = mysqli_fetch_array($sql4);
            if($sql4['pes']<=0){
                $val_pes = $val_cid;
            }else{
                $pes_cid = number_format(($sql4['pes']), 2, '.', '');
                $val_pes = $val_cid/$pes_cid;
            }
            $val_pes = number_format(($val_pes), 2, '.', '');

            if(isset($_POST['cod_dis'])){
                if($cod_dis==1){
                    $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");  
                }else{
                    $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`='$cod_dis' AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2'");  
                }
            }else{
                $sql5 = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `cidade_cliente`='$cid_nf' AND `cod_distribuidora`!=1 AND `entrada`>='$dat_rel' AND `entrada`<='$dat_rel2' OR `cidade_cliente`='$cid_nf' AND `cod_distribuidora`=1 AND `emissao`>='$dat_rel' AND `emissao`<='$dat_rel2'");
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
            $dad_cid[] = (float) $val_cid;
            $dad_nom[] = (string) $cid_nf;
        }

        $dad_cid = json_encode($dad_cid);
        $dad_nom = json_encode($dad_nom);
?>
            </table>
    </rd>
    <gra8>
        <h1>GRÁFICO DE <?php   if(isset($_POST['opc'])){
                    $cod_dis=$_POST['cod_dis'];
                    $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
                    $v = mysqli_fetch_array($sql);
                    $distribuidora = $v['nome'];
                }else{
                    $distribuidora = "TOTAL";
                }
                    echo $distribuidora;
                ?> - <?php echo $mes[$m];    ?></h1>
    </gra8>
    <gra7>
        <canvas width=800 height=400 id="grafico" style="background-color:white;"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
        <script type="text/javascript">
            var ctx = document.getElementById('grafico').getContext('2d');
            var chartGraph = new Chart(ctx,
            {
                type: "bar",
                data: {
                    labels: <?php echo $dad_nom; ?>,
                    datasets: [{
        label: 'VALOR CARGA',
        data: <?php echo $dad_cid; ?>,
        backgroundColor: [
            'green'
        ],
        borderColor: [
            'black'
        ],
        borderWidth: 1
    }]
                }
            }
            )
        </script>
    </gra7>
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