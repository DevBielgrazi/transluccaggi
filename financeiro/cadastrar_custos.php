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
            <logo>
                <a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
            </logo>
            <exit>
                <a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
            </exit>
		</div>
<?php
#VARIÁVEIS DO FORMULÁRIO
$dat_cus = trim($_POST['dat_cus']);
$des_cus = trim($_POST['des_cus']);
$val_cus = trim($_POST['val_cus']);

$des_cus = strtolower($des_cus);

require('../connect.php');
$sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus'");
$n = mysqli_num_rows($sql);

if($n!=0){
    $sql = mysqli_query($conn,"UPDATE $tab_cus SET `valor` = '$val_cus' WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus'");
}else{
    $sql = mysqli_query($conn,"INSERT INTO $tab_cus VALUES ('$dat_cus','$des_cus','$val_cus')");
}
$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` = '$dat_cus'");
$sql = mysqli_fetch_array($sql);
$cus_men = number_format(($sql['cus']), 2, '.', '');

?>
		<rf>
			<table border=1>
				<tr>
					<td><h3>MÊS:</h3></td>
                    <td><h4><nobr><?php echo date( 'm/Y' , strtotime($dat_cus));   ?></nobr></h4></td>
                </tr>
                <tr>
					<td><h3>DESCRIÇÃO</h3></td>
                    <td><h3>CUSTO</h3></td>
				</tr>
<?php	
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus'");
	$n = mysqli_num_rows($sql);
    $i=0;
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
                <tr>
                    <td><h4><nobr><?php echo $vn['descricao'];   ?></nobr></h4></td>
                    <td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
                </tr>
<?php
#SOMANDO AO CONTADOR
    $i = $i + 1;
    }
?>
                <tr>
					<td><h3>CUSTO TOTAL:</h3></td>
                    <td><h4><nobr><?php echo $cus_men;   ?></nobr></h4></td>
                </tr>
			</table>
        </rf>
        <pag>
            <h1>CUSTO MENSAL</h1>
            <form method="post" action="relatorio_mensal.php">
                <input autocomplete="off" type="hidden" name="mes_rel" value="<?php echo date( 'm' , strtotime($dat_cus));?>">
                <input autocomplete="off" type="hidden" name="ano_rel" value="<?php echo date( 'Y' , strtotime($dat_cus));?>">
                <td><button class="buttond" type=submit>RELATÓRIO MENSAL</button></td>
            </form>
			<table>
                <tr>
                    <td>
                        <form method="post" action="cadastrar_custos.php">
                            <table>
                            <input autocomplete="off" type="hidden" name="dat_cus" value="<?php echo $dat_cus;?>">
                                <tr>
                                    <td><h4>DESCRIÇÃO:</h4></td>
                                    <td><input autocomplete="off" name="des_cus" type=text size=16 maxlength=16 required></td>
                                </tr>
                                <tr>
                                    <td><h4>VALOR:</h4></td>
                                    <td><input autocomplete="off" name="val_cus" type=float size=16 maxlength=8 required></td>
                                </tr>
                            </table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=CADASTRAR></td>									
                            </tr>
                        </form>
                    </td>	
                </tr>
            </table>
        </pag>
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