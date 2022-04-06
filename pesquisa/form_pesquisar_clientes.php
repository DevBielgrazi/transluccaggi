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
										<option value="VP00" selected>VP0</option>
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
									<td><input name="cid_cli" type=text size=16 maxlength=32 ></td>
								</tr>
                                <tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:<input type="radio" name="opc" value="codd"></h4></td>
									<td><input name="cod_dis" type=text size=16 maxlength=16 ></td>
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