<?php
	//Importando a Conexão
	require('../connect.php');
	
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_clientes WHERE `codigo` = $cod_cli");
	$sql2 = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = $num_nf");
	
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
					<h1>CADASTRAR NOTAS FISCAIS</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<form method="post" action="cadastrar_nfs.php">
										<table>
											<tr>
												<td><h4>NOTA JÁ CADASTARDA</h4></td>
											</tr>
												<td><input type=submit value=CADASTRAR></td>
												<td><input type=reset value=VOLTAR></td>
											</tr>
										</table>
									</form>
								</td>	
							</tr>
						</table>	
				</body>
			</html>
			<?php
		}
		else
		{		
			$sql2 = mysqli_query($conn,"INSERT INTO $tab_nfs VALUES ('$num_nf', '$ser_nf', '$emi_nf', '$ent_nf', '$val_nf', '$pes_nf', '$cod_cli')");	
			?>
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
						<link href="../estilo/cores.css" rel="stylesheet">
						<title>Matriz Principal</title>
					</head> 
					<body>
						<h1>CADASTRAR NOTAS FISCAIS</h1><p>
						<img src="../imagem/DPC.png" width=10%>
						<img src="../imagem/transluccaggi.png" width=12%>
						<img src="../imagem/VL.png" width=10%>
							<table align="center" border=2>
								<tr>
									<td>
										<table>
											<tr>
												<td><h2>NOTA CADASTRADA:</h2></td>
											</tr>
											<tr>
												<td><h4>NÚMERO:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>SÉRIE:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>EMISSÃO:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>ENTRADA:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>VALOR:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>PESO:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
											<tr>
												<td><h4>CÓDIGO CLIENTE:</h4></td>
												<td><h4><?php		?></h4></td>
											</tr>
												<td><input type=submit value=ALTERAR></td>
												<td><input type=submit value=PRÓXIMA></td>
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
					<h1>CADASTRAR NOTAS FISCAIS</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>CLIENTE NÃO CADASTARDO</h4></td>
										</tr>
											<td><button href="form_cadastrar_clientes.html">CADASTRAR</button></td>
											<td><button href="form_cadastrar_nfs.html">VOLTAR</button></td>
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