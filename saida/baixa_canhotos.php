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
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $num_nf = trim($_POST['num_nf']);
    $obs_nf = trim($_POST['obs_nf']);

#VERIFICANDO EXISTÊNCIA DO INPUT
	if(!isset($_POST['opc'])) {
        $ver_ent = "nul";
    }else{
        $ver_ent = $_POST['opc'];
    }
#ADQUIRINDO DADOS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' ORDER BY `id` DESC LIMIT 1");
	$con = mysqli_fetch_array($sql);
	if(!isset($con['id'])) {
		$id = null;
	}else{
		$id = $con['id'];
	}
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERICANDO INPUT SELECIONADO
	switch($ver_ent){
		case "ent":
#VERIFICANDO O NÚMERO DE CADASTROS
			if($n != 0){
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
#CADASTROS POR COLUNAS
				$v = mysqli_fetch_array($sql);
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
				if(!isset($v['tentativas'])) {
					$t = null;
				}else{
					$t = $v['tentativas'];
				}
#VERIFICANDO RESULTADO DA COLUNA
				if($t>1){
#ATUALIZANDO REGISTRO NO BANCO
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'REENTREGUE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				}else{
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'ENTREGUE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				}
				?>
					<rn>
						<h1>BAIXA DE CANHOTOS</h1><p>
						<table>
							<tr>
								<td><h7>CANHOTO CONFERIDO</h7></td>
							</tr>
						</table>
					</rn>
				<?php
			}else{
				?>
					<rn>
						<h1>BAIXA DE CANHOTOS</h1><p>
						<table>
							<tr>
								<td><h5>NOTA NÃO CADASTRADA</h5></td>
							</tr>
						</table>
					</rn>
				<?php
			}
			break;
		case "pen":
			if($n != 0)
			{
				$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'PENDENTE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				?>
					<rn>
						<h1>BAIXA DE CANHOTOS</h1><p>
						<table>
							<tr>
								<td><h7>NOTA DEVOLVIDA</h7></td>
							</tr>
						</table>
					</rn>
				<?php
			}else{
				?>
					<rn>
						<h1>BAIXA DE CANHOTOS</h1><p>
						<table>
							<tr>
								<td><h5>NOTA NÃO CADASTRADA</h5></td>
							</tr>
						</table>
					</rn>
				<?php
			}
	}
?>
		<pag>
			<h1>BAIXA DE CANHOTOS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="baixa_canhotos.php">
							<table>
								<tr>
									<td><h4>ENTREGUE<input type="radio" name="opc" value="ent" checked></h4></td>
									<td><h4>PENDENTE<input type="radio" name="opc" value="pen"></h4></td>
								</tr>
								<tr>
									<td><h4>NOTA FISCAL:</h4></td>
									<td><input name="num_nf" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>OBSERVAÇÃO:</h4></td>
									<td><input name="obs_nf" type=text size=64 maxlength=128></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=PRÓXIMA></td>
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