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
						<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>CADASTRAR NOTAS</button></a></td></tr>
						<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CADASTRAR CLIENTES</button></a></td></tr>
						<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>CADASTRAR DISTRIBUIDORAS</button></a></td></tr>
				</table>
		</menu>
		<pag>
			<h2>CADASTRAR CLIENTES</h2><p>
			<table border=1>
				<tr>
					<td>
						<form method="post" action="cadastrar_clientes.php">
							<table>
								<tr>
									<td><h4>CÓDIGO:</h4></td>
									<td><input name="cod_cli" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input name="nom_cli" type=int size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input name="cad_cli" type=date required></td>
								</tr>
								<tr>
									<td><h4>ROTA:</h4></td>
									<td><input name="rot_cli" type=int required></td>
								</tr>
								<tr>
									<td><h4>CIDADE:</h4></td>
									<td><input name="cid_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>BAIRRO:</h4></td>
									<td><input name="bai_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input name="end_cli" type=text size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
									<td><input name="cod_dis" type=int size=16 maxlength=16 required></td>
								</tr>																 
								<tr>
									<td><input type=submit value=CADASTRAR></td>
								</tr>
							</table>
						</form>						
					</td>	
				</tr>
			</table>
		</pag>
		<urc>
            <table border=2>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
                    <td><h3>CADASTRO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>BAIRRO</h3></td>
                    <td><h3>ENDEREÇO</h3></td>
                    <td><h3>COD_DISTRIBUIDORA</h3></td>						
				</tr>		
                <?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
                                <tr>
                                    <td><h4><?php echo $vn['codigo'];   ?></h4></td>
                                    <td><h4><?php echo $vn['nome'];    ?></h4></td>
                                    <td><h4><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></h4></td>
                                    <td><h4><?php echo $vn['rota'];    ?></h4></td>
                                    <td><h4><?php echo $vn['cidade'];    ?></h4></td>
                                    <td><h4><?php echo $vn['bairro'];    ?></h4></td>
                                    <td><h4><?php echo $vn['endereco'];    ?></h4></td>
                                    <td><h4><?php echo $vn['cod_distribuidora'];    ?></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urc>
	</body>
</html>