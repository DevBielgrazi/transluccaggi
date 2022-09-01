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
                <a href="form_pesquisar_clientes.php"><img src="..\imagem/back.png" width=20%></a>
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
                <tr><h3>CLIENTES</h3></tr>
                <tr>
					<th><h3>EXCLUIR</h3></th>
					<th><h3>EDITAR</h3></th>
					<th><h3>CÓDIGO</h3></th>
					<th><h3>NOME</h3></th>
                    <th><h3>AGENDAR</h3></th>
                    <th><h3>CADASTRO</h3></th>
                    <th><h3>ROTA</h3></th>
                    <th><h3>CIDADE</h3></th>
                    <th><h3>BAIRRO</h3></th>
                    <th><h3>ENDEREÇO</h3></th>
                    <th><h3>COD_DISTRIBUIDORA</h3></th>
				</tr>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cod_cli = trim($_POST['cod_cli']);
	$nom_cli = trim($_POST['nom_cli']);
	$cad_cli = trim($_POST['cad_cli']);
	$cad_cli2 = trim($_POST['cad_cli2']);
	$rot_cli = trim($_POST['rot_cli']);
	$cid_cli = trim($_POST['cid_cli']);
	$cod_dis = trim($_POST['cod_dis']);
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])) {
        $fil_cli = "nul";
    }else{
        $fil_cli = $_POST['opc'];
    }
#VERIFICANDO INPUT SELECIONADO
    switch ($fil_cli){
        case 'tod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli  ORDER BY `id` DESC");
            break;
        case 'disc':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `cod_distribuidora` = '$cod_dis' and `cadastro` >= '$cad_cli' and `cadastro` <= '$cad_cli2' ORDER BY `id` DESC");
            break;
        case 'cod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli' ORDER BY `id` DESC");
            break;
        case 'nom':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `nome` LIKE '%$nom_cli%'  ORDER BY `id` DESC");
            break;
        case 'ages':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `agendar` = 'SIM' ORDER BY `id` DESC");
            break;
        case 'agen':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `agendar` = 'NÃO' ORDER BY `id` DESC");
            break;
        case 'cad':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `cadastro` >= '$cad_cli' and `cadastro` <= '$cad_cli2' ORDER BY `id` DESC");
            break;
        case 'rot':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `rota` = '$rot_cli' ORDER BY `id` DESC");
            break;
        case 'cid':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `cidade` = '$cid_cli' ORDER BY `id` DESC");
            break;
        case 'dis':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `cod_distribuidora` = '$cod_dis' ORDER BY `id` DESC");
            break;
        default:
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '0'");
            break;
    }
#TRANSFORMANDO RESULTADOS EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
    while($i!=$n)
    {
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
                    <td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['endereco'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
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