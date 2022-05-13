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
            <tr><td><a href="..\financeiro/form_relatorio_diario.php"><button>RELATÓRIO DIÁRIO</button></a></td></tr>
            <tr><td><a href="..\financeiro/form_relatorio_mensal.php"><button>RELATÓRIO MENSAL</button></a></td></tr>
            <tr><td><a href="..\financeiro/form_relatorio_anual.php"><button>RELATÓRIO ANUAL</button></a></td></tr>
            <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
            <tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
            <tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
        </table>
    </menu>
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
				<pag>
					<h1>ALTERAR CLIENTES</h1><p>
					<table>
						<tr>
							<td><h6>CLIENTE JÁ CADASTRADO</h6></td>
						</tr>
					</table>
				</pag>
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
				<pag>
					<h1>ALTERAR CLIENTES</h1><p>
					<table>
						<tr>
							<td><h6>CLIENTE JÁ CADASTRADO</h6></td>
						</tr>
					</table>
				</pag>
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
        <urn>
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
                    <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
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
        </urn>
	</body>
</html>
<?php
    }
}
?>