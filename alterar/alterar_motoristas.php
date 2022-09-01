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
                <a href="..\pesquisa/form_pesquisar_motoristas.php"><img src="..\imagem/back.png" width=20%></a>
            </back>
            <logo>
                <a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
            </logo>
            <exit>
                <a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
            </exit>
		</div>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cad_mot = trim($_POST['cad_mot']);
	$nom_mot = trim($_POST['nom_mot']);
	$vei_mot = trim($_POST['vei_mot']);
	$pla_mot = trim($_POST['pla_mot']);
	$tel_mot = trim($_POST['tel_mot']);
	$end_mot = trim($_POST['end_mot']);
    $cpf_mot = trim($_POST['cpf_mot']);
	$rg_mot = trim($_POST['rg_mot']);
	$nas_mot = trim($_POST['nas_mot']);
	$nat_mot = trim($_POST['nat_mot']);
	$cnh_mot = trim($_POST['cnh_mot']);
	$val_mot = trim($_POST['val_mot']);
	$cat_mot = trim($_POST['cat_mot']);
	$cep_mot = trim($_POST['cep_mot']);
	$ban_mot = trim($_POST['ban_mot']);
	$cod_mot = trim($_POST['cod_mot']);
	$age_mot = trim($_POST['age_mot']);
	$con_mot = trim($_POST['con_mot']);
	$ano_mot = trim($_POST['ano_mot']);
	$cor_mot = trim($_POST['cor_mot']);
	$ren_mot = trim($_POST['ren_mot']);
	$num_mot = trim($_POST['num_mot']);
	$ant_mot = trim($_POST['ant_mot']);
	$caa_mot = trim($_POST['caa_mot']);
	$vaa_mot = trim($_POST['vaa_mot']);
	$id = trim($_POST['id']);
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_mot = "nul";
    }else{
        $fil_mot = $_POST['opc'];
    }
#ADQUIRINDO INFORMAÇÕES DO  BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `id` = '$id'");
    $nom_mota = trim($_POST['nom_mot']);
	$pla_mota = trim($_POST['pla_mot']);
#VERIFICANDO INPUT SELECIONADO
    switch($fil_mot){
        case "cad":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cadastro` = '$cad_mot' WHERE `id` = '$id'");
            break;
        case "nom":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mot' and `placa` = '$pla_mota'");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
            $n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE RESULTADOS
            if($n!=0){
                ?>
                <script>
			        alert("MOTORISTA JÁ CADASTRADO!");
			    </script>
            <?php
            }else{
#ALTERANDO DADOS DO CAMPO SELECIONADO
                $sql = mysqli_query($conn,"UPDATE $tab_mot SET `nome` = '$nom_mot' WHERE `id` = '$id'");
            }
            break;
        case "vei":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `veiculo` = '$vei_mot'  WHERE `id` = '$id'");
            break;
        case "pla":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mota' and `placa` = '$pla_mot'");
            $n = mysqli_num_rows($sql);
            if($n!=0){
                ?>
                <script>
			        alert("MOTORISTA JÁ CADASTRADO!");
			    </script>
            <?php
            }
            else
            {
                $sql = mysqli_query($conn,"UPDATE $tab_mot SET `placa` = '$pla_mot' WHERE `id` = '$id'");
            }
            break;
        case "tel":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `telefone` = '$tel_mot'  WHERE `id` = '$id'");
            break;
        case "end":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `endereco` = '$end_mot'  WHERE `id` = '$id'");
            break;
        case "cpf":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cpf` = '$cpf_mot'  WHERE `id` = '$id'");
            break;
        case "rg":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `rg` = '$rg_mot'  WHERE `id` = '$id'");
            break;
        case "nas":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `nascimento` = '$nas_mot'  WHERE `id` = '$id'");
            break;
        case "nat":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `naturalidade` = '$nat_mot'  WHERE `id` = '$id'");
            break;
        case "cnh":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cnh` = '$cnh_mot'  WHERE `id` = '$id'");
            break;
        case "val":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `validade_cnh` = '$val_mot'  WHERE `id` = '$id'");
            break;
        case "cat":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `categoria_cnh` = '$cat_mot'  WHERE `id` = '$id'");
            break;
        case "cep":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cep` = '$cep_mot'  WHERE `id` = '$id'");
            break;
        case "ban":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `banco` = '$ban_mot'  WHERE `id` = '$id'");
            break;
        case "cod":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cod_banco` = '$cod_mot'  WHERE `id` = '$id'");
            break;
        case "age":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `agencia_banco` = '$age_mot'  WHERE `id` = '$id'");
            break;
        case "con":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `conta_banco` = '$con_mot'  WHERE `id` = '$id'");
            break;
        case "ano":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `ano_veiculo` = '$ano_mot'  WHERE `id` = '$id'");
            break;
        case "cor":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cor_veiculo` = '$cor_mot'  WHERE `id` = '$id'");
            break;
        case "ren":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `renavam` = '$ren_mot'  WHERE `id` = '$id'");
            break;
        case "num":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `num_chassi` = '$num_mot'  WHERE `id` = '$id'");
            break;
        case "ant":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `antt` = '$ant_mot'  WHERE `id` = '$id'");
            break;
        case "caa":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `categoria_antt` = '$caa_mot'  WHERE `id` = '$id'");
            break;
        case "vaa":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `validade_antt` = '$vaa_mot'  WHERE `id` = '$id'");
            break;
        default:
            $sql = mysqli_query($conn, "SELECT * FROM $tab_mot WHERE `id` = '0'");
    }
?>
        <urn2>
            <table border=1>
                <h3>MOTORISTAS CADASTRADOS</h3>
                <tr>
					<td><h3>CADASTRO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>VEÍCULO</h3></td>
					<td><h3>PLACA</h3></td>
					<td><h3>TELEFONE</h3></td>
					<td><h3>ENDERECO</h3></td>
				</tr>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `id` = '$id'");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO O CONTADOR
    $i=0;
#APRESENTANDO OS DADOS DA TABELA
        while($i!=$n)
        {
#CADASTROS POR COLUNA
            $vn = mysqli_fetch_array($sql);
?>
                    <tr>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>
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