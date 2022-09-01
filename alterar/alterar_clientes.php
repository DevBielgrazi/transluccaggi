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
        	    <a href="..\pesquisa/form_pesquisar_clientes.php"><img src="..\imagem/back.png" width=20%></a>
            </back>
			<logo>
				<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
			</logo>
			<exit>
				<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
			</exit>
		</div>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cod_cli = trim($_POST['cod_cli']);
	$nom_cli = trim($_POST['nom_cli']);
	$age_cli = trim($_POST['age_cli']);
	$cad_cli = trim($_POST['cad_cli']);
	$rot_cli = trim($_POST['rot_cli']);
	$cid_cli = trim($_POST['cid_cli']);
	$bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
	$cod_dis = trim($_POST['cod_dis']);
    $id = $_POST['id'];
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_cli = "nul";
    }else{
        $fil_cli = $_POST['opc'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
#CADASTRADOS POR COLUNA
    $sql2 = mysqli_fetch_array($sql);
    $cod_clia = $sql2['codigo'];
    $cod_disa = $sql2['cod_distribuidora'];
#VERIFICANDO INPUT SELECIONADO
    switch($fil_cli){
        case "cod":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli' and `cod_distribuidora` = '$cod_disa'");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
            $n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
            if($n!=0){
                ?>
				<script>
			        alert("CLIENTE ATUALIZADO!");
			    </script>
			<?php
            }else{
#ALTERANDO DADOS DO CAMPO SELECIONADO
                $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `codigo` = '$cod_cli' WHERE `id` = '$id'");
                $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `cod_cliente` = '$cod_cli' WHERE `cod_cliente` = '$cod_clia'");
            }
            break;
        case "nom":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `nome` = '$nom_cli' WHERE `id` = '$id'");
            $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `nome_cliente` = '$nom_cli' WHERE `cod_cliente` = '$cod_clia'");
            break;
        case "age":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `agendar` = '$age_cli' WHERE `id` = '$id'");
            break;
        case "cad":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cadastro` = '$cad_cli' WHERE `id` = '$id'");
            break;
        case "rot":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `rota` = '$rot_cli' WHERE `id` = '$id'");
            $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `rota` = '$rot_cli' WHERE `cod_cliente` = '$cod_clia'");
            break;
        case "cid":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cidade` = '$cid_cli' WHERE `id` = '$id'");
            $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `cidade_cliente` = '$cid_cli' WHERE `cod_cliente` = '$cod_clia'");
            break;
        case "bai":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `bairro` = '$bai_cli' WHERE `id` = '$id'");
            $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `bairro_cliente` = '$bai_cli' WHERE `cod_cliente` = '$cod_clia'");
            break;
        case "end":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `endereco` = '$end_cli' WHERE `id` = '$id'");
            $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `endereco_cliente` = '$end_cli' WHERE `cod_cliente` = '$cod_clia'");
            break;
        case "dis":
            $sql2 = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_clia' and `cod_distribuidora` = '$cod_dis'");
            $n = mysqli_num_rows($sql);
            if($n!=0){
                ?>
				<script>
			        alert("CLIENTE JÁ CADASTRADO!");
			    </script>
			<?php
            }else{
                $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cod_distribuidora` = '$cod_dis' WHERE `id` = '$id'");
                $sql3 = mysqli_query($conn,"UPDATE $tab_nfs SET `cod_distribuidora` = '$cod_dis' WHERE `cod_cliente` = '$cod_clia'");
            }
        default:
            $sql2 = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
            break;
    }
?>
        <urn2>
            <table border=1>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
                    <td><h3>AGENDAR</h3></td>
                    <td><h3>CADASTRO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>BAIRRO</h3></td>
                    <td><h3>ENDEREÇO</h3></td>
                    <td><h3>COD_DISTRIBUIDORA</h3></td>
                </tr>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
        while($i!=$n)
        {
            $vn = mysqli_fetch_array($sql);
?>
                    <tr>
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
<?php
#SOMANDO AO CONTADOR
            $i = $i + 1;
        }
?>
            </table>
        </urn2>
	</body>
</html>
<?php
    }
}
?>