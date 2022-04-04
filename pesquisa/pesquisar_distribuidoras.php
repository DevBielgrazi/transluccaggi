<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.html"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
                <table class="tableb">
                    <tr><td><a href="../saida/form_saida_motorista.html"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                    <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
                    <tr><td><h2>CADASTROS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>PESQUISAS</h2></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>MOTORISTAS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.html"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>
        <rn>
            <table border=1>
                <tr><h3>DISTRIBUIDORAS</h3></tr>
                <tr>
					<td><h3></h3></td>
					<td><h3></h3></td>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
                    <td><h3>CADASTRO</h3></td>
				</tr>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cod_dis = trim($_POST['cod_dis']);
	$nom_dis = trim($_POST['nom_dis']);
	$cad_dis = trim($_POST['cad_dis']);
	$cad_dis2 = trim($_POST['cad_dis2']);
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_dis = "nul";
    }else{
        $fil_dis = $_POST['opc'];
    }
#VERIFICANDO INPUT SELECIONADO
    switch ($fil_dis){
        case 'tod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_dis  ORDER BY `codigo` DESC");
            break;
        case 'cod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis' ORDER BY `codigo` DESC");
            break;
        case 'nom':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis' ORDER BY `codigo` DESC");
            break;
        case 'cad':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `cadastro` >= '$cad_dis' and `cadastro` <= '$cad_dis2' ORDER BY `codigo` DESC");
            break;
        default:
            $sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '0'");
            break;
    }
#TRANSFORMANDO RESULTADO EM NÚMEROS
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
            <form method="post" action="..\excluir/resultado_excluir_distribuidoras.php">
                <input type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><nobr><input width="40" type="image" src="..\imagem/delete.png" alt="submit"></td>
            </form>
            <form method="post" action="..\alterar/resultado_alterar_distribuidoras.php">
                <input type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><input width="40" type="image" src="..\imagem/alter.png" alt="submit"></nobr></td>
                    <td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
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