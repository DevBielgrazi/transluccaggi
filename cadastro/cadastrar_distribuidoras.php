<?php
	require('../connect.php');

    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
	
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
						<h2>CADASTRAR DISTRIBUIDORA</h2><p>
						<table border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>DISTRIBUIDORA JÁ CADASTARDA</h4></td>
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
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis (`nome`, `porcentagem`) VALUES ('$nom_dis', '$por_dis')");
		$sql = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'"));
		
		?>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
					<link href="../estilo/cores.css" rel="stylesheet">
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
						<h2>CADASTRAR DISTRIBUIDORAS</h2><p>
						<table border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h2>DISTRIBUIDORA CADASTRADA:</h2></td>
										</tr>
										<tr>
											<td><h4>CÓDIGO:</h4></td>
											<td><h4><?php echo $sql['codigo'];	?></h4></td>
										</tr>
										<tr>
											<td><h4>NOME:</h4></td>
											<td><h4><?php echo	$sql['nome'];	?></h4></td>
										</tr>
										<tr>
											<td><h4>PORCENTAGEM:</h4></td>
											<td><h4><?php echo	$sql['porcentagem'];
														echo	"%"	?></h4></td>
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
?>