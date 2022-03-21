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
		
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli' and `cod_distribuidora` = '$cod_dis'");

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
						<h2>CADASTRAR CLIENTES</h2><p>
						<table border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>CLIENTE JÁ CADASTRADO</h4></td>
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
		
		$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
		$n2 = mysqli_num_rows($sql2);
		
		if($n2 != 0)
		{
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli VALUES ('$cod_cli', '$nom_cli', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");
			$sql = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'"));	
			
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
							<h2>CADASTRAR CLIENTES</h2><p>
							<table border=2>
								<tr>
									<td>
										<table>
											<tr>
												<td><h2>CLIENTE CADASTRADO:</h2></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO:</h4></td>
												<td><h4><?php echo	$sql['codigo'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>NOME:</h4></td>
												<td><h4><?php echo	$sql['nome'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>CADASTRO:</h4></td>
												<td><h4><?php	echo	$sql['cadastro'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>ROTA:</h4></td>
												<td><h4><?php	echo	$sql['rota'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>CIDADE:</h4></td>
												<td><h4><?php	echo	$sql['cidade'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>BAIRRO:</h4></td>
												<td><h4><?php	echo	$sql['bairro'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>ENDEREÇO:</h4></td>
												<td><h4><?php	echo	$sql['endereco'];	?></h4></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
												<td><h4><?php	echo	$sql['cod_distribuidora'];	?></h4></td>
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
						<h2>CADASTRAR CLIENTES</h2><p>
						<table border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>DISTRIBUIDORA NÃO CADASTARDA</h4></td>
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