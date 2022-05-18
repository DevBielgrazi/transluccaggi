<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index_financeiro.html";
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
                <tr><td><a href="..\financeiro/form_relatorio_diario.php"><button>RELATÓRIO DIÁRIO</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_relatorio_mensal.php"><button>RELATÓRIO MENSAL</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_relatorio_anual.php"><button>RELATÓRIO ANUAL</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
			</table>
		</menu>
		<pag>
			<h1>RELATÓRIO MENSAL</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_anual.php">
							<table>
								<tr>
                                <tr>
									<td><h4>ANO:</h4></td>
									<td><select name="ano_rel">
<?php
$ano = date(Y);
$ano_a = $ano-1;
$ano_a1 = $ano-2;
$ano_a2 = $ano-3;
$ano_a3 = $ano-4;
$ano_a4 = $ano-5;
$ano_a5 = $ano-6;
$ano_a6 = $ano-7;
$ano_a7 = $ano-8;
$ano_a8 = $ano-9;
?>
                                        <option value="<?php echo $ano ?>" selected><?php echo $ano ?></option>
                                        <option value="<?php echo $ano_a ?>"><?php echo $ano_a ?></option>
                                        <option value="<?php echo $ano_a1 ?>"><?php echo $ano_a1 ?></option>
                                        <option value="<?php echo $ano_a2 ?>"><?php echo $ano_a2 ?></option>
                                        <option value="<?php echo $ano_a3 ?>"><?php echo $ano_a3 ?></option>
                                        <option value="<?php echo $ano_a4 ?>"><?php echo $ano_a4 ?></option>
                                        <option value="<?php echo $ano_a5 ?>"><?php echo $ano_a5 ?></option>
                                        <option value="<?php echo $ano_a6 ?>"><?php echo $ano_a6 ?></option>
                                        <option value="<?php echo $ano_a7 ?>"><?php echo $ano_a7 ?></option>
                                        <option value="<?php echo $ano_a8 ?>"><?php echo $ano_a8 ?></option>
									</select></td>
								</tr>
                                <td><input class="inputb" type=submit value=VISUALIZAR></td>
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