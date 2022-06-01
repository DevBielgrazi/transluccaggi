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
		require('../connect.php');
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
	if(!isset($_POST['num_nf'])){
?>
		<pag>
			<h1>CADASTRAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_nfs.php">
							<table>
								<tr>
									<td><h4>NÚMERO:</h4></td>
									<td><input name="num_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input name="ser_nf" type=int size=16 maxlength=8 required></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:</h4></td>
									<td><input name="emi_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:</h4></td>
									<td><input name="ent_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input name="vol_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input name="val_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PESO:</h4></td>
									<td><input name="pes_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO CLIENTE:</h4></td>
									<td><input name="cod_cli" type=int size=16 maxlength=16 required></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=CADASTRAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
<?php
	}else{
		?>
		<pag>
			<h1>CADASTRAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_nfs.php">
							<table>
								<tr>
									<td><h4>NÚMERO:</h4></td>
									<td><input name="num_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input name="ser_nf" type=int size=16 maxlength=8 required></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:</h4></td>
									<td><input name="emi_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:</h4></td>
									<td><input name="ent_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input name="vol_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input name="val_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PESO:</h4></td>
									<td><input name="pes_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO CLIENTE:</h4></td>
									<td><input name="cod_cli" type=int size=16 maxlength=16 required></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=CADASTRAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
<?php
#VARIÁVEIS DO FORMULÁRIO
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $vol_nf = trim($_POST['vol_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
#ADQUIRINDO INFORMAÇÕES DA TABELA
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
#CADASTROS POR COLUNA
	$sql2 = mysqli_fetch_array($sql);
	if(!isset($sql2['cod_distribuidora'])) {
		$cod_dis = null;
    }else{
		$cod_dis = $sql2['cod_distribuidora'];
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `serie` = '$ser_nf' and `cod_distribuidora` = '$cod_dis'");
#TRANSFORMANDO RESULTADOS EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO CADASTROS NA TABELA
	if($n != 0){
?>
			<script>alert("NOTA JÁ CADASTRADA!");</script>
<?php
	}else{
		$sql2 = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
		$n2 = mysqli_num_rows($sql2);
		if($n2 != 0){
			$sql3 = mysqli_fetch_array($sql2);
			$cod_dis = $sql3['cod_distribuidora'];
			$rot_nf = $sql3['rota'];
			$nom_cli = $sql3['nome'];
			$cid_cli = $sql3['cidade'];
			$bai_cli = $sql3['bairro'];
			$end_cli = $sql3['endereco'];
			$age = $sql3['agendar'];
#VERIFICANDO COLUNA DA TABELA
			if($age!="SIM"){
				$status = "DISPONIVEL";
			}else{
				$status = "AGENDAR";
			}
#INSERINDO CADASTROS NA TABELA
			$sql = mysqli_query($conn,"INSERT INTO $tab_nfs (`numero`, `serie`, `emissao`, `entrada`, `volumes`, `valor`, `peso`, `rota`, `cod_cliente`, `nome_cliente`, `cidade_cliente`, `bairro_cliente`, `endereco_cliente`, `cod_distribuidora`, `status`)  VALUES ('$num_nf', '$ser_nf', '$emi_nf', '$ent_nf', '$vol_nf', '$val_nf', '$pes_nf', '$rot_nf', '$cod_cli', '$nom_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis', '$status')");
?>
				<script>alert("NOTA CADASTRADA COM SUCESSO")</script>
<?php
		}else{
?>
				<script>alert("CLIENTE NÃO CADASTRADO!")</script>
<?php
		}
	}
}
?>
		<urn>
            <table border=1>
                <h3>NOTAS CADASTRADAS</h3>
                <tr>
					<td><h3>NÚMERO</h3></td>
					<td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>VOLUMES</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>COD_<br>CLIENTE</h3></td>
                    <td><h3>STATUS</h3></td>
				</tr>
<?php
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
				$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
                $i=0;
#APRESENTANDO DADOS DA TABELA
				while($i<$n){
					$vn = mysqli_fetch_array($sql);
?>
					<tr>
						<td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>
					</tr>
<?php
#SOMANDO AO CONTADOR
					$i = $i + 1;
				}
?>
            </table>
        </urn>
	</body>
</html>
<?php
    }
}
?>