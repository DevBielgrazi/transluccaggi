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
				<tr><td><a href="..\financeiro/form_frete_distribuidoras.php"><button>FRETE DISTRIBUIDORAS</button></a></td></tr>
			</table>
        </menu>
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
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#ADQUIRINDO CADASTROS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO A EXISTÊNCIA DE REGISTROS
	if($n!=0){
		$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
		$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
		$i=0;
#APRESENTANDO DADOS DA TABELA
		while($i!=$n){
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
<?php
#SOMANDO AO CONTADOR
			$i = $i + 1;
		}
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