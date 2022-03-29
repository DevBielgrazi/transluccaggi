<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
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

	$cad_mot = trim($_POST['cad_mot']);
	$nom_mot = trim($_POST['nom_mot']);
	$vei_mot = trim($_POST['vei_mot']);
	$pla_mot = trim($_POST['pla_mot']);
	$tel_mot = trim($_POST['tel_mot']);
	$end_mot = trim($_POST['end_mot']);
	$id = trim($_POST['id']);
    
    if(!isset($_POST['opc'])){
        $fil_mot = "nul";
    }else
    {
        $fil_mot = $_POST['opc'];
    }
    
    $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `id` = '$id'");
    $nom_mota = trim($_POST['nom_mot']);
	$pla_mota = trim($_POST['pla_mot']);

    switch($fil_mot){
        case "cad":
            $sql = mysqli_query($conn,"UPDATE $tab_mot SET `cadastro` = '$cad_mot' WHERE `id` = '$id'");
            break;
        case "nom":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mot' and `placa` = '$pla_mota'");
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
    $n = mysqli_num_rows($sql);
    $i=0;
        while($i!=$n)
        {
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
            $i = $i + 1;
        }   
?>
            </table>
        </urn>	
	</body>
</html>