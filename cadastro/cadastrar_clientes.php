<?php
	//Importando a Conexão
	require('../connect.php');
	
	// Pegando os valores
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
		
	//Verificando se ja existe um cliente cadastrado
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `cod_distribuidora`= $cod_dis");
	$sql2 = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = $cod_cli");

	//Transformando o resultado em numeros
	$n = mysqli_num_rows($sql);
	
	if($n != 0)
	{
		$n2 = mysqli_num_rows($sql2);
		
		if($n2 != 0)
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
											<td><a href="form_cadastrar_nfs.html"><button>CADASTRAR NOTA</button></a></td>
											<td><a href="form_cadastrar_clientes.html"><button>VOLTAR</button></a></td>
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
												<td><h4>NÚMERO:</h4></td>
												<td><h4><?php echo	$num_nf;	?></h4></td>
											</tr>
											<tr>
												<td><h4>SÉRIE:</h4></td>
												<td><h4><?php echo	$ser_nf	?></h4></td>
											</tr>
											<tr>
												<td><h4>EMISSÃO:</h4></td>
												<td><h4><?php	echo	$emi_nf	?></h4></td>
											</tr>
											<tr>
												<td><h4>ENTRADA:</h4></td>
												<td><h4><?php	echo	$ent_nf	?></h4></td>
											</tr>
											<tr>
												<td><h4>VALOR:</h4></td>
												<td><h4><?php	echo	$val_nf	?></h4></td>
											</tr>
											<tr>
												<td><h4>PESO:</h4></td>
												<td><h4><?php	echo	$pes_nf	?></h4></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO CLIENTE:</h4></td>
												<td><h4><?php	echo	$cod_cli	?></h4></td>
											</tr>
												<td><a href="form_alterar_clientes.html"><button>ALTERAR</button></a></td>
												<td><a href="form_cadastrar_clientes.html"><button>PRÓXIMO</button></a></td>
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
											<td><a href="form_cadastrar_distribuidora.html"><button>CADASTRAR DISTRIBUIDORA</button></a></td>
											<td><a href="form_cadastrar_clientes.html"><button>VOLTAR</button></a></td>
										</tr>
									</table>	
								</td>	
							</tr>
						</table>	
				</body>
			</html>
			<?php
	}
?>