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
                    <tr><td><a href="../saida/form_saida_motorista.html"><button>SAÍDA DE MOTORISTAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_baixa_canhotos.html"><button>BAIXA DE CANHOTOS</button></a></td></tr>
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
		
    if(!isset($_POST['opc'])){
        $fil_cli = "nul";
    }else
    {
        $fil_cli = $_POST['opc'];
    }

    $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
    $sql2 = mysqli_fetch_array($sql);
    $cod_clia = $sql2['codigo'];
    $cod_disa = $sql2['cod_distribuidora'];
    
    switch($fil_nf){
        case "cod":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli' and `cod_distribuidora` = '$cod_disa'");
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
            }
            else
            {
                $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `codigo` = '$cod_cli' WHERE `id` = '$id'");
            }
            break;
        case "nome":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `nome` = '$nom_cli' WHERE `id` = '$id'");
            break;
        case "age":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `agendar` = '$age_cli' WHERE `id` = '$id'");
            break;
        case "cad":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cadastro` = '$cad_cli' WHERE `id` = '$id'");
            break;
        case "rot":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `rota` = '$rot_cli' WHERE `id` = '$id'");
            break;
        case "cid":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cidade` = '$cid_cli' WHERE `id` = '$id'");
            break;
        case "bai":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `bairro` = '$bai_cli' WHERE `id` = '$id'");
            break;
        case "end":
            $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `endereco` = '$end_cli' WHERE `id` = '$id'");
            break;
        case "dis":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_clia' and `cod_distribuidora` = '$cod_dis'");
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
            }
            else
            {
                $sql2 = mysqli_query($conn,"UPDATE $tab_cli SET `cod_distribuidora` = '$cod_dis' WHERE `id` = '$id'");
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
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
    $n = mysqli_num_rows($sql);
    $i=0;
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
            $i = $i + 1;
        }   
?>
            </table>
        </urn>	
	</body>
</html>