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
				<tr><td><h1>CADASTROS</h1></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h1>PESQUISAS</h1></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
            </table>
		</menu>
        <rn>
            <table border=1>
                <tr><h3>CLIENTES</h3></tr>
                <tr>
					<td></td>
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
	require('../connect.php');
	
	$cod_cli = trim($_POST['cod_cli']);
	$nom_cli = trim($_POST['nom_cli']);
	$cad_cli = trim($_POST['cad_cli']);
	$cad_cli2 = trim($_POST['cad_cli2']);
	$rot_cli = trim($_POST['rot_cli']);
	$cid_cli = trim($_POST['cid_cli']);
	$cod_dis = trim($_POST['cod_dis']);

    if(!isset($_POST['opc'])) {
        $fil_cli = "nul";
    } else {
        $fil_cli = $_POST['opc'];
    }

    switch ($fil_cli) {
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
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `nome` = '$nom_cli' ORDER BY `id` DESC");
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
        case 'codd':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `cod_distribuidora` = '$cod_dis' ORDER BY `id` DESC");
            break;
        default:
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '0'");
            break;
    }

    $n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql); ?>
                            <form method="post" action="..\alterar/resultado_alterar_clientes.php">                        
                                <tr>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                    <td><input width="40" type="image" src="..\imagem/alter.png" alt="submit"></td>
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
                        <?php   $i = $i + 1;
                    }
?>
            </table>
        </rn>	
	</body>
</html>