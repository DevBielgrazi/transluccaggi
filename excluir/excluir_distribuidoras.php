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
				<tr><td><h1>CADASTROS</h1></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h1>PESQUISAS</h1></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="../pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="../pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
			</table>
		</menu>
<?php
	require('../connect.php');

	$cod_dis = trim($_POST['cod_dis']);
    
    $sql = mysqli_query($conn,"DELETE FROM $tab_dis WHERE `codigo` = '$cod_dis'");
        
?>
        <pag>	
				<h1>EXCLUIR DISTRIBUIDORAS</h1><p>
				<table>
					<tr>
						<td><h7>DISTRIBUIDORA EXCLUÌDA</h7></td>
					</tr>	
				</table>
			</pag>	
	</body>
</html>