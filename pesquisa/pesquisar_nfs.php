<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet">
		<title>Matriz Principal</title>
	</head> 
	<body>	
        <menu>
            <a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
                <table class="tableb">
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
                <tr><h3>NOTAS FISCAIS</h3></tr>
                <tr>
					<td><h3></h3></td>
					<td><h3></h3></td>
					<td><h3>NÚMERO</h3></td>
					<td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>SAÍDA</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>NOME_<br>CLIENTE</h3></td>
                    <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
                    <td><h3>MOTORISTAS</h3></td>
                    <td><h3>STATUS</h3></td>						
				</tr>
<?php
	require('../connect.php');
	
	$num_nf = trim($_POST['num_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $emi_nf2 = trim($_POST['emi_nf2']);
    $ent_nf = trim($_POST['ent_nf']);
    $ent_nf2 = trim($_POST['ent_nf2']);
    $sai_nf = trim($_POST['sai_nf']);
    $sai_nf2 = trim($_POST['sai_nf2']);
    $rot_nf = trim($_POST['rot_nf']);
    $cid_cli = trim($_POST['cid_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cod_dis = trim($_POST['cod_dis']);
    $mot_nf = trim($_POST['mot_nf']);
    $sta_nf = trim($_POST['sta_nf']);

    if(!isset($_POST['opc'])) {
        $fil_nf = "nul";
    } else {
        $fil_nf = $_POST['opc'];
    }

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
        case 'cli':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` = '$nom_cli'  ORDER BY `id` DESC");
            break;
        case 'dis':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$cod_dis'  ORDER BY `id` DESC");
            break;
        case 'cidd':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cidade_cliente` = '$cid_cli' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
            break;
        case 'clid':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` = '$nom_cli' and `entrada` >= '$ent_nf' and `entrada` <= '$ent_nf2'  ORDER BY `id` DESC");
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
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` = '$nom_cli' and `emissao` >= '$emi_nf' and `emissao` <= '$emi_nf2'  ORDER BY `id` DESC");
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
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `nome_cliente` = '$nom_cli' and `saida` >= '$emi_nf' and `saida` <= '$emi_nf2'  ORDER BY `id` DESC");
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

    $n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql); ?>
                                    <tr>
                                <form method="post" action="..\excluir/resultado_excluir_nfs.php">
                                    <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                    <td><nobr><input width="40" type="image" src="..\imagem/delete.png" alt="submit"></td>
                                </form>                        
                                <form method="post" action="..\alterar/resultado_alterar_nfs.php">
                                    <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                        <td><input width="40" type="image" src="..\imagem/alter.png" alt="submit"></td>
                                        <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['saida']));    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['motorista'];    ?></nobr></h4></td>
                                        <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>					
                                    </tr>
                                </form>                                            
                        <?php   $i = $i + 1;
                    }
?>
            </table>
        </rn>	
	</body>
</html>