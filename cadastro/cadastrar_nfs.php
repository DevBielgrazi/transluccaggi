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
	if(!isset($_POST['num_nf'])){
?>
		<pag>
			<h1>CADASTRAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_nfs.php">
							<table>
								<tr>
									<td><h4>NÚMERO:</h4></td>
									<td><input autocomplete="off" name="num_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input autocomplete="off" name="ser_nf" type=int size=16 maxlength=8 required></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:</h4></td>
									<td><input autocomplete="off" name="emi_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:</h4></td>
									<td><input autocomplete="off" name="ent_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input autocomplete="off" name="vol_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input autocomplete="off" name="val_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PESO:</h4></td>
									<td><input autocomplete="off" name="pes_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO CLIENTE:</h4></td>
									<td><input autocomplete="off" name="cod_cli" type=int size=16 maxlength=16 required></td>
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
			<h1>CADASTRAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_nfs.php">
							<table>
								<tr>
									<td><h4>NÚMERO:</h4></td>
									<td><input autocomplete="off" name="num_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input autocomplete="off" name="ser_nf" type=int size=16 maxlength=8 required></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:</h4></td>
									<td><input autocomplete="off" name="emi_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:</h4></td>
									<td><input autocomplete="off" name="ent_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input autocomplete="off" name="vol_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input autocomplete="off" name="val_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PESO:</h4></td>
									<td><input autocomplete="off" name="pes_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO CLIENTE:</h4></td>
									<td><input autocomplete="off" name="cod_cli" type=int size=16 maxlength=16 required></td>
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
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $vol_nf = trim($_POST['vol_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
#ADQUIRINDO INFORMAÇÕES DA TABELA
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
#CADASTROS POR COLUNA
	$sql2 = mysqli_fetch_array($sql);
	if(!isset($sql2['cod_distribuidora'])) {
		$cod_dis = null;
    }else{
		$cod_dis = $sql2['cod_distribuidora'];
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `serie` = '$ser_nf' and `cod_distribuidora` = '$cod_dis'");
#TRANSFORMANDO RESULTADOS EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO CADASTROS NA TABELA
	if($n != 0){
?>
			<script>alert("NOTA JÁ CADASTRADA!");</script>
<?php
	}else{
		$sql2 = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
		$n2 = mysqli_num_rows($sql2);
		if($n2 != 0){
			$sql3 = mysqli_fetch_array($sql2);
			$cod_dis = $sql3['cod_distribuidora'];
			$rot_nf = $sql3['rota'];
			$nom_cli = $sql3['nome'];
			$cid_cli = $sql3['cidade'];
			$bai_cli = $sql3['bairro'];
			$end_cli = $sql3['endereco'];
			$age = $sql3['agendar'];
#VERIFICANDO COLUNA DA TABELA
			if($age!="SIM"){
				$status = "DISPONIVEL";
			}else{
				$status = "AGENDAR";
?>
	<script>alert("NOTA À AGENDAR")</script>
<?php
			}
#INSERINDO CADASTROS NA TABELA
			$sql = mysqli_query($conn,"INSERT INTO $tab_nfs (`numero`, `serie`, `emissao`, `entrada`, `volumes`, `valor`, `peso`, `rota`, `cod_cliente`, `nome_cliente`, `cidade_cliente`, `bairro_cliente`, `endereco_cliente`, `cod_distribuidora`, `status`)  VALUES ('$num_nf', '$ser_nf', '$emi_nf', '$ent_nf', '$vol_nf', '$val_nf', '$pes_nf', '$rot_nf', '$cod_cli', '$nom_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis', '$status')");
?>
				<script>alert("NOTA CADASTRADA COM SUCESSO")</script>
<?php
		}else{
?>
				<script>alert("CLIENTE NÃO CADASTRADO!")</script>
<?php
		}
	}
}
?>
		<urn>
            <table class="tableb" border=2>
                <h3>NOTAS CADASTRADAS</h3>
                <tr>
					<th><h2>EXCLUIR</h2></th>
					<th><h2>EDITAR</h2></th>
					<th><h2>NÚMERO</h2></th>
					<th><h2>SÉRIE</h2></th>
                    <th><h2>EMISSÃO</h2></th>
                    <th><h2>ENTRADA</h2></th>
                    <th><h2>VOLUMES</h2></th>
                    <th><h2>VALOR</h2></th>
                    <th><h2>PESO</h2></th>
                    <th><h2>CIDADE</h2></th>
                    <th><h2>BAIRRO</h2></th>
                    <th><h2>NOME_CLIENTE</h2></th>
				</tr>
<?php
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
				$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
                $i=0;
#APRESENTANDO DADOS DA TABELA
				while($i<$n){
					$vn = mysqli_fetch_array($sql);
?>
					<tr>
				<form method="post" action="..\excluir/resultado_excluir_nfs.php">
                    <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    	<td><nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/delete.png" alt="submit"></td>
                </form>
                <form method="post" action="..\alterar/resultado_alterar_nfs.php">
                    <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                        <td><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/alter.png" alt="submit"></td>
				</form>
						<td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
						<td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['bairro_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
					</tr>
<?php
#SOMANDO AO CONTADOR
					$i = $i + 1;
				}
?>
            </table>
        </urn>
	</body>
</html>
<?php
    }
}
?>