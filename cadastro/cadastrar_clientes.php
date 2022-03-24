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
							<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
							<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
							<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
							<tr><td><h2>PESQUISAS</h2></td></tr>
                        	<tr><td><a href="../pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
							<tr><td><a href="../pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
							<tr><td><a href="../pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
						</table>
					</menu>
<?php
	require('../connect.php');
	
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
    
	if(!isset($_POST['age'])) {
        $age = "NÂO";
    } else {
        $age = $_POST['age'];
    }
		
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");

	$n = mysqli_num_rows($sql);
	
	if($n != 0)
	{
		?>
			<pag>
				<h2>CADASTRAR CLIENTES</h2><p>
				<table>
					<tr>
						<td><h5>CLIENTE JÁ CADASTRADO</h5></td>
					</tr>
				</table>
			</pag>
		<?php
		
	}
	else
	{
		
		$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
		$n2 = mysqli_num_rows($sql2);
		
		if($n2 != 0)
		{
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli(`codigo`, `nome`, `agendar`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES ('$cod_cli', '$nom_cli', '$age', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");	
			
			?>
				<pag>
					<h2>CADASTRAR CLIENTES</h2><p>
					<table>
						<tr>
							<td><h7>CLIENTE CADASTRADO</h7></td>
						</tr>
					</table>
				</pag>
			<?php						
		}
		else
		{		
			?>
				<pag>
					<h2>CADASTRAR CLIENTES</h2><p>
					<table>
						<tr>
							<td><h6>DISTRIBUIDORA NÃO CADASTRADA</h6></td>
						</tr>
					</table>
				</pag>
			<?php			
		}		
	}
?>
		<urc>
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
                <?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
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
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urc>	
	</body>
</html>