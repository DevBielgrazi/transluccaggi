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

    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
    $cad_dis = trim($_POST['cad_dis']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
	
	$n = mysqli_num_rows($sql);

	if($n != 0)
	{
		?>
			<pag>
				<h2>CADASTRAR DISTRIBUIDORA</h2><p>
				<table>
					<tr>
						<td><h5>DISTRIBUIDORA JÁ CADASTARDA</h5></td>
					</tr>
				</table>
			</pag>
		<?php
	}
	else
	{
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis(`nome`, `porcentagem`, `cadastro`) VALUES ('$nom_dis', '$por_dis', '$cad_dis')");
		
		?>
			<pag>
				<h2>CADASTRAR DISTRIBUIDORAS</h2><p>
				<table>
					<tr>
						<td><h7>DISTRIBUIDORA CADASTRADA</h7></td>
					</tr>
				</table>
			</pag>
		<?php
	}		
?>
		<urd>
			<table border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>						
					<td><h3>CADASTRO</h3></td>						
				</tr>		
				<?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
				$i=0;
					while($i!=$n)
					{
						$vn = mysqli_fetch_array($sql);	?>                        
								<tr>
									<td><h4><nobr><?php echo $vn['codigo'];   ?><nobr></h4></td>
									<td><h4><nobr><?php echo $vn['nome'];    ?><nobr></h4></td>
									<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?><nobr></h4></td>					
								</tr>                                            
						<?php   $i = $i + 1;
					}   ?>
			</table>
		</urd>	
	</body>
</html>