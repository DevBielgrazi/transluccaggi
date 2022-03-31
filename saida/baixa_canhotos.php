<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<menu>
        	<a href="http://localhost/transluccaggi/menu.html"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <table class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.html"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.html"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
				<tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
				<tr><td><h2>CADASTROS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>PESQUISAS</h2></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>MOTORISTAS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_motoristas.html"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>
<?php
	require('../connect.php');

    $num_nf = trim($_POST['num_nf']);
    $obs_nf = trim($_POST['obs_nf']);

	if(!isset($_POST['opc'])) {
        $ver_ent = "nul";
    }
	else
	{
        $ver_ent = $_POST['opc'];
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf'");
	$n = mysqli_num_rows($sql);

	switch($ver_ent){
		case "ent":
			if($n != 0)
			{
				$v = mysqli_fetch_array($sql);
				$t = $v['tentativas'];
				if($t>1){
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'REENTREGUE', `observacao` = '$obs_nf' WHERE `numero` = '$num_nf'");
				}
				else
				{
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'ENTREGUE', `observacao` = '$obs_nf' WHERE `numero` = '$num_nf'");
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
			}
			else
			{
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
				$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'PENDENTE', `observacao` = '$obs_nf' WHERE `numero` = '$num_nf'");
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
			}
			else
			{
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
									<td><h4>ENTREGUE<input type="radio" name="opc" value="ent"></h4></td>
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