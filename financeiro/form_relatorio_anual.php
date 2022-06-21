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
		<pag>
			<h1>RELATÓRIO ANUAL</h1><p>
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
$ano = date('Y');
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