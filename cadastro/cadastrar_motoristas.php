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
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=80%></a>
		</exit>
<?php
	if(!isset($_POST['cad_mot'])){
?>
	<pag>
			<h1>CADASTRAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_motoristas.php">
							<table>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input name="cad_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input name="nom_mot" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>VEÍCULO:</h4></td>
									<td><input name="vei_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PLACA:</h4></td>
									<td><input name="pla_mot" type=text size=16 maxlength=8 required></td>
								</tr>
                                <tr>
									<td><h4>TELEFONE:</h4></td>
									<td><input name="tel_mot" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input name="end_mot" type=text size=16 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CPF:</h4></td>
									<td><input name="cpf_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RG:</h4></td>
									<td><input name="rg_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NASCIMENTO:</h4></td>
									<td><input name="nas_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NATURALIDADE:</h4></td>
									<td><input name="nat_mot" type=text size=16 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>CNH:</h4></td>
									<td><input name="cnh_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALIDADE(CNH):</h4></td>
									<td><input name="val_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA(CNH):</h4></td>
									<td><input name="cat_mot" type=text size=16 maxlength=4 required></td>
								</tr>
								<tr>
									<td><h4>CEP:</h4></td>
									<td><input name="cep_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>BANCO:</h4></td>
									<td><input name="ban_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO BANCO:</h4></td>
									<td><input name="cod_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>AGÊNCIA BANCO:</h4></td>
									<td><input name="age_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CONTA BANCO:</h4></td>
									<td><input name="con_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANO VEÍCULO:</h4></td>
									<td><input name="ano_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>COR VEÍCULO:</h4></td>
									<td><input name="cor_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RENAVAM:</h4></td>
									<td><input name="ren_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NÚMERO CHASSI:</h4></td>
									<td><input name="num_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANTT:</h4></td>
									<td><input name="ant_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA ANTT:</h4></td>
									<td><input name="caa_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>VALIDADE ANTT:</h4></td>
									<td><input name="vaa_mot" type=date></td>
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
		<h1>CADASTRAR MOTORISTAS</h1><p>
		<table>
			<tr>
				<td>
					<form method="post" action="cadastrar_motoristas.php">
						<table>
							<tr>
								<td><h4>CADASTRO:</h4></td>
								<td><input name="cad_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>NOME:</h4></td>
								<td><input name="nom_mot" type=text size=16 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>VEÍCULO:</h4></td>
								<td><input name="vei_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>PLACA:</h4></td>
								<td><input name="pla_mot" type=text size=16 maxlength=8 required></td>
							</tr>
							<tr>
								<td><h4>TELEFONE:</h4></td>
								<td><input name="tel_mot" type=int size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ENDEREÇO:</h4></td>
								<td><input name="end_mot" type=text size=16 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CPF:</h4></td>
								<td><input name="cpf_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>RG:</h4></td>
								<td><input name="rg_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NASCIMENTO:</h4></td>
								<td><input name="nas_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>NATURALIDADE:</h4></td>
								<td><input name="nat_mot" type=text size=16 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>CNH:</h4></td>
								<td><input name="cnh_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>VALIDADE(CNH):</h4></td>
								<td><input name="val_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>CATEGORIA(CNH):</h4></td>
								<td><input name="cat_mot" type=text size=16 maxlength=4 required></td>
							</tr>
							<tr>
								<td><h4>CEP:</h4></td>
								<td><input name="cep_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>BANCO:</h4></td>
								<td><input name="ban_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>CÓDIGO BANCO:</h4></td>
								<td><input name="cod_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>AGÊNCIA BANCO:</h4></td>
								<td><input name="age_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>CONTA BANCO:</h4></td>
								<td><input name="con_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ANO VEÍCULO:</h4></td>
								<td><input name="ano_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>COR VEÍCULO:</h4></td>
								<td><input name="cor_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>RENAVAM:</h4></td>
								<td><input name="ren_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NÚMERO CHASSI:</h4></td>
								<td><input name="num_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ANTT:</h4></td>
								<td><input name="ant_mot" type=text size=16 maxlength=16></td>
							</tr>
							<tr>
								<td><h4>CATEGORIA ANTT:</h4></td>
								<td><input name="caa_mot" type=text size=16 maxlength=16></td>
							</tr>
							<tr>
								<td><h4>VALIDADE ANTT:</h4></td>
								<td><input name="vaa_mot" type=date></td>
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
	$cad_mot = trim($_POST['cad_mot']);
	$nom_mot = trim($_POST['nom_mot']);
	$vei_mot = trim($_POST['vei_mot']);
	$pla_mot = trim($_POST['pla_mot']);
	$tel_mot = trim($_POST['tel_mot']);
	$end_mot = trim($_POST['end_mot']);
	$cpf_mot = trim($_POST['cpf_mot']);
	$rg_mot = trim($_POST['rg_mot']);
	$nas_mot = trim($_POST['nas_mot']);
	$nat_mot = trim($_POST['nat_mot']);
	$cnh_mot = trim($_POST['cnh_mot']);
	$val_mot = trim($_POST['val_mot']);
	$cat_mot = trim($_POST['cat_mot']);
	$cep_mot = trim($_POST['cep_mot']);
	$ban_mot = trim($_POST['ban_mot']);
	$cod_mot = trim($_POST['cod_mot']);
	$age_mot = trim($_POST['age_mot']);
	$con_mot = trim($_POST['con_mot']);
	$ano_mot = trim($_POST['ano_mot']);
	$cor_mot = trim($_POST['cor_mot']);
	$ren_mot = trim($_POST['ren_mot']);
	$num_mot = trim($_POST['num_mot']);
	$ant_mot = trim($_POST['ant_mot']);
	$caa_mot = trim($_POST['caa_mot']);
	$vaa_mot = trim($_POST['vaa_mot']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mot' and `placa` = '$pla_mot'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<script>alert('MOTORISTA JÁ CADASTRADO!');</script>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
        $sql = mysqli_query($conn,"INSERT INTO $tab_mot (`cadastro`, `nome`, `veiculo`, `placa`, `telefone`, `endereco`, `cpf`, `rg`, `nascimento`, `naturalidade`, `cnh`, `validade_cnh`, `categoria_cnh`, `cep`, `banco`, `cod_banco`, `agencia_banco`, `conta_banco`, `ano_veiculo`, `cor_veiculo`, `renavam`, `num_chassi`, `antt`, `categoria_antt`, `validade_antt`)  VALUES ('$cad_mot', '$nom_mot', '$vei_mot', '$pla_mot', '$tel_mot', '$end_mot', '$cpf_mot', '$rg_mot', '$nas_mot', '$nat_mot', '$cnh_mot', '$val_mot', '$cat_mot', '$cep_mot', '$ban_mot', '$cod_mot', '$age_mot', '$con_mot', '$ano_mot', '$cor_mot', '$ren_mot', '$num_mot', '$ant_mot', '$caa_mot', '$vaa_mot')");
?>
            <script>alert('MOTORISTA CADASTRADO COM SUCESSO!');</script>
<?php
    }
}
?>
        <urm>
            <table border=1>
                <h3>MOTORISTAS CADASTRADOS</h3>
                <tr>
					<td><h3>CADASTRO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>VEÍCULO</h3></td>
					<td><h3>PLACA</h3></td>
					<td><h3>TELEFONE</h3></td>
					<td><h3>ENDERECO</h3></td>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i!=$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
            </table>
        </urm>
	</body>
</html>
<?php
    }
}
?>