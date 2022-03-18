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
		
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
	$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");

	$n = mysqli_num_rows($sql);
	
	if($n != 0)
	{
		?>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
					<link href="../estilo/cores.css" rel="stylesheet">
					<title>Matriz Principal</title>
				</head> 
				<body>
					<h1>CADASTRAR CLIENTES</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>CLIENTE JÁ CADASTRADO</h4></td>
										</tr>
											<td><a href="form_cadastrar_nfs.html"><button>CADASTRAR NOTAS</button></a></td>
											<td><a href="../index.html"><button>MENU PRINCIPAL</button></a></td>
										</tr>
									</table>
								</td>	
							</tr>
						</table>	
				</body>
			</html>
			<?php
		
	}
	else
	{
		$n2 = mysqli_num_rows($sql2);
		
		if($n2 != 0)
		{
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli VALUES ('$cod_cli', '$nom_cli', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");	
			?>
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
						<link href="../estilo/cores.css" rel="stylesheet">
						<title>Matriz Principal</title>
					</head> 
					<body>
						<h1>CADASTRAR CLIENTES</h1><p>
						<img src="../imagem/DPC.png" width=10%>
						<img src="../imagem/transluccaggi.png" width=12%>
						<img src="../imagem/VL.png" width=10%>
							<table align="center" border=2>
								<tr>
									<td>
										<table>
											<tr>
												<td><h2>CLIENTE CADASTRADO:</h2></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO:</h4></td>
												<td><h4><?php echo	$cod_cli;	?></h4></td>
											</tr>
											<tr>
												<td><h4>NOME:</h4></td>
												<td><h4><?php echo	$nom_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>CADASTRO:</h4></td>
												<td><h4><?php	echo	$cad_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>ROTA:</h4></td>
												<td><h4><?php	echo	$rot_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>CIDADE:</h4></td>
												<td><h4><?php	echo	$cid_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>BAIRRO:</h4></td>
												<td><h4><?php	echo	$bai_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>ENDEREÇO:</h4></td>
												<td><h4><?php	echo	$end_cli	?></h4></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
												<td><h4><?php	echo	$cod_dis	?></h4></td>
											</tr>
												<td><a href="form_alterar_clientes.html"><button>ALTERAR</button></a></td>
												<td><a href="form_cadastrar_clientes.html"><button>PRÓXIMO</button></a></td>
												<td><a href="../index.html"><button>MENU PRINCIPAL</button></a></td>
											</tr>
										</table>	
									</td>	
								</tr>
							</table>	
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
					<link href="../estilo/cores.css" rel="stylesheet">
					<title>Matriz Principal</title>
				</head> 
				<body>
					<h1>CADASTRAR CLIENTES</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>DISTRIBUIDORA NÃO CADASTARDA</h4></td>
										</tr>
											<td><a href="form_cadastrar_distribuidoras.html"><button>CADASTRAR DISTRIBUIDORAS</button></a></td>
											<td><a href="form_cadastrar_clientes.html"><button>VOLTAR</button></a></td>
											<td><a href="../index.html"><button>MENU PRINCIPAL</button></a></td>
										</tr>
									</table>	
								</td>	
							</tr>
						</table>	
				</body>
			</html>
			<?php
		}		
	}
?>