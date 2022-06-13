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
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<div class="menu">
			<img src="..\imagem/logo.png" width=15%>
			<div class="item">
				<a href="..\saida/form_saida_motorista.php"><button class="buttonb">>SAÍDA DE MOTORISTAS</button></a>
				<a href="..\saida/form_baixa_canhotos.php"><button class="buttonb">>BAIXA DE CANHOTOS</button></a>
				<a href="..\saida/form_romaneio_cargas.php"><button class="buttonb">>ROMANEIO DE CARGAS</button></a>
				<a href="..\saida/form_registro_devolucao.php"><button class="buttonb">>REGISTRO DE DEVOLUÇÕES</button></a>
				<a href="..\cadastro/cadastrar_nfs.php"><button class="buttonb2">>CADASTRO NOTAS</button></a>
				<a href="..\cadastro/cadastrar_clientes.php"><button class="buttonb2">>CADASTRO CLIENTES</button></a>
				<a href="..\cadastro/cadastrar_distribuidoras.php"><button class="buttonb2">>CADASTRO DISTRIBUIDORAS</button></a>
				<a href="..\pesquisa/form_pesquisar_nfs.php"><button class="buttonb3">>PESQUISAR NOTAS</button></a>
				<a href="..\pesquisa/form_pesquisar_clientes.php"><button class="buttonb3">>PESQUISAR CLIENTES</button></a>
				<a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button class="buttonb3">>PESQUISAR DISTRIBUIDORAS</button></a>
				<a href="..\cadastro/cadastrar_motoristas.php"><button class="buttonb2">>CADASTRAR MOTORISTA</button></a>
				<a href="..\pesquisa/form_pesquisar_motoristas.php"><button class="buttonb2">>PESQUISAR MOTORISTA</button></a>
				<a href="..\financeiro/form_relatorio_diario.php"><button class="buttonb4">>RELATÓRIO DIÁRIO</button></a>
				<a href="..\financeiro/form_relatorio_mensal.php"><button class="buttonb4">>RELATÓRIO MENSAL</button></a>
				<a href="..\financeiro/form_relatorio_anual.php"><button class="buttonb4">>RELATÓRIO ANUAL</button></a>
				<a href="..\financeiro/form_frete_motoristas.php"><button class="buttonb4">>FRETE MOTORISTAS</button></a>
				<a href="..\financeiro/form_fechamento_distribuidoras.php"><button class="buttonb4">>FECHAMENTO DISTRIBUIDORAS</button></a>
				<a href="..\financeiro/form_fechamento_motoristas.php"><button class="buttonb4">>FECHAMENTO MOTORISTAS</button></a>
			</div>
		</div>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=80%></a>
		</exit>
		<pag>
			<h1>PESQUISAR CLIENTES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="pesquisar_clientes.php">
							<table>
                                <tr>
									<td><h4>TODOS<input type="radio" name="opc" value="tod"></h4></td>
								</tr>
								<tr>
									<td><h4>DATA DE CADASTRO: DISTRIBUIDORA<input type="radio" name="opc" value="disc"></h4></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO:<input type="radio" name="opc" value="cod"></h4></td>
									<td><input name="cod_cli" type=text size=16 maxlength=16 ></td>
								</tr>
                                <tr>
									<td><h4>NOME:<input type="radio" name="opc" value="nom"></h4></td>
									<td><input name="nom_cli" type=text size=16 maxlength=32 ></td>
								</tr>
                                <tr>
									<td><h4>AGENDAMENTO: SIM<input type="radio" name="opc" value="ages"></h4></td>
									<td><h4>NÃO<input type="radio" name="opc" value="agen"></h4></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:<input type="radio" name="opc" value="cad"></h4></td>
									<td><input name="cad_cli" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input name="cad_cli2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ROTA:<input type="radio" name="opc" value="rot"></h4></td>
									<td><select name="rot_cli">
										<option value="VP00" selected>VP00</option>
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
<?php
#IMPORTANDO CONEXÃO DO BANCO
require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
$sql = mysqli_query($conn,"SELECT DISTINCT `cidade` FROM $tab_cli ORDER BY `cidade`");
#TRANSFORMANDO RESULTADO EM NÚMEROS
$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
$i=0;
#APRESENTANDO REGISTROS DO BANCO
while($i!=$n){
#CADASTROS POR COLUNA
	$v = mysqli_fetch_array($sql);
	?><option value="<?php	echo $v['cidade']	?>"><?php	echo	$v['cidade']	?></option><?php
#SOMANDO AO CONTADOR
	$i=$i+1;
}
?>
									</select></td>
								</tr>
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
                                <td><input class="inputb" type=submit value=PESQUISAR></td>
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