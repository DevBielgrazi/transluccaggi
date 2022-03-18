<?php
	require('../connect.php');

    $nom_dis = trim($_POST['nom_dis']);
		
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
					<h1>CADASTRAR DISTRIBUIDORA</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h4>DISTRIBUIDORA JÁ CADASTARDA</h4></td>
										</tr>
											<td><a href="form_cadastrar_distribuidoras.html"><button>VOLTAR</button></a></td>
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
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis (`nome`) VALUES ('$nom_dis')");
		$cod_dis = mysqli_fetch_array(mysqli_query($conn,"SELECT `codigo` FROM $tab_dis WHERE `nome` = '$nom_dis'"));
		
		?>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
					<link href="../estilo/cores.css" rel="stylesheet">
					<title>Matriz Principal</title>
				</head> 
				<body>
					<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
					<img src="../imagem/DPC.png" width=10%>
					<img src="../imagem/transluccaggi.png" width=12%>
					<img src="../imagem/VL.png" width=10%>
						<table align="center" border=2>
							<tr>
								<td>
									<table>
										<tr>
											<td><h2>DISTRIBUIDORA CADASTRADA:</h2></td>
										</tr>
										<tr>
											<td><h4>CÓDIGO:</h4></td>
											<td><h4><?php echo $cod_dis['codigo'];	?></h4></td>
										</tr>
										<tr>
											<td><h4>NOME:</h4></td>
											<td><h4><?php echo	$nom_dis	?></h4></td>
										</tr>										
											<td><a href="form_alterar_distribuidoras.html"><button>ALTERAR</button></a></td>
											<td><a href="form_cadastrar_distribuidoras.html"><button>PRÓXIMO</button></a></td>
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
?>