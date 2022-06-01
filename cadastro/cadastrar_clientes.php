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
	if(!isset($_POST['cod_cli'])){
?>
		<pag>
			<h1>CADASTRAR CLIENTES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_clientes.php">
							<table>
								<tr>
									<td><h4>CÓDIGO:</h4></td>
									<td><input name="cod_cli" type=text size=32 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input name="nom_cli" type=int size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input name="cad_cli" type=date required></td>
								</tr>
								<tr>
									<td><h4>ROTA:</h4></td>
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
									<td><h4>CIDADE:</h4></td>
									<td><input name="cid_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>BAIRRO:</h4></td>
									<td><input name="bai_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input name="end_cli" type=text size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
									<td><input name="cod_dis" type=int size=32 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>AGENDAR:<input type=checkbox name="age" value="SIM"></h4></td>
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
		?><pag>
		<h1>CADASTRAR CLIENTES</h1><p>
		<table>
			<tr>
				<td>
					<form method="post" action="cadastrar_clientes.php">
						<table>
							<tr>
								<td><h4>CÓDIGO:</h4></td>
								<td><input name="cod_cli" type=text size=32 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NOME:</h4></td>
								<td><input name="nom_cli" type=int size=32 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CADASTRO:</h4></td>
								<td><input name="cad_cli" type=date required></td>
							</tr>
							<tr>
								<td><h4>ROTA:</h4></td>
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
								<td><h4>CIDADE:</h4></td>
								<td><input name="cid_cli" type=text size=32 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>BAIRRO:</h4></td>
								<td><input name="bai_cli" type=text size=32 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>ENDEREÇO:</h4></td>
								<td><input name="end_cli" type=text size=32 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
								<td><input name="cod_dis" type=int size=32 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>AGENDAR:<input type=checkbox name="age" value="SIM"></h4></td>
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
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
#VERIFICANDO INPUT
	if(!isset($_POST['age'])){
        $age = "NAO";
    }else{
        $age = $_POST['age'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
#TRANSFORMANDO RESULTADO
	$n = mysqli_num_rows($sql);
#VERIFICANDO CADASTROS DA TABELA
	if($n!=0){
?>
			<script>alert("CLIENTE JÁ CADASTRADO!");</script>
		<?php
	}
	else
	{
		$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
		$n2 = mysqli_num_rows($sql2);
		if($n2 != 0){
#INSERINDO DADOS NA TABELA
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli(`codigo`, `nome`, `agendar`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES ('$cod_cli', '$nom_cli', '$age', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");
			?>
				<script>alert("CLIENTE CADASTRADO COM SUCESSO!");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("DISTRIBUIDORA NÃO CADASTRADA!");</script>
			<?php
		}
	}
}
?>
		<urc>
            <table border=1>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>AGENDAR</h3></td>
                    <td><h3>CADASTRO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>BAIRRO</h3></td>
                    <td><h3>ENDEREÇO</h3></td>
                    <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
				</tr>
<?php
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
				$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
                $i=0;
#APRESENTANDO DADOS DA TABELA
				while($i<$n){
#CADASTROS POR COLUNA
					$vn = mysqli_fetch_array($sql);
?>
							<tr>
								<td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['endereco'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
							</tr>
					<?php   $i = $i + 1;
				}   
?>
            </table>
        </urc>
	</body>
</html>
<?php
    }
}
?>