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
			<canvas width="1365" height="70" style="background-color:rgb(42, 129, 187)"></canvas>
		</bar>
			<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
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
		<pag>
			<h1>BAIXA DE CANHOTOS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="baixa_canhotos.php">
							<table>
								<tr>
									<td><h4>ENTREGUE<input type="radio" name="opc" value="ent" checked></h4></td>
									<td><h4>PENDENTE<input type="radio" name="opc" value="pen"></h4></td>
									<td><h4>DEVOLUÇÃO INTEGRAL<input type="radio" name="opc" value="int"></h4></td>
									<td><h4>DEVOLUÇÃO PARCIAL<input type="radio" name="opc" value="par"></h4></td>
								</tr>
								<tr>
									<td><h4>NOTA FISCAL:</h4></td>
									<td><input autocomplete="off" name="num_nf" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>OBSERVAÇÃO:</h4></td>
									<td><input autocomplete="off" name="obs_nf" type=text size=64 maxlength=128></td>
								</tr>
							</table>
							<tr>
								<td><input autocomplete="off" class="inputb" type=submit value=PRÓXIMA></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
		<pag3>
			<h1>BAIXA DE CANHOTOS(POR DATA)</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="baixa_canhotos.php">
							<table>
								<tr>
									<td><h4>DATA:</h4></td>
									<td><input autocomplete="off" name="dat_bai" type=date required></td>
								</tr>
								<tr>
									<td><h4>MOTORISTA:</h4></td>
									<td><select name="mot_bai">
										<option value="">...</option>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO REGISTROS DO BANCO
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
								<td><input autocomplete="off" class="inputb" type=submit value=PRÓXIMA></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag3>
	</body>
</html>
<?php
if(isset($_POST['dat_bai'])) {
	#IMPORTANDO CONEXÃO COM O BANCO
		require('../connect.php');
	#VARIÁVEIS DO FORMULÁRIO
		$dat_bai = trim($_POST['dat_bai']);
		$mot_bai = trim($_POST['mot_bai']);
	
#ADQUIRINDO DADOS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `saida` = '$dat_bai' AND `motorista` = '$mot_bai'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
	if($n!=0){
		$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'ENTREGUE' WHERE `saida` = '$dat_bai' AND `motorista` = '$mot_bai'");
?>
			<script>alert("NOTAS ATUALIZADAS!")</script>
<?php
	}else{
?>
			<script>alert("MOTORISTA SEM ENTREGA NESTA DATA!")</script>
<?php
	}
}
if(isset($_POST['num_nf'])) {
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $num_nf = trim($_POST['num_nf']);
    $obs_nf = trim($_POST['obs_nf']);

#VERIFICANDO EXISTÊNCIA DO INPUT
	if(!isset($_POST['opc'])) {
        $ver_ent = "nul";
    }else{
        $ver_ent = $_POST['opc'];
    }
#ADQUIRINDO DADOS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' AND `status` = 'ROTA' ORDER BY `id` DESC LIMIT 1");
	$con = mysqli_fetch_array($sql);
	if(!isset($con['id'])) {
		$id = null;
	}else{
		$id = $con['id'];
	}
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERICANDO INPUT SELECIONADO
	switch($ver_ent){
		case "ent":
#VERIFICANDO O NÚMERO DE CADASTROS
			if($n != 0){
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
#CADASTROS POR COLUNAS
				$v = mysqli_fetch_array($sql);
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
				if(!isset($v['tentativas'])) {
					$t = null;
				}else{
					$t = $v['tentativas'];
				}
#VERIFICANDO RESULTADO DA COLUNA
				if($t>1){
#ATUALIZANDO REGISTRO NO BANCO
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'REENTREGUE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
					?>
						<script>alert("NOTA REENTREGUE")</script>
					<?php
				}else{
					$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'ENTREGUE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
					?>
						<script>alert("NOTA CONFERIDA")</script>
					<?php
				}
			}else{
				?>
					<script>alert("NOTA NÃO ENCONTRADA")</script>
				<?php
			}
			break;
		case "pen":
			if($n != 0)
			{
				$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'PENDENTE', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				?>
					<script>alert("NOTA PENDENTE")</script>
				<?php
			}else{
				?>
				<script>alert("NOTA NÃO ENCONTRADA")</script>
				<?php
			}
			break;
		case "int":
			if($n != 0)
			{
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
				$v = mysqli_fetch_array($sql);
				$cid_cli = $v['cidade_cliente'];
				$nom_cli = $v['nome_cliente'];
				$cod_cli = $v['cod_cliente'];
				$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUCAO INTEGRAL', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				$sql2 = mysqli_query($conn,"INSERT INTO $tab_dev (`nota`, `cidade`, `cliente`, `cod_cliente`, `tipo`, `status`) VALUES ('$num_nf', '$cid_cli', '$nom_cli', '$cod_cli', 'INTEGRAL', 'INFORMAR')");
				?>
					<script>alert("NOTA DEVOLVIDA")</script>
				<?php
			}else{
				?>
				<script>alert("NOTA NÃO ENCONTRADA")</script>
				<?php
			}
			break;
		case "par":
			if($n != 0)
			{
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
				$v = mysqli_fetch_array($sql);
				$cid_cli = $v['cidade_cliente'];
				$nom_cli = $v['nome_cliente'];
				$cod_cli = $v['cod_cliente'];
				$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUCAO PARCIAL', `observacao` = '$obs_nf' WHERE `id` = '$id'");
				$sql2 = mysqli_query($conn,"INSERT INTO $tab_dev(`nota`,`cidade`,`cliente`,`cod_cliente`,`tipo`,`status`) VALUES('$num_nf','$cid_cli','$nom_cli','$cod_cli','INTEGRAL','INFORMAR')'");
				?>
					<script>alert("NOTA ENTREGUE")</script>
				<?php
			}else{
				?>
				<script>alert("NOTA NÃO ENCONTRADA")</script>
				<?php
			}
	}
    }
}
}
?>