<?php
	require('../connect.php');
	
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `cod_cliente` = '$cod_cli' and `serie` = '$ser_nf'");
	
	$n = mysqli_num_rows($sql);

	if($n != 0)
	{
		?>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
					<link href="..\estilo.css" rel="stylesheet">
					<title>Matriz Principal</title>
				</head> 
				<body>
					<menu>
						<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
						<h1>MATRIZ PRINCIPAL</h1><p>
						<table border=1>
							<tr><td><h2>CADASTROS</h2></td></tr>
							<tr><td><a href="../cadastro/form_cadastrar_nfs.html"><button>CADASTRAR NOTAS</button></a></td></tr>
							<tr><td><a href="../cadastro/form_cadastrar_clientes.html"><button>CADASTRAR CLIENTES</button></a></td></tr>
							<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.html"><button>CADASTRAR DISTRIBUIDORAS</button></a></td></tr>
						</table>
					</menu>
					<pag>	
						<h2>CADASTRAR NOTAS FISCAIS</h2><p>
						<table border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>NOTA JÁ CADASTRADA</h4></td>
										</tr>	
									</table>								
								</td>	
							</tr>
						</table>
					</pag>	
				</body>
			</html>
			<?php
		}
		else
		{		
			$sql2 = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
			$n2 = mysqli_num_rows($sql2);
		
			if($n2 != 0)
			{
				$sql2 = mysqli_query($conn,"INSERT INTO $tab_nfs VALUES ('$num_nf', '$ser_nf', '$emi_nf', '$ent_nf', '$val_nf', '$pes_nf', '$cod_cli', 'DISPONÍVEL', '')");	
				$sql = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf'"));
				
				?>
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
							<link href="..\estilo.css" rel="stylesheet">
							<title>Matriz Principal</title>
						</head> 
						<body>
						<menu>
							<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
							<h1>MATRIZ PRINCIPAL</h1><p>
							<table border=1>
								<tr><td><h2>CADASTROS</h2></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_nfs.html"><button>CADASTRAR NOTAS</button></a></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_clientes.html"><button>CADASTRAR CLIENTES</button></a></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.html"><button>CADASTRAR DISTRIBUIDORAS</button></a></td></tr>
							</table>
						</menu>
							<pag>
								<h2>CADASTRAR NOTAS FISCAIS</h2><p>
								<table border=2>
									<tr>
										<td>
											<table>
												<tr>
													<td><h2>NOTA CADASTRADA:</h2></td>
												</tr>
												<tr>
													<td><h4>NÚMERO:</h4></td>
													<td><h4><?php echo	$sql['numero'];	?></h4></td>
												</tr>
												<tr>
													<td><h4>SÉRIE:</h4></td>
													<td><h4><?php echo	$sql['serie']	?></h4></td>
												</tr>
												<tr>
													<td><h4>EMISSÃO:</h4></td>
													<td><h4><?php	echo	$sql['emissao']	?></h4></td>
												</tr>
												<tr>
													<td><h4>ENTRADA:</h4></td>
													<td><h4><?php	echo	$sql['entrada']	?></h4></td>
												</tr>
												<tr>
													<td><h4>VALOR:</h4></td>
													<td><h4><?php	echo	$sql['valor']	?></h4></td>
												</tr>
												<tr>
													<td><h4>PESO:</h4></td>
													<td><h4><?php	echo	$sql['peso']	?></h4></td>
												</tr>
												<tr>
													<td><h4>CÓDIGO CLIENTE:</h4></td>
													<td><h4><?php	echo	$sql['cod_cliente']	?></h4></td>
												</tr>
												<tr>
													<td><h4>STATUS:</h4></td>
													<td><h4><?php	echo	$sql['status']	?></h4></td>
												</tr>
											</table>	
										</td>	
									</tr>
								</table>
							</pag>	
						</body>
					</html>
				<?php
			}
		else
		{
			?>
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
						<link href="..\estilo.css" rel="stylesheet">
						<title>Matriz Principal</title>
					</head> 
					<body>
						<menu>
							<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
							<h1>MATRIZ PRINCIPAL</h1><p>
							<table border=1>
								<tr><td><h2>CADASTROS</h2></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_nfs.html"><button>CADASTRAR NOTAS</button></a></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_clientes.html"><button>CADASTRAR CLIENTES</button></a></td></tr>
								<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.html"><button>CADASTRAR DISTRIBUIDORAS</button></a></td></tr>
							</table>
						</menu>
						<pag>
							<h2>CADASTRAR NOTAS FISCAIS</h2><p>
							<table align="center" border=2>
								<tr>
									<td>
										<table>
											<tr>
												<td><h4>CLIENTE NÃO CADASTRADO</h4></td>
											</tr>												
										</table>	
									</td>	
								</tr>
							</table>
						</pag>	
					</body>
				</html>
				<?php
		}
	}		
?>