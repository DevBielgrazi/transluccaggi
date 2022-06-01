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
	if(!isset($_POST['nom_dis'])){
?>
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input name="cad_dis" type=date required></td>
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
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input name="cad_dis" type=date required></td>
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
    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
    $cad_dis = trim($_POST['cad_dis']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<script>alert("DISTRIBUIDORA JÁ CADASTRADA!");</script>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis(`nome`, `porcentagem`, `cadastro`) VALUES ('$nom_dis', '$por_dis', '$cad_dis')");
?>
			<script>alert("DISTRIBUIDORA CADASTRADA COM SUCESSO!");</script>
<?php
	}
}
?>
		<urd>
			<table border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>CADASTRO</h3></td>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i<$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<td><h4><nobr><?php echo $vn['codigo'];   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];    ?><nobr></h4></td>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?><nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
			</table>
		</urd>
	</body>
</html>
<?php
    }
}
?>