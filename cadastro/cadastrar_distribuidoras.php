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
	<div class="bar">
			<div class="dropdown">
        		<img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
				<div id="myDropdown" class="dropdown-content">
					<a href="..\saida/form_saida_motorista.php"><img src=..\imagem/saida.png> >SAÍDA DE MOTORISTAS</img></a>
					<a href="..\saida/baixa_canhotos.php"><img src=..\imagem/baixa.png>>BAIXA DE CANHOTOS</a>
					<a href="..\saida/form_romaneio_cargas.php"><img src=..\imagem/romaneio.png>>ROMANEIO DE CARGAS</a>
					<a href="..\saida/registro_devolucao.php"><img src=..\imagem/devolucao.png>>REGISTRO DE DEVOLUÇÕES</a>
					<a href="..\saida/agendar_entrega.php"><img src=..\imagem/agendar.png>>AGENDAR ENTREGA</a>
					<a href="..\cadastro/cadastrar_nfs.php"><img src=..\imagem/cad_not.png>>CADASTRO NOTAS</a>
					<a href="..\cadastro/cadastrar_clientes.php"><img src=..\imagem/cad_cli.png>>CADASTRO CLIENTES</a>
					<a href="..\cadastro/cadastrar_distribuidoras.php"><img src=..\imagem/cad_dis.png>>CADASTRO DISTRIBUIDORAS</a>
					<a href="..\pesquisa/form_pesquisar_nfs.php"><img src=..\imagem/pes_not.png>>PESQUISAR NOTAS</a>
					<a href="..\pesquisa/form_pesquisar_clientes.php"><img src=..\imagem/pes_cli.png>>PESQUISAR CLIENTES</a>
					<a href="..\pesquisa/form_pesquisar_distribuidoras.php"><img src=..\imagem/pes_dis.png>>PESQUISAR DISTRIBUIDORAS</a>
					<a href="..\cadastro/cadastrar_motoristas.php"><img src=..\imagem/cad_mot.png>>CADASTRAR MOTORISTA</a>
					<a href="..\pesquisa/form_pesquisar_motoristas.php"><img src=..\imagem/pes_mot.png>>PESQUISAR MOTORISTA</a>
					<a href="..\financeiro/form_relatorio_diario.php"><img src=..\imagem/diario.png>>RELATÓRIO DIÁRIO</a>
					<a href="..\financeiro/form_relatorio_diario_cidades.php"><img src=..\imagem/cid_dia.png>>RELATÓRIO DIÁRIO CIDADES</a>
					<a href="..\financeiro/form_relatorio_mensal.php"><img src=..\imagem/mensal.png>>RELATÓRIO MENSAL</a>
					<a href="..\financeiro/form_relatorio_mensal_cidades.php"><img src=..\imagem/cid_mes.png>>RELATÓRIO MENSAL CIDADES</a>
					<a href="..\financeiro/form_relatorio_anual.php"><img src=..\imagem/anual.png>>RELATÓRIO ANUAL</a>
					<a href="..\financeiro/form_relatorio_anual_cidades.php"><img src=..\imagem/cid_ano.png>>RELATÓRIO ANUAL CIDADES</a>
					<a href="..\financeiro/form_frete_motoristas.php"><img src=..\imagem/fre_mot.png>>FRETE MOTORISTAS</a>
					<a href="..\financeiro/form_fechamento_distribuidoras.php"><img src=..\imagem/fec_dis.png>>FECHAMENTO DISTRIBUIDORAS</a>
					<a href="..\financeiro/form_fechamento_motoristas.php"><img src=..\imagem/fec_mot.png>>FECHAMENTO MOTORISTAS</a>
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
		</div>
<?php
	if(!isset($_POST['nom_dis'])){
?>
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input autocomplete="off" name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input autocomplete="off" name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input autocomplete="off" name="cad_dis" type=date required></td>
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
		?>
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input autocomplete="off" name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input autocomplete="off" name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input autocomplete="off" name="cad_dis" type=date required></td>
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
    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
    $cad_dis = trim($_POST['cad_dis']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<script>alert("DISTRIBUIDORA JÁ CADASTRADA!");</script>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis(`nome`, `porcentagem`, `cadastro`) VALUES ('$nom_dis', '$por_dis', '$cad_dis')");
?>
			<script>alert("DISTRIBUIDORA CADASTRADA COM SUCESSO!");</script>
<?php
	}
}
?>
		<urd>
			<table class="tableb" border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<th><h3>EXCLUIR</h3></th>
					<th><h3>EDITAR</h3></th>
					<th><h3>CÓDIGO</h3></th>
					<th><h3>NOME</h3></th>
					<th><h3>CADASTRO</h3></th>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i<$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<form method="post" action="..\excluir/resultado_excluir_distribuidoras.php">
                		<input autocomplete="off" type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/delete.png" alt="submit"></td>
            		</form>
            		<form method="post" action="..\alterar/resultado_alterar_distribuidoras.php">
                		<input autocomplete="off" type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/alter.png" alt="submit"></nobr></td>
					</form>
					<td><h4><nobr><?php echo $vn['codigo'];   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];    ?><nobr></h4></td>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?><nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
			</table>
		</urd>
	</body>
</html>
<?php
    }
}
?>