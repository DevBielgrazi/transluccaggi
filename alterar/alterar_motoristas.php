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
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table class="tableb">
                <tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                <tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
                <tr><td><h2>CADASTROS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>PESQUISAS</h2></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>MOTORISTAS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
                <tr><td><h2>FINANCEIRO</h2></td></tr>
                <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_frete_distribuidoras.php"><button>FRETE DISTRIBUIDORAS</button></a></td></tr>
            </table>
        </menu>
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
                <pag>
                    <h1>ALTERAR MOTORISTAS</h1><p>
                    <table>
                        <tr>
                            <td><h6>MOTORISTA JÁ CADASTRADO</h6></td>
                        </tr>
                    </table>
                </pag>
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
                <pag>
                    <h1>ALTERAR MOTORISTAS</h1><p>
                    <table>
                        <tr>
                            <td><h6>MOTORISTA JÁ CADASTRADO</h6></td>
                        </tr>
                    </table>
                </pag>
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
        <urn>
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
        </urn>
	</body>
</html>
<?php
    }
}
?>