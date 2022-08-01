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
		require('../connect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<bar>
			<canvas width="1365" height="70" style="background-color:gray"></canvas>
		</bar>
			<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="..\financeiro/form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="..\financeiro/form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="..\financeiro/form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="..\financeiro/form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="..\financeiro/form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="..\financeiro/form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
            </div>
        </div>
        <script>
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
	if(!isset($_POST['cod_cli'])){
?>
		<pag>
			<h1>CADASTRAR CLIENTES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_clientes.php">
							<table>
								<tr>
									<td><h4>CÓDIGO:</h4></td>
									<td><input autocomplete="off" name="cod_cli" type=text size=32 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input autocomplete="off" name="nom_cli" type=int size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input autocomplete="off" name="cad_cli" type=date required></td>
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
									<td><input autocomplete="off" name="cid_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>BAIRRO:</h4></td>
									<td><input autocomplete="off" name="bai_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input autocomplete="off" name="end_cli" type=text size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
									<td><input autocomplete="off" name="cod_dis" type=int size=32 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>AGENDAR:<input autocomplete="off" type=checkbox name="age" value="SIM"></h4></td>
								</tr>
							</table>
							<tr>
								<td><input autocomplete="off" class="inputb" type=submit value=CADASTRAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
<?php
	}else{
		?><pag>
		<h1>CADASTRAR CLIENTES</h1><p>
		<table>
			<tr>
				<td>
					<form method="post" action="cadastrar_clientes.php">
						<table>
							<tr>
								<td><h4>CÓDIGO:</h4></td>
								<td><input autocomplete="off" name="cod_cli" type=text size=32 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NOME:</h4></td>
								<td><input autocomplete="off" name="nom_cli" type=int size=32 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CADASTRO:</h4></td>
								<td><input autocomplete="off" name="cad_cli" type=date required></td>
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
								<td><input autocomplete="off" name="cid_cli" type=text size=32 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>BAIRRO:</h4></td>
								<td><input autocomplete="off" name="bai_cli" type=text size=32 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>ENDEREÇO:</h4></td>
								<td><input autocomplete="off" name="end_cli" type=text size=32 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
								<td><input autocomplete="off" name="cod_dis" type=int size=32 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>AGENDAR:<input autocomplete="off" type=checkbox name="age" value="SIM"></h4></td>
							</tr>
						</table>
						<tr>
							<td><input autocomplete="off" class="inputb" type=submit value=CADASTRAR></td>
						</tr>
					</form>
				</td>
			</tr>
		</table>
	</pag>
<?php
#VARIÁVEIS DO FORMULÁRIO
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
#VERIFICANDO INPUT
	if(!isset($_POST['age'])){
        $age = "NAO";
    }else{
        $age = $_POST['age'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
#TRANSFORMANDO RESULTADO
	$n = mysqli_num_rows($sql);
#VERIFICANDO CADASTROS DA TABELA
	if($n!=0){
?>
			<script>alert("CLIENTE JÁ CADASTRADO!");</script>
		<?php
	}
	else
	{
		$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
		$n2 = mysqli_num_rows($sql2);
		if($n2 != 0){
#INSERINDO DADOS NA TABELA
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli(`codigo`, `nome`, `agendar`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES ('$cod_cli', '$nom_cli', '$age', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");
			?>
				<script>alert("CLIENTE CADASTRADO COM SUCESSO!");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("DISTRIBUIDORA NÃO CADASTRADA!");</script>
			<?php
		}
	}
}
?>
		<urc>
            <table class="tableb" border=1>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<th><h3>EXCLUIR</h3></th>
					<th><h3>EDITAR</h3></th>
					<th><h3>CÓDIGO</h3></th>
					<th><h3>NOME</h3></th>
					<th><h3>AGENDAR</h3></th>
                    <th><h3>ROTA</h3></th>
                    <th><h3>CIDADE</h3></th>
                    <th><h3>BAIRRO</h3></th>
                    <th><h3>COD_DISTRIBUIDORA</h3></th>
				</tr>
<?php
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
				$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
                $i=0;
#APRESENTANDO DADOS DA TABELA
				while($i<$n){
#CADASTROS POR COLUNA
					$vn = mysqli_fetch_array($sql);
?>
							<tr>
								<form method="post" action="..\excluir/resultado_excluir_clientes.php">
                					<input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                				<td><nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/delete.png" alt="submit"></td>
            					</form>
           						 <form method="post" action="..\alterar/resultado_alterar_clientes.php">
                					<input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                   	 			<td><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/alter.png" alt="submit"></td>
								</form>
								<td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
							</tr>
					<?php   $i = $i + 1;
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