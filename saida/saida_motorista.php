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
#IMPORTANDO CONEXÃO COM O BANCO
require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="print.css" media="print"/>
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
                <a href="..\financeiro/form_relatorio_diario_cidades.php">>RELATÓRIO DIÁRIO CIDADES</a>
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
		<back>
        	<a href="form_saida_motorista.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
		</div>
		<pag>
			<table>
				<tr>
					<td>
						<form method="post" action="saida_motorista.php">
							<table>
								<input autocomplete="off" type="hidden" name="n" value=1>
								<input autocomplete="off" type="hidden" name="mot_sai" value="<?php echo $mot_sai;  ?>">
								<input autocomplete="off" type="hidden" name="dat_sai" value="<?php echo $dat_sai;  ?>">
								<tr>
									<td><h4>NOTA FISCAL:</h4></td>
									<td><input autocomplete="off" name="not_sai" type=text size=16 maxlength=16 required></td>
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
<?php
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_sai'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n1 = mysqli_num_rows($sql);
#VERIFICANDO NÚMERO DE REGISTROS
	if($n1!=0){
#CADASTROS POR COLUNAS
		$sql2 = mysqli_fetch_array($sql);
		$nom_mot = $sql2['nome'];
		$vei_mot = $sql2['veiculo'];
		$pla_mot = $sql2['placa'];
?>
	<rs>
		<table class="tableb" border=2>
			<tr><h3>SAÍDA MOTORISTA</h3></tr>
			<tr>
				<th><form method="post" action="imprimir_saida.php" target="_blank">
					<input autocomplete="off" type="hidden" name="mot_sai" value="<?php echo $mot_sai;  ?>">
					<input autocomplete="off" type="hidden" name="dat_sai" value="<?php echo $dat_sai;  ?>">
					<input autocomplete="off" class="inpute" type=image width=5% src="..\imagem/imprimir.png" alt=submit>
				</form></th>
				<th><h3>DATA:<?php  echo date( 'd/m/Y' , strtotime($dat_sai)); ?></h3></th>
				<th><h3>MOTORISTA:<?php  echo $nom_mot; ?></h3></th>
				<th><h3>VEÍCULO:<?php echo $vei_mot  ?></h3></th>
				<th><h3>PLACA:<?php echo $pla_mot  ?></h3></th>
				<form method="post" action="cancelar_saida.php">
                    <input autocomplete="off" type="hidden" name="mot_sai" value="<?php echo $mot_sai;?>">
                    <input autocomplete="off" type="hidden" name="dat_sai" value="<?php echo $dat_sai;?>">
                    <th><nobr><input autocomplete="off" class="inpute" width="20" type="image" src="..\imagem/cancel.png" alt="submit"></th>
                </form>
			</tr>
			<tr>
				<th><h3>NF</h3></th>
				<th><h3>VALOR</h3></th>
				<th><h3>VOLUMES</h3></th>
				<th><h3>CLIENTE</h3></th>
				<th><h3>CIDADE</h3></th>
				<th><h3>REMOVER</h3></th>
		</tr>
<?php
#INICIANDO CONTADOR
    $i=0;
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
	if(!isset($_POST['not_sai'])) {
        $not_sai = null;
    }else{
        $not_sai = trim($_POST['not_sai']);
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$not_sai' ORDER BY `id` DESC LIMIT 1");
	$v = mysqli_fetch_array($sql);
	if(!isset($v['id'])) {
        $id = null;
    }else{
        $id = $v['id'];
    }
#VERIFICANDO COLUNA NO BANCO
	if(!isset($v['tentativas'])){
        $t = 1;
    }else{
        $t = $v['tentativas']+1;
    }
#ATUALIZANDO REGISTRO NO BANCO
	$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `motorista` = '$nom_mot',`saida` = '$dat_sai',`status` = 'ROTA',`tentativas` = '$t' WHERE `id` = '$id'");
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$n = mysqli_num_rows($sql);
	if($n!=0){
#APRESENTANDO REGISTROS NO BANCO
		while($i!=$n){
			$vn = mysqli_fetch_array($sql);
?>
				<tr>
					<td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
					<td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
				<form method="post" action="remover_nf.php">
                    <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    <input autocomplete="off" type="hidden" name="mot_sai" value="<?php echo $mot_sai;?>">
                    <input autocomplete="off" type="hidden" name="dat_sai" value="<?php echo $dat_sai;?>">
                    <td><nobr><input autocomplete="off" class="inpute" width="20" type="image" src="..\imagem/cancel.png" alt="submit"></td>
                </form>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
		}
	}else{
		if(isset($not_sai)){
?>
			<script>
				alert("NOTA NÃO ENCONTRADA!");
			</script>
<?php
		}
	}
	}else{
		$nom_mot = null;
		$vei_mot = null;
		$pla_mot = null;
		?>
			<script>
				alert("MOTORISTA NÃO CADASTRADO!");
				document.location.href="form_saida_motorista.php";
			</script>
		<?php
	}
?>
	</body>
</html>
<?php
    }
}
?>