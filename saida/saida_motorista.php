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
	if($system_control == 1){
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
		<menu>
        	<a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table id="00001" class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
				<tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
				<tr><td><h2>CADASTROS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>PESQUISAS</h2></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>MOTORISTAS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
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
	<rn>
		<table border=1>
			<tr><h3>SAÍDA MOTORISTA</h3></tr>
			<tr>
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
<?php
        $i = $i + 1;
		}
?>
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
		<form method="post" action="imprimir_saida.php">
			<input type="hidden" name="mot_sai" value="<?php echo $mot_sai;  ?>">
			<input type="hidden" name="dat_sai" value="<?php echo $dat_sai;  ?>">
			<input class="inputd" type=submit value=IMPRIMIR>
		</form>
<?php
	}else{
		$nom_mot = null;
		$vei_mot = null;
		$pla_mot = null;
		?>
			<rn>
				<h1>SAÍDA DE MOTORISTA</h1><p>
				<table>
					<tr>
						<td><h5>MOTORISTA NÃO CADASTRADO</h5></td>
					</tr>
				</table>
            </rn>
		<?php
	}
?>
	</body>
</html>
<?php
    }
}
?>