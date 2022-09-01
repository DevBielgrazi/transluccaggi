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
                <a href="form_relatorio_diario.php"><img src="..\imagem/back.png" width=20%></a>
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
		<rd>
			<table class="tableb" border=1>
				<h1>RELATÓRIO DIÁRIO</h1>
				<tr>
					<th><h3>DATA</h3></th>
					<th><h3>VALOR FRETES</h3></th>
					<th><h3>CUSTO</h3></th>
					<th><h3>SALDO</h3></th>
					<th><h3>STATUS</h3></th>
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
        </rd>
        <rdc>
			<table class="tableb" border=1>
				<h1>RELATÓRIO POR DISTRIBUIDORA</h1>
				<tr>
					<th><h3>CÓDIGO</h3></th>
					<th><h3>DISTRIBUIDORA</h3></th>
					<th><h3>VALOR</h3></th>
					<th><h3>VALOR FRETES</h3></th>
					<th><h3>PORCENTAGEM</h3></th>
				</tr>
                <tr>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
    $n = mysqli_num_rows($sql);
    $dad_dis = [];
    $dad_nom = [];
    for($i=1;$i<=$n;$i++){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$i'");
        $v = mysqli_fetch_array($sql);
        $nom_dis = $v['nome'];
        $cod_dis = $v['codigo'];
        if($i==1){
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `emissao` = '$dat_rel'");
        }else{
            $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `entrada` = '$dat_rel'");
        }
        $vn = mysqli_fetch_array($sql2);
        $val_dis = number_format(($vn['val']), 2, '.', '');
        $por_fre = $v['porcentagem']/100;
        $fre_dis = number_format(($por_fre*$val_dis), 2, '.', '');
        if($fre_disg>0){
            $por_dis = number_format((($fre_dis/$fre_disg)*100), 2, '.', '');
        }else{
            $por_dis = 0;
        }
    ?>
                    <td><h4><nobr><?php echo $cod_dis;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo $nom_dis;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo "R$".$val_dis;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo "R$".$fre_dis;    ?><nobr></h4></td>
                    <td><h4><nobr><?php echo $por_dis."%";    ?><nobr></h4></td>
                </tr>
<?php
        $dad_dis[]= (float) $fre_dis;
        $dad_nom[]= (string) $cod_dis;
    }
?>
            </table>
        </rdc>
<?php
    function frete($dat_rel,$dat_rel2){
        require('../connect.php');
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
        return $fre_disg;
    }

    function custo_mensal($dat_rel,$dat_rel2){
        require('../connect.php');
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` >= '$dat_rel' AND `mes` <= '$dat_rel2'");
        $sql = mysqli_fetch_array($sql);
        $custo = number_format(($sql['cus']), 2, '.', '');
        $custo = ($custo/31);
        return $custo;
    }
    
    function custo($dat_rel,$dat_rel2,$custo){
        require('../connect.php');
        $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'fre' FROM $tab_fre WHERE `data` >= '$dat_rel' AND `data` <= '$dat_rel2'");
        $sql = mysqli_fetch_array($sql);
        $fre_mot = number_format(($sql['fre']), 2, '.', '');
        $cus_men = $custo+$fre_mot;
        $cus_men = number_format(($cus_men), 2, '.', '');
        return $cus_men;
    }
    
    function saldo($fre_disg,$cus_men){
        $sal_men = $fre_disg - $cus_men;
        $sal_men = number_format(($sal_men), 2, '.', '');
    
        return $sal_men;
    }

    $frete = [];
    $custo = [];
    $saldo = [];
    $ano_rel = date('Y', strtotime( $dat_rel));
    $m = date('m', strtotime( $dat_rel));
    $c = $m-1;

    for($i=1;$i<=31;$i++){        
        $frete[] = (float) frete($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i);
    }

    for($i=1;$i<=31;$i++){        
        $custo[] = (float) custo($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i,custo_mensal($ano_rel."-0".$c."-01",$ano_rel."-0".$c."-01"));
    }

    for($i=1;$i<=31;$i++){        
        $saldo[] = (float) saldo(frete($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i),custo($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i,custo_mensal($ano_rel."-0".$c."-01",$ano_rel."-0".$c."-01")));
    }

    $mes_rel = [
        1 => "JANEIRO",
        2 => "FEVEREIRO",
        3 => "MARCO",
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
        
    $m = ltrim($m, "0");
    $frete = json_encode($frete);
    $custo = json_encode($custo);
    $saldo = json_encode($saldo);
    $dad_dis = json_encode($dad_dis);
    $dad_nom = json_encode($dad_nom);

?>      
        <gra2>
            <h1>GRÁFICO DE <?php echo $mes_rel[$m]; ?></h1>
        </gra2>
        <gra>
            <canvas width=700 height=350 id="grafico" style="background-color:white;"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
            <script type="text/javascript">
                var ctx = document.getElementById('grafico').getContext('2d');
                var chartGraph = new Chart(ctx,
                {
                    type: "line",
                    data: {
                        labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
                        datasets: [{
                            label:"FRETE",
                            data: <?php echo $frete; ?>,
                            borderColor: "green"
                        },{
                            label:"CUSTO",
                            data: <?php echo $custo; ?>,
                            borderColor: "red"
                        },{
                            label:"SALDO",
                            data: <?php echo $saldo; ?>,
                            borderColor: "blue"
                        }]
                    }
                }
                )
            </script>
        </gra>
        <gra6>
            <h1>GRÁFICO DE <?php echo date( 'd/m/Y' , strtotime($dat_rel)); ?></h1>
        </gra6>
        <gra5>
            <canvas width=400 height=200 id="grafico2" style="background-color:white;"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
            <script type="text/javascript">
                var ctx = document.getElementById('grafico2').getContext('2d');
                var chartGraph = new Chart(ctx,
                {
                    type: "bar",
                    data: {
                        labels: <?php echo $dad_nom; ?>,
                        datasets: [{
            label: 'VALOR FRETE',
            data: <?php echo $dad_dis; ?>,
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
        </gra5>
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