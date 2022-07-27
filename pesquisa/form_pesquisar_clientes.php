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
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
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
									<td><input autocomplete="off" name="cod_cli" type=text size=16 maxlength=16 ></td>
								</tr>
                                <tr>
									<td><h4>NOME:<input type="radio" name="opc" value="nom"></h4></td>
									<td><input autocomplete="off" name="nom_cli" type=text size=16 maxlength=32 ></td>
								</tr>
                                <tr>
									<td><h4>AGENDAMENTO: SIM<input type="radio" name="opc" value="ages"></h4></td>
									<td><h4>NÃO<input type="radio" name="opc" value="agen"></h4></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:<input type="radio" name="opc" value="cad"></h4></td>
									<td><input autocomplete="off" name="cad_cli" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input autocomplete="off" name="cad_cli2" type=date ></td>
								</tr>
								<tr>
									<td><h4>ROTA:<input type="radio" name="opc" value="rot"></h4></td>
									<td><select name="rot_cli">
										<option value="" selected>...</option>
										<option value="VP00">VP00</option>
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
									<td><select name="cid_cli">
										<option value="" selected>...</option>
<?php
#IMPORTANDO CONEXÃO DO BANCO
require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
$sql = mysqli_query($conn,"SELECT DISTINCT `cidade` FROM $tab_cli ORDER BY `cidade`");
#TRANSFORMANDO RESULTADO EM NÚMEROS
$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
$i=0;
#APRESENTANDO REGISTROS DO BANCO
while($i!=$n){
#CADASTROS POR COLUNA
	$v = mysqli_fetch_array($sql);
	?><option value="<?php	echo $v['cidade']	?>"><?php	echo	$v['cidade']	?></option><?php
#SOMANDO AO CONTADOR
	$i=$i+1;
}
?>
									</select></td>
								</tr>
                                <tr>
									<td><h4>DISTRIBUIDORA:<input type="radio" name="opc" value="dis"></h4></td>
									<td><select name="cod_dis">
										<option value="" selected>...</option>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO REGISTROS DO BANCO
	while($i!=$n){
#CADASTROS POR COLUNA
		$v = mysqli_fetch_array($sql);
		?><option value=<?php	echo $v['codigo']	?>><?php	echo	$v['nome']	?></option><?php
#SOMANDO AO CONTADOR
		$i=$i+1;
	}
?>
										</select></td>
									</tr>
							</table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=PESQUISAR></td>
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