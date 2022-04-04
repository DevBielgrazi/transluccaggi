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
			<h1>PESQUISAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="pesquisar_nfs.php">
							<table>
                                <tr>
									<td><h4>TODAS<input type="radio" name="opc" value="tod"></h4></td>
								</tr>
								<tr>
									<td><h4>STATUS:<input type="radio" name="opc" value="sta"></h4></td>
									<td><select name="sta_nf">
										<option value="DISPONÍVEL" selected>DISPONÍVEL</option>
										<option value="AGENDAR">AGENDAR</option>
										<option value="AGENDADA">AGENDADA</option>
										<option value="ROTA">ROTA</option>
										<option value="ENTREGUE">ENTREGUE</option>
										<option value="PENDENTE">PENDENTE</option>
										<option value="REENTREGUE">REENTREGUE</option>
									</select></td>
								</tr>
								<tr>
									<td><h4>DATA DE EMISSÃO: CIDADE<input type="radio" name="opc" value="cide"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clie"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="dise"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="mote"></h4></td>
								</tr>
								<tr>
									<td><h4>DATA DE ENTRADA: CIDADE<input type="radio" name="opc" value="cidd"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clid"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="disd"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="motd"></h4></td>
								</tr>
								<tr>
									<td><h4>DATA DE SAÍDA: CIDADE<input type="radio" name="opc" value="cids"></h4></td>
									<td><h4>CLIENTE<input type="radio" name="opc" value="clis"></h4></td>
									<td><h4>DISTRIBUIDORA<input type="radio" name="opc" value="disd"></h4></td>
									<td><h4>MOTORISTA<input type="radio" name="opc" value="mots"></h4></td>
								</tr>
								<tr>
									<td><h4>NÚMERO:<input type="radio" name="opc" value="num"></h4></td>
									<td><input name="num_nf" type=text size=16 maxlength=16 ></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:<input type="radio" name="opc" value="emi"></h4></td>
									<td><input name="emi_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input name="emi_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:<input type="radio" name="opc" value="ent"></h4></td>
									<td><input name="ent_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input name="ent_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>SAÍDA:<input type="radio" name="opc" value="sai"></h4></td>
									<td><input name="sai_nf" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input name="sai_nf2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ROTA:<input type="radio" name="opc" value="rot"></h4></td>
									<td><select name="rot_nf">
										<option value="VP0" selected>VP0</option>
										<option value="VP1">VP1</option>
										<option value="VP2">VP2</option>
										<option value="VP3">VP3</option>
										<option value="VP4">VP4</option>
										<option value="VP5">VP5</option>
										<option value="VP6">VP6</option>
										<option value="VP7">VP7</option>
										<option value="VP8">VP8</option>
										<option value="VP9">VP9</option>
										<option value="VP10">VP10</option>
										<option value="VP11">VP11</option>
										<option value="VP12">VP12</option>
									</select></td>
								</tr>
								<tr>
									<td><h4>CIDADE:<input type="radio" name="opc" value="cid"></h4></td>
									<td><input name="cid_cli" type=text size=32 maxlength=32></td>
								</tr>
								<tr>
									<td><h4>NOME CLIENTE:<input type="radio" name="opc" value="cli"></h4></td>
									<td><input name="nom_cli" type=text size=32 maxlength=64 ></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:<input type="radio" name="opc" value="dis"></h4></td>
									<td><input name="cod_dis" type=int size=32 maxlength=16 ></td>
								</tr>
								<tr>
									<td><h4>MOTORISTAS:<input type="radio" name="opc" value="mot"></h4></td>
									<td><input name="mot_nf" type=text size=32 maxlength=16 ></td>
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