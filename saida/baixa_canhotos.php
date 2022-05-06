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
		<menu>
        	<a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
				<tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
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
				<tr><td><h2>FINANCEIRO</h2></td></tr>
				<tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
			</table>
        </menu>
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