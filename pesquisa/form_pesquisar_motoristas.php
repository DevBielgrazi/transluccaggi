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
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
		<pag>
			<h1>PESQUISAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="pesquisar_motoristas.php">
							<table>
                                <tr>
									<td><h4>TODOS<input type="radio" name="opc" value="tod"></h4></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:<input type="radio" name="opc" value="cad"></h4></td>
									<td><input name="cad_mot" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input name="cad_mot2" type=date ></td>
								</tr>
                                <tr>
									<td><h4>NOME:<input type="radio" name="opc" value="nom"></h4></td>
									<td><input name="nom_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>VEÍCULO:<input type="radio" name="opc" value="vei"></h4></td>
									<td><input name="vei_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>PLACA:<input type="radio" name="opc" value="pla"></h4></td>
									<td><input name="pla_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>TELEFONE:<input type="radio" name="opc" value="tel"></h4></td>
									<td><input name="tel_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>ENDEREÇO:<input type="radio" name="opc" value="end"></h4></td>
									<td><input name="end_mot" type= size=16 maxlength= ></td>
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