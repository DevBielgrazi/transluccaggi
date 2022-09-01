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
            <back>
                <a href="form_pesquisar_nfs.php"><img src="..\imagem/back.png" width=20%></a>
            </back>
            <logo>
                <a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
            </logo>
            <exit>
                <a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
            </exit>
		</div>
        <rn>
            <table class="tableb" border=1>
                <tr><h3>NOTAS FISCAIS</h3></tr>
                <tr>
					<th><h3>EXCLUIR</h3></th>
					<th><h3>EDITAR</h3></th>
					<th><h3>NÚMERO</h3></th>
					<th><h3>SÉRIE</h3></th>
                    <th><h3>EMISSÃO</h3></th>
                    <th><h3>ENTRADA</h3></th>
                    <th><h3>SAÍDA</h3></th>
                    <th><h3>VALOR</h3></th>
                    <th><h3>PESO</h3></th>
                    <th><h3>ROTA</h3></th>
                    <th><h3>CIDADE</h3></th>
                    <th><h3>BAIRRO</h3></th>
                    <th><h3>NOME_CLIENTE</h3></th>
                    <th><h3>COD_DISTRIBUIDORA</h3></th>
                    <th><h3>MOTORISTAS</h3></th>
                    <th><h3>STATUS</h3></th>
                    <th><h3>OBSERVAÇÃO</h3></th>
				</tr>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$num_nf = trim($_POST['num_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $emi_nf2 = trim($_POST['emi_nf2']);
    $ent_nf = trim($_POST['ent_nf']);
    $ent_nf2 = trim($_POST['ent_nf2']);
    $sai_nf = trim($_POST['sai_nf']);
    $sai_nf2 = trim($_POST['sai_nf2']);
    $rot_nf = trim($_POST['rot_nf']);
    $cid_cli = trim($_POST['cid_cli']);
    $cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cod_dis = trim($_POST['cod_dis']);
    $mot_nf = trim($_POST['mot_nf']);
    $sta_nf = trim($_POST['sta_nf']);
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_nf = "nul";
    }else{
        $fil_nf = $_POST['opc'];
    }
#VERIFICANDO  INPUT SELECIONADO
    switch ($fil_nf){
        case 'tod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs  ORDER BY `id` DESC");
            break;
        case 'num':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' ORDER BY `id` DESC");
            break;
        case 'emi':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'sai':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `saida` >= '$sai_nf' and `saida` <= '$sai_nf2'  ORDER BY `id` DESC");
            break;
        case 'ent':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'rot':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `rota` = '$rot_nf'  ORDER BY `id` DESC");
            break;
        case 'cid':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cidade_cliente` = '$cid_cli'  ORDER BY `id` DESC");
            break;
        case 'ccl':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_cliente` = '$cod_cli'  ORDER BY `id` DESC");
            break;
        case 'cli':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` LIKE '%$nom_cli%'  ORDER BY `id` DESC");
            break;
        case 'dis':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$cod_dis'  ORDER BY `id` DESC");
            break;
        case 'cidd':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cidade_cliente` = '$cid_cli' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'clid':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` LIKE '% $nom_cli %' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'disd':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$cod_dis' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'motd':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_nf' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'cide':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cidade_cliente` = '$cid_cli' and `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'clie':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` LIKE '% $nom_cli %' and `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'dise':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$cod_dis' and `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'mote':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_nf' and `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'cids':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cidade_cliente` = '$cid_cli' and `saida` >= '$emi_nf' and `saida` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'clis':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` LIKE '% $nom_cli %' and `saida` >= '$emi_nf' and `saida` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'diss':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$cod_dis' and `saida` >= '$emi_nf' and `saida` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'mots':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_nf' and `saida` >= '$emi_nf' and `saida` <= '$emi_nf2'  ORDER BY `id` DESC");
            break;
        case 'sta':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `status` = '$sta_nf'  ORDER BY `id` DESC");
            break;
        case 'mot':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_nf'  ORDER BY `id` DESC");
            break;
        default:
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '0'");
            break;
    }
#TRANSFORMANDO RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
    while($i!=$n){
#CADASTROS POR COLUNA
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
                        <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['saida']));    ?></nobr></h4></td>
                        <td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['bairro_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['motorista'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['observacao'];    ?></nobr></h4></td>
                    </tr>
                </form>
<?php
#SOMANDO AO CONTADOR
        $i = $i + 1;
    }
?>
            </table>
        </rn>
	</body>
</html>
<?php
    }
}
?>