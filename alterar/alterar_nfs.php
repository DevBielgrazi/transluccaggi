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
<?php
	require('../connect.php');
	
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
    $id = $_POST['id'];
		
    if(!isset($_POST['opc'])){
        $fil_nf = "nul";
    }else
    {
        $fil_nf = $_POST['opc'];
    }

    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
    $sql2 = mysqli_fetch_array($sql);
    $num_nfa = $sql2['numero'];
    $ser_nfa = $sql2['serie'];
    $cod_clia = $sql2['cod_cliente'];
    $cod_disa = $sql2['cod_distribuidora'];
    
    switch($fil_nf){
        case "num":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `serie` = '$ser_nfa' and `cod_distribuidora` = '$cod_disa'");
            $n = mysqli_num_rows($sql);    
            if($n!=0){
                ?>
				<pag>
					<h1>ALTERAR NOTAS FISCAIS</h1><p>
					<table>
						<tr>
							<td><h6>NOTA JÁ CADASTRADA</h6></td>
						</tr>
					</table>
				</pag>
			<?php
            }
            else
            {
                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `numero` = '$num_nf' WHERE `id` = '$id'");
            }
            break;
        case "ser":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nfa' and `serie` = '$ser_nf' and `cod_distribuidora` = '$cod_disa'");
            $n = mysqli_num_rows($sql);    
            if($n!=0){
                ?>
				<pag>
					<h1>ALTERAR NOTAS FISCAIS</h1><p>
					<table>
						<tr>
							<td><h7>NOTA JÁ CADASTRADA</h7></td>
						</tr>
					</table>
				</pag>
			<?php
            }
            else{
                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `serie` = '$ser_nf' WHERE `id` = '$id'");
            }
            break;
        case "emi":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `emissao` = '$emi_nf' WHERE `id` = '$id'");
            break;
        case "ent":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `entrada` = '$ent_nf' WHERE `id` = '$id'");
            break;
        case "val":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `valor` = '$val_nf' WHERE `id` = '$id'");
            break;
        case "pes":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `peso` = '$pes_nf' WHERE `id` = '$id'");
            break;
        case "cli":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
		
		    $n2 = mysqli_num_rows($sql);
	
            if($n2!=0)
            {
                $sql3 = mysqli_fetch_array($sql);
                $cod_dis = $sql3['cod_distribuidora'];
                $rot_nf = $sql3['rota'];
                $nom_cli = $sql3['nome'];
                $cid_cli = $sql3['cidade'];
                $bai_cli = $sql3['bairro'];
                $end_cli = $sql3['endereco'];
                $age = $sql3['agendar'];

                if($age!="SIM")
                {
                    $status = "DISPONÍVEL";
                }
                else{
                    $status = "AGENDAR";
                }

                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `cod_cliente` = '$cod_cli', `rota` = '$rot_nf', `nome_cliente` = '$nom_cli', `bairro_cliente` = '$bai_cli', `cidade_cliente` = '$cid_cli', `endereco_cliente` = '$end_cli', `cod_distribuidora` = '$cod_dis', `status` = '$status' WHERE `id` = '$id'");
            }
            else
            {
?>
				<pag>
					<h1>ALTERAR NOTAS FISCAIS</h1><p>
					<table>
						<tr>
							<td><h7>CLIENTE NÂO CADASTRADO</h7></td>
						</tr>
					</table>
				</pag>
<?php    
            }
            break;
        default:
            $sql2 = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
            break;
    }
?>
        <urn>
            <table border=1>
                <h3>NOTAS CADASTRADAS</h3>
                <tr>
                    <td><h3>NÚMERO</h3></td>
                    <td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>COD_<br>CLIENTE</h3></td>
                    <td><h3>STATUS</h3></td>						
                </tr>		
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
    $n = mysqli_num_rows($sql);
    $i=0;
        while($i!=$n)
        {
            $vn = mysqli_fetch_array($sql); 
?>                        
                    <tr>
                        <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>					
                    </tr>                                            
<?php   
            $i = $i + 1;
        }   
?>
            </table>
        </urn>	
	</body>
</html>