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
#IMPORTANDO CONEXÃO COM O BANCO
require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
?>
<html>
	<head>
		<link rel="stylesheet" href="print.css" media="print"/>
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
			<table>
				<tr>
					<td>
						<form method="post" action="saida_motorista.php">
							<table>
								<input type="hidden" name="n" value=1>
								<input type="hidden" name="mot_sai" value="<?php echo $mot_sai;  ?>">
								<input type="hidden" name="dat_sai" value="<?php echo $dat_sai;  ?>">
								<tr>
									<td><h4>NOTA FISCAL:</h4></td>
									<td><input name="not_sai" type=text size=16 maxlength=16 required></td>
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
<?php
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_sai'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n1 = mysqli_num_rows($sql);
#VERIFICANDO NÚMERO DE REGISTROS
	if($n1!=0){
#CADASTROS POR COLUNAS
		$sql2 = mysqli_fetch_array($sql);
		$nom_mot = $sql2['nome'];
		$vei_mot = $sql2['veiculo'];
		$pla_mot = $sql2['placa'];
?>
	<rs>
		<table border=1>
			<tr><h3>SAÍDA MOTORISTA</h3></tr>
			<tr>
				<td><form method="post" action="imprimir_saida.php" target="_blank">
					<input type="hidden" name="mot_sai" value="<?php echo $mot_sai;  ?>">
					<input type="hidden" name="dat_sai" value="<?php echo $dat_sai;  ?>">
					<input type=image width=5% height=5% src="..\imagem/imprimir.png" alt=submit>
				</form></td>
				<td><h3>DATA:<?php  echo date( 'd/m/Y' , strtotime($dat_sai)); ?></h3></td>
				<td><h3>MOTORISTA:<?php  echo $nom_mot; ?></h3></td>
				<td><h3>VEÍCULO:<?php echo $vei_mot  ?></h3></td>
				<td><h3>PLACA:<?php echo $pla_mot  ?></h3></td>
			</tr>
			<tr>
				<td><h3>NF</h3></td>
				<td><h3>VALOR</h3></td>
				<td><h3>VOLUMES</h3></td>
				<td><h3>CLIENTE</h3></td>
				<td><h3>CIDADE</h3></td>
		</tr>
<?php
#INICIANDO CONTADOR
    $i=0;
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
	if(!isset($_POST['not_sai'])) {
        $not_sai = null;
    }else{
        $not_sai = trim($_POST['not_sai']);
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$not_sai' ORDER BY `id` DESC LIMIT 1");
	$v = mysqli_fetch_array($sql);
	if(!isset($v['id'])) {
        $id = null;
    }else{
        $id = $v['id'];
    }
#VERIFICANDO COLUNA NO BANCO
	if(!isset($v['tentativas'])){
        $t = 1;
    }else{
        $t = $v['tentativas']+1;
    }
#ATUALIZANDO REGISTRO NO BANCO
	$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `motorista` = '$nom_mot',`saida` = '$dat_sai',`status` = 'ROTA',`tentativas` = '$t' WHERE `id` = '$id'");
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$n = mysqli_num_rows($sql);
	if($n!=0){
#APRESENTANDO REGISTROS NO BANCO
		while($i!=$n){
			$vn = mysqli_fetch_array($sql);
?>
				<tr>
					<td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
		}
	}else{
		?>
			<tr>
			<input type="hidden" name="n" value="<?php $nn = ($_POST['n']+1)?>">
				<td><h4><nobr>NÃO CADASTRADA</nobr></h4></td>
				<td><h4><nobr></nobr></h4></td>
				<td><h4><nobr></nobr></h4></td>
				<td><h4><nobr></nobr></h4></td>
				<td><h4><nobr></nobr></h4></td>
<?php
        $i = $i + 1;
		}
	}else{
		$nom_mot = null;
		$vei_mot = null;
		$pla_mot = null;
		?>
			<script>
				alert("MOTORISTA NÃO CADASTRADO!");
			</script>
		<?php
	}
?>
	</body>
</html>
<?php
    }
}
?>