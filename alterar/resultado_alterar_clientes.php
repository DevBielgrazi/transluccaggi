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
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=80%></a>
		</exit>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#VARIÁVEL HIDDEN DO FORMULÁRIO
	$id = $_POST['id'];
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
#CADASTROS POR COLUNA
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>ALTERAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_clientes.php">
							<table>
                                <input type="hidden" name="id" value=<?php echo $vn['id']?>>
								<tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cod">CÓDIGO:<?php echo $vn['codigo'];   ?></nobr></h2></td>
                                    <td><input name="cod_cli" type=int size=16 maxlength=16 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nom">NOME:<?php echo $vn['nome'];   ?></nobr></h2></td>
                                    <td><input name="nom_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="age">AGENDAR:<?php echo $vn['agendar'];   ?></nobr></h2></td>
                                    <td><select name="age_cli">
										<option value="SIM" selected>SIM</option>
										<option value="NÃO">NÃO</option>
									</select></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cad">CADASTRO:<?php echo $vn['cadastro'];   ?></nobr></h2></td>
                                    <td><input name="cad_cli" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="rot">ROTA:<?php echo $vn['rota'];   ?></nobr></h2></td>
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
                                    <td><h2><nobr><input type="radio" name="opc" value="cid">CIDADE:<?php echo $vn['cidade'];   ?></nobr></h2></td>
                                    <td><input name="cid_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="bai">BAIRRO:<?php echo $vn['bairro'];   ?></nobr></h2></td>
                                    <td><input name="bai_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="end">ENDEREÇO:<?php echo $vn['endereco'];   ?></nobr></h2></td>
                                    <td><input name="end_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="dis">CÓDIGO DISTRIBUIDORA:<?php echo $vn['cod_distribuidora'];   ?></nobr></h2></td>
                                    <td><input name="cod_dis" type=int size=16 maxlength=16 ></td>
								</tr>
							</table>
                            <tr>
                                <td><input class="inputb" type=submit value=ALTERAR></td>
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