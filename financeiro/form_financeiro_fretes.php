<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
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
				<tr><td><a href="..\financeiro/form_financeiro_fretes.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_frete_distribuidoras.php"><button>FRETE DISTRIBUIDORAS</button></a></td></tr>
			</table>
		</menu>
		<pag>
			<h1>FRETE MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="financeiro_fretes.php">
							<table>
								<tr>
									<td><h4>DATA:</h4></td>
									<td><input name="dat_fre" type=date></td>
								</tr>
								<tr>
									<td><h4>MOTORISTA:</h4></td>
									<td><select name="mot_fre">
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('..\connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot");
#TRANSFORMANDO RESULTADOS NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DO BANCO
	while($i!=$n){
#CADASTROS POR COLUNA
		$v = mysqli_fetch_array($sql);
		?><option value="<?php	echo $v['nome']	?>"><?php	echo	$v['nome']	?></option><?php
#SOMANDO AO CONTADOR
		$i=$i+1;
}
?>
									</select></td>
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
    else
    {
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
    }
}
?>