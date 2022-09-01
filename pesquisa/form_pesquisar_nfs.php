<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 1 || $system_control == 2){
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
		<pag>
			<h1>PESQUISAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="pesquisar_nfs.php">
							<table>
                                <tr>
									<td><h4>TODAS<input type="radio" name="opc" value="tod"></h4></td>
								</tr>
								<tr>
									<td><h4>STATUS:<input type="radio" name="opc" value="sta"></h4></td>
									<td><select name="sta_nf">
										<option value="" selected>...</option>
										<option value="DISPONIVEL">DISPONIVEL</option>
										<option value="AGENDAR">AGENDAR</option>
										<option value="AGENDADA">AGENDADA</option>
										<option value="ROTA">ROTA</option>
										<option value="ENTREGUE">ENTREGUE</option>
										<option value="PENDENTE">PENDENTE</option>
										<option value="REENTREGUE">REENTREGUE</option>
									</select></td>
								</tr>
								<tr>
									<td><h4>DATA DE EMISSÃO: CIDADE<input type="radio" name="opc" value="cide"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clie"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="dise"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="mote"></h4></td>
								</tr>
								<tr>
									<td><h4>DATA DE ENTRADA: CIDADE<input type="radio" name="opc" value="cidd"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clid"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="disd"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="motd"></h4></td>
								</tr>
								<tr>
									<td><h4>DATA DE SAÍDA: CIDADE<input type="radio" name="opc" value="cids"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clis"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="disd"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="mots"></h4></td>
								</tr>
								<tr>
									<td><h4>NÚMERO:<input type="radio" name="opc" value="num"></h4></td>
									<td><input autocomplete="off" name="num_nf" type=text size=16 maxlength=16 ></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:<input type="radio" name="opc" value="emi"></h4></td>
									<td><input autocomplete="off" name="emi_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input autocomplete="off" name="emi_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:<input type="radio" name="opc" value="ent"></h4></td>
									<td><input autocomplete="off" name="ent_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input autocomplete="off" name="ent_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>SAÍDA:<input type="radio" name="opc" value="sai"></h4></td>
									<td><input autocomplete="off" name="sai_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input autocomplete="off" name="sai_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ROTA:<input type="radio" name="opc" value="rot"></h4></td>
									<td><select name="rot_nf">
										<option value="" selected>...</option>
										<option value="VP00">VP00</option>
										<option value="VP01">VP01</option>
										<option value="VP02">VP02</option>
										<option value="VP03">VP03</option>
										<option value="VP04">VP04</option>
										<option value="VP05">VP05</option>
										<option value="VP06">VP06</option>
										<option value="VP07">VP07</option>
										<option value="VP08">VP08</option>
										<option value="VP09">VP09</option>
										<option value="VP10">VP10</option>
										<option value="VP11">VP11</option>
										<option value="VP12">VP12</option>
									</select></td>
								</tr>
								<tr>
									<td><h4>CIDADE:<input type="radio" name="opc" value="cid"></h4></td>
									<td><select name="cid_cli">
										<option value="">...</option>
<?php
#IMPORTANDO CONEXÃO DO BANCO
require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
$sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs ORDER BY `cidade_cliente`");
#TRANSFORMANDO RESULTADO EM NÚMEROS
$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
$i=0;
#APRESENTANDO REGISTROS DO BANCO
while($i!=$n){
#CADASTROS POR COLUNA
	$v = mysqli_fetch_array($sql);
	?><option value="<?php	echo $v['cidade_cliente']	?>"><?php	echo	$v['cidade_cliente']	?></option><?php
#SOMANDO AO CONTADOR
	$i=$i+1;
}
?>
									</select></td>
								</tr>
								<tr>
									<td><h4>DISTRIBUIDORA:<input type="radio" name="opc" value="dis"></h4></td>
									<td><select name="cod_dis">
										<option value="">...</option>
<?php
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
								<tr>
									<td><h4>CÓDIGO CLIENTE:<input type="radio" name="opc" value="ccl"></h4></td>
									<td><input autocomplete="off" name="cod_cli" type=text size=32 maxlength=64 ></td>
								</tr>
								<tr>
									<td><h4>NOME CLIENTE:<input type="radio" name="opc" value="cli"></h4></td>
									<td><input autocomplete="off" name="nom_cli" type=text size=32 maxlength=64 ></td>
								</tr>
								<tr>
									<td><h4>MOTORISTAS:<input type="radio" name="opc" value="mot"></h4></td>
									<td><select name="mot_nf">
										<option value="">...</option>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO REGISTROS DO BANCO
	while($i!=$n){
#CADASTROS POR COLUNA
		$v = mysqli_fetch_array($sql);
		?><option value="<?php	echo $v['nome']	?>"><?php	echo	$v['nome']	?></option><?php
#SOMANDO AO CONTADOR
		$i=$i+1;
	}
?>
										</select></td>
									</tr>
								<tr>
							</table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=PESQUISAR></td>
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
}
?>